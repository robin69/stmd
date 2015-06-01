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
	

	public function get_cat_by_slug($slug)
	{
		$query = $this->db->get_where("category", array("slug"=>$slug));
		$result = $query->row_array();
		
		return $result;
	}
	

	public function get_child($id_category)
	{
		$this->db->where("parent_cat",$id_category);
		$query = $this->db->get($this->tbl_category);
		$result = $query->result();


        /********
         * Attention : On se sert des 2 modes
         * d'affichage ! $result[0] et $result
         */
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
     *  @all_status : Permet de récupérer seulement les catégories qui contiennent des fiches publiées (TRUE) ou toutes les catégories (FALSE)
	*	@return : multidimentionnal array
	*
	*************************************/
	public function get_cat_by_type($type, $all_status=FALSE, $with_count = true)
	{

        if($all_status === TRUE){
            $status =    "'published','unpublished'";
        }else{
            $status = "'published'";
        }


		//On sélectionne les catégories qui ont effectivement une fiche et on compte le nombre de fiche. On trie le tout par ordre alphabétique.
		$manual_query2 = "
			SELECT
				*,
				(SELECT COUNT(*)
					FROM fiche, `fiche_has_category` as fhc, `fiche_has_type` as fht
					WHERE fiche.id_fiche = fhc.fiche_id AND fhc.category_id = category.id_category
					AND fiche.publication_status IN (".$status.")
					AND fht.fiche_id = fiche.id_fiche
				) AS nbr_fiche
				FROM (`category`)
				JOIN `cat_has_type` ON `category`.`id_category` = `cat_has_type`.`category_id`
				WHERE `parent_cat` = '0' AND `type_slug` = '".$type."'
				ORDER BY `category`.`public_name` ASC;";


		$query2 = $this->db->query($manual_query2);
		$cats = $query2->result_array();

		//Pour chaque domaine, je récupère les catégories
		foreach($cats as $key=>$domaine)
		{
			$manual_query3 = "
			SELECT
				*,
				(SELECT COUNT(*)
					FROM fiche, `fiche_has_category` as fhc, `fiche_has_type` as fht
					WHERE fiche.id_fiche = fhc.fiche_id AND fhc.category_id = category.id_category
					AND fiche.publication_status IN (".$status.")
					AND fht.fiche_id = fiche.id_fiche
				) AS nbr_fiche

				FROM (`category`)
				JOIN `cat_has_type` ON `category`.`id_category` = `cat_has_type`.`category_id`
				WHERE `parent_cat` = '".$domaine["id_category"]."' AND `type_slug` = '".$type."'
				ORDER BY `category`.`public_name` ASC;";
			$query3 = $this->db->query($manual_query3);
/* 			$query2 = $this->db->get_where($this->tbl_category,array("parent_cat"=>$domaine["id_category"])); */
			$cats[$key]["sous_cats"] = $query3->result_array();
		}


		return $cats;

	}

	/************************************
	 *
	 *	Retourne un tableau multi-dimensionnel
	 *	des catégories et de leurs sous-catégories
	 *	pour un type donné (transporteurs_md, expediteurs_md)
	 *
	 *	Cette fonction n'est utilisée que dans l'espace perso en front
	 * pour afficher la liste des catécories présentes sur le site.
	 *
	 *	@type : valeur du type transporteur_md, expediteurs_md ou conseiller_securite
	 *  @all_status : Permet de récupérer seulement les catégories qui contiennent des fiches publiées (TRUE) ou toutes les catégories (FALSE)
	 *	@return : multidimentionnal array
	 *
	 *************************************/
	public function get_cats_list($type)
	{

		//On sélectionne les catégories qui ont effectivement une fiche et on compte le nombre de fiche.
		$manual_query2 = "SELECT * FROM (category) JOIN `cat_has_type` ON `category`.`id_category` = `cat_has_type`.`category_id`
		WHERE `parent_cat` = '0' AND  `type_slug` = '".$type."' ORDER BY `category`.`public_name` ASC;";


		$query2 = $this->db->query($manual_query2);
		$cats = $query2->result_array();

		//Pour chaque domaine, je récupère les catégories
		foreach($cats as $key=>$domaine)
		{
			$manual_query3 = "
			SELECT
				*
				FROM (`category`)
				JOIN `cat_has_type` ON `category`.`id_category` = `cat_has_type`.`category_id`
				WHERE `parent_cat` = '".$domaine["id_category"]."' AND `type_slug` = '".$type."'
				ORDER BY `category`.`public_name` ASC;";
			$query3 = $this->db->query($manual_query3);
			/* 			$query2 = $this->db->get_where($this->tbl_category,array("parent_cat"=>$domaine["id_category"])); */
			$cats[$key]["sous_cats"] = $query3->result_array();
		}

		return $cats;

	}


    /***********************************************
     * Retourne l'intégralité des catégories paramétrées
     * pour le site avec leur sous catégories.
     *
     *
     * @param $type
     * @return $return
     */
    public function admin_get_cats_sscats_by_type($type)
    {

        //$type="expediteurs_md";

        $sql = "SELECT
          cat.id_category id_cat,
          cat.public_name cat_name,
          cat.slug cat_slug,
          cat.description cat_desc,
          cat.parent_cat parent_cat,
          sscat.id_category id_sscat,
          sscat.public_name sscat_name,
          sscat.slug sscat_slug,
          sscat.description sscat_desc,
          cat_has_type.type_slug type
        FROM category as cat
          JOIN `cat_has_type` ON cat.`id_category` = `cat_has_type`.`category_id`
          LEFT JOIN category as sscat ON sscat.parent_cat = cat.id_category
          LEFT JOIN cat_has_type sscat_type ON sscat.id_category = sscat_type.category_id

        WHERE cat_has_type.type_slug = '". $type ."'
        ORDER BY cat.parent_cat asc, cat_name ASC, sscat_name";

        $query = $this->db->query($sql);

        $results = $query->result_array();

        /**********
         * La requête ci-dessus fait le job, mais retourne
         * aussi chaque sscat qui a une cat mère dans un
         * type différent. Ca n'est pas sensé arriver,
         * mais ce qui suit permet de s'en assurer.
         */

        /*****
         * La function array_column n'existe qu'en 5.5
         * On est en 5.3 sur le serveur de test...
         */
        if(function_exists("array_column"))
        {
            //Si la catégorie parent n'a pas d'entrée dans le tableau (id_cat)
            $column_array = array_column($results,"id_cat");

        }else{
            $column_array = array_map(
                function($element){
                    return $element["id_cat"];
                }, $results);
        }

        //var_dump($column_array);
        //On parcours les résultats
        $cat_list = array();

        $catArrayToReturn = array();
        foreach($results as $key=> $cat){


            //On supprime toutes les catégories enfant dont le parent n'est pas dans le tableau (type différent)
            //.... et dont l'id_parent est différent de 0 (Domaine principal)

            if( !in_array($cat["parent_cat"], $column_array) && $cat["parent_cat"] !="0")
            {
                //echo "<br / >Est supprimé : ".$cat["parent_cat"];
                //On supprime ces sous-catégories.
                unset($results[$key]);
            }

            //Si l'id n'est pas encore listé, c'est une catégorie, on l'ajoute.
            if(!in_array($cat["id_cat"],$cat_list)){
                array_push($cat_list,$cat["id_cat"]);
            }else{
                //Si l'id est déjà présent dans la liste, c'est une sous catégorie.On le supprime du tableau principal, on l'ajoute au tableau précédent



            }
        }





        return $results;
    }


    /*****************************
     * Cette version 2 de la fonction get cats_sscats_by_type
     * retourne un tableau multidimension des catégories
     * qui matérialise correctement l'arborescence de catégorie
     * @param $type
     */
    public function admin_get_cats_sscats_by_type2($type)
    {

        //$type="expediteurs_md";
        //On sélectionne toutes les catégories publiées du type
        $sql = "SELECT
          cat.id_category,
          cat.public_name,
          cat.slug,
          cat.description,
          cht.type_slug
        FROM category as cat
        INNER JOIN cat_has_type as cht ON id_category = category_id AND type_slug = '".$type."'
        WHERE parent_cat =0";
        $query = $this->db->query($sql);
        $cats = $query->result();


        //Pour chaque catégorie, on va vérifier si elle a des sous-catégories
        foreach($cats as $key=>$cat)
        {
            $sql ="SELECT
              sscat.id_category as sscat_id_category,
              sscat.public_name,
              sscat.slug,
              sscat.description,
              cht.type_slug
            FROM category as sscat
              INNER JOIN cat_has_type as cht ON id_category = category_id AND type_slug = '".$type."'
            WHERE parent_cat = ".$cat->id_category;
            $query2 = $this->db->query($sql);
            $sscats = $query2->result();





            //Si oui, on ajoute le tableau de sscats à la catéforie
            if(count($sscats)>0 )
            {

            $cats[$key]->sscats = $sscats;

            }


        }




        return $cats;

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
	
	
	
	
	
	
		
}