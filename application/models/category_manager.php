<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Category_manager extends CI_Model
{
	private $tbl_category 		= "category";
	private $tbl_category_type 	= "cat_has_type";
	private $tbl_guid 			= "guid";
	private $content_type 		= "category";
		
	private $exception_fields = array("submit");	//Tableau d'éléments (par exemple champ) à ne pas traiter dans une boucle.
	
	
	public function __construct()
	{
		 parent::__construct();
	}
	
	
	
	
	protected function add($cat_array)
	{
		$exception_field = array("type","guid");
		//On met à jour les informations principales
		foreach($cat_array as $field=>$value)
		{

			if(!in_array($field,$exception_field))
			{
				$this->db->set($field,$value);
			}
		}
		//ajoute les informations dans la table user
		$this->db->insert($this->tbl_category);
		$fiche_array["id_category"] = $new_id = $this->db->insert_id();
		
		//on ajoute les informations dans la table guid
		$this->db->set("guid",$cat_array["slug"]);
		$this->db->set("id_content",$new_id);
		$this->db->set("content_type",$this->content_type);
		$this->db->insert($this->tbl_guid);
		
		//on crée les types de cette catégorie
		$type = new Type;
		$type->update_cat_types($new_id,$cat_array["type"]);

			
		return $new_id;	
	}
	
	
	public function get_list($args)
	{
		//On récupère la liste des ID. Requête de base
		$query 	=	$this->db->from($this->tbl_category);
		
		//Si il y a des filtres, on les ajoutes à la requête
		if(isset($args["filter_name"]))
		{
			
				$query	=	$this->db->where(array($args["filter_name"] => $args["filter_value"]));
		}
			

		if($args["limit"] != "")
		{
			$query 	=	$this->db->limit($args["limit"],$args["offset"]);
		}
		
		$query = $this->db->order_by("public_name","ADC");
		//on exécute la requête
		$query = $this->db->get();
		
		
		//On génère le résultat
		$results = $query->result_array();
		$users_liste = array();
		
		return $results;
	}
	
	
	
	
	
	public function count_list($args)
	{
		//On récupère la liste des ID. Requête de base
		$query 	=	$this->db->from($this->tbl_category);
		
		//Si il y a des filtres, on les ajoutes à la requête
		if(isset($args["filter_name"]))
		{
			
				$query	=	$this->db->where(array($args["filter_name"] => $args["filter_value"]));
		}
			

		if(array_key_exists("limit",$args))
		{
			if($args["limit"] != "")
			{
				$query 	=	$this->db->limit($args["limit"],$args["offset"]);
			}
		}
		
		

		//on exécute la requête
		$count = $this->db->count_all_results();
		
		return $count;
	}
	
	
	protected function update($cat_array)
	{

		$exception_field = array("type","guid");
		//On met à jour les informations principales
		foreach($cat_array as $field=>$value)
		{

			if(!in_array($field,$exception_field))
			{
				$this->db->set($field,$value);
			}
		}
		$this->db->where("id_category",$cat_array["id_category"]);		
		$this->db->update($this->tbl_category);
		
		
		//On met à jour le guid
		$this->db->set("guid",$cat_array["guid"]);
		$this->db->where("id_content",$cat_array["id_category"]);
		$this->db->where("content_type",$this->content_type);
		$this->db->update($this->tbl_guid);
		
		//on crée les types de cette catégorie
		$type = new Type;
		$type->update_cat_types($cat_array["id_category"],$cat_array["type"]);
		

		
		return;
	}
	
	public function delete($id_category)
	{
		//On supprime la fiche dans la table de cateogories
		$this->db->delete($this->tbl_category, array("id_category" => $id_category));
		
		//On supprime la fiche dans la table de cateogories
		$this->db->delete($this->tbl_category_type, array("category_id" => $id_category));
		
	}
	
	public function get($id_category)
	{
		$query	=	$this->db->get_where($this->tbl_category, array("id_category"=>$id_category));
		$infos 	= 	$query->result_array();
		
		if(count($infos)>=1)
		{
			//On récupère le type
			$infos[0]["type"] = $this->get_cat_types($id_category);
			//On récupère le guid
			$infos[0]["guid"] = $this->get_guid($id_category);
			
			

			return $infos[0];
			
			
		}
		
		
		return FALSE;
	}
	
	public function get_cat_by_slug($slug)
	{
		$query = $this->db->get_where("category", array("slug"=>$slug));
		$result = $query->row_array();
		
		return $result;
	}
	
	private function get_cat_types($id_category)
	{
		$query = $this->db->get_where($this->tbl_category_type, array("category_id"=>$id_category));
		$type_array = $query->result_array();
		
		if(count($type_array)>=1)
		{
			$type_list = array();
			foreach($type_array as $type)
			{
				array_push($type_list, $type["type_slug"]);
			}
			
			return $type_list;
		}
		
		return FALSE;

		
	}
	
	private function get_guid($id_category)
	{
		$query = $this->db->get_where($this->tbl_guid, array("id_content"=>$id_category, "content_type"=>$this->content_type));
		$guid = $query->row_array();
		
		if(count($guid)>=1)
		{
			return $guid["guid"];
		}
		
		return FALSE;		
	}
	
	public function get_child($id_category)
	{
		$this->db->where("parent_cat",$id_category); 
		
		$query = $this->db->get($this->tbl_category);
		$result = $query->result();
		
		if(count($result)==1)
		{
			return $result[0];
		}
		//echo $this->db->last_query();
		
		return $result;
	}
	
	public function get_all_domaines()
	{
		$query  = 	$this->db->order_by("public_name","ADC");
		$query	=	$this->db->get_where($this->tbl_category,array("parent_cat" => "0"));
		$result = 	$query->result();
		return $result;
	}
	
	
	
	/************************************
	*
	*	Retourne un tableau multi-dimensionnel
	*	des catégories et de leurs sous-catégories
	*	pour un type donné (transporteurs_md, expediteurs_md)
	*
	*	C'est cette fonction qui permet la représentation du menu
	*	de catégorie dans les sidebar des pages de résultat.
	*
	*	@type : valeur du type transporteur_md, expediteurs_md ou conseiller_securite
	*	@dont_count : (bool) FALSE si on veut se préoccuper des fiches (n'afficher que les catégories qui ont effectivement des fiches actives);
	*	@return : multidimentionnal array
	*
	*************************************/
	public function get_cat_by_type($type,$dont_count = FALSE)
	{
		//On sélectionne les catégories qui ont effectivement une fiche et on compte le nombre de fiche. On trie le tout par ordre alphabétique.
		if(!$dont_count){
			$manual_query2 = "SELECT *, 
				(SELECT COUNT(*) 
					FROM fiche, `fiche_has_category` as fhc, `fiche_has_type` as fht 
					WHERE fiche.id_fiche = fhc.fiche_id AND fhc.category_id = category.id_category
					AND fiche.publication_status = 'published'
					AND fht.fiche_id = fiche.id_fiche
				) AS nbr_fiche 
				FROM (`category`) 
				JOIN `cat_has_type` ON `category`.`id_category` = `cat_has_type`.`category_id` 
				WHERE `parent_cat` = '0' AND `type_slug` = '".$type."' 
				HAVING (nbr_fiche) > 1
				ORDER BY `category`.`public_name` ASC;";
		}else{
			$manual_query2 = "SELECT * FROM (`category`) 
				JOIN `cat_has_type` ON `category`.`id_category` = `cat_has_type`.`category_id` 
				WHERE `parent_cat` = '0' AND `type_slug` = '".$type."'
				ORDER BY `category`.`public_name` ASC;";
		}
		
				
				
		$query2 = $this->db->query($manual_query2);
		$cats = $query2->result_array();
		
		
/* 		echo $this->db->last_query(); */
		
		//Pour chaque domaine, je récupère les catégories
		foreach($cats as $key=>$domaine)
		{
			if(!$dont_count)
			{
				$manual_query3 = "
			SELECT 
				*, 
				(SELECT COUNT(*) 
					FROM fiche, `fiche_has_category` as fhc, `fiche_has_type` as fht   
					WHERE fiche.id_fiche = fhc.fiche_id AND fhc.category_id = category.id_category
					AND fiche.publication_status = 'published'	
					AND fht.fiche_id = fiche.id_fiche
				) AS nbr_fiche 
				
				FROM (`category`) 
				JOIN `cat_has_type` ON `category`.`id_category` = `cat_has_type`.`category_id` 
				WHERE `parent_cat` = '".$domaine["id_category"]."' AND `type_slug` = '".$type."' 
				HAVING (nbr_fiche) > 1
				ORDER BY `category`.`public_name` ASC;";	
			}else{
				$manual_query3 = "
			SELECT * FROM (`category`) 
				JOIN `cat_has_type` ON `category`.`id_category` = `cat_has_type`.`category_id` 
				WHERE `parent_cat` = '".$domaine["id_category"]."' AND `type_slug` = '".$type."' 
				ORDER BY `category`.`public_name` ASC;";
			}
			
			$query3 = $this->db->query($manual_query3);
/* 			$query2 = $this->db->get_where($this->tbl_category,array("parent_cat"=>$domaine["id_category"])); */
			$cats[$key]["sous_cats"] = $query3->result_array();
/* 			echo $this->db->last_query(); */
		}
		
		
		return $cats;
		
	}
	
	
	
	
	
	
		
}