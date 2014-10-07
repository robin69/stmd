<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Category_model extends CI_Model
{
	public $table = "category";
	public $content_type = "category";
	public $table_type_liaison = "cat_has_type";
	public $id_category = "";
	
	public $public_name = "";
	public $slug = "";
	public $guid ="";
	public $parent_cat = "";
	
	private $exception_fields = array("submit");	//Tableau d'éléments (par exemple champ) à ne pas traiter dans une boucle.
	
	
	public function __construct($id_category="")
	{
		 parent::__construct();
		
		if($id_category!="")
		{
			$this->id_category = $id_category;
			$this->populate($id_category);
		}	
		
	}
	
	
	/**************************************
	*
	*	(privée) Rapatrie les informations de la category
	*
	*	utilisation :
	*	$cat = new Category($id_category);
	*
	***************************************/
	private function populate($id_category)
	{

		$query = $this->db->get_where($this->table, array('id_category' => $id_category));
		$result = $query->row();
		
		foreach($result as $key => $value)
		{
			$this->$key = $value;
		}
		
		$guid = new Guid_model;
		$this->guid = $guid->get_guid($this->content_type, $this->id_category);
		
	}
	
	
	/**************************************
	*
	*	(public) Alimente l'objet à partir des 
	*	informations contenues dans un $_POST
	*
	*	utilisation :
	*	$cat = new Category($id_fiche);
	*
	***************************************/
	public function build($post)
	{
		foreach($post as $key => $value)
		{
			if(!in_array($key, $this->exception_fields))
			{
				$this->$key = $value;
			}
		}
		
		return TRUE;		
	}
	
	
	/**************************************
	*
	*	Création d'une fiche
	*
	*	utilisation :
	*	$fiche = new Fiche;
	*	$fiche->nom = "toto";
	*	$id_fiche = $fiche->add();
	*
	***************************************/
	public function add()
	{
		//on supprime les champs qui ne nous intéressent pas
		$this->_sanitize_array($_POST,$this->exception_fields);
		
		//On ajoute la catégorie
		$category_table_fields = array("public_name","slug");
		
		$public_name = $this->input->post("public_name");
		
		if(!empty($this->input->post("slug")))
		{
			$slug = convert_accented_characters($this->input->post("slug"));
			$slug = url_title($slug);
		}else{
			$slug = convert_accented_characters($this->input->post("public_name"));
			$slug = url_title($slug);
		}
		
		$parent_cat = $this->input->post("parent_cat");
		
		
		$this->db->insert($this->table,array("public_name"=>$public_name,"slug"=>$slug,"parent_cat"=>$parent_cat));
		$this->id_category = $this->db->insert_id();
		
		//On ajoute le GUID
		$guid_string = url_title($slug)."/";
		
		$guid = new Guid_model;
		$guid->add_guid("category",$this->id_category,$guid_string);
		
		//On s'occupe du type
		$insert_type_batch = array();
		foreach($this->input->post("type") as $key => $type_slug)
		{
			$this->db->insert($this->table_type_liaison, array("category_id" => $this->id_category,"type_slug"=>$type_slug));
		}
		$this->type = $this->input->post("type");
		
				
		return $this->id_category;
	}
	
	
	
	/******************************************
	*
	*	Funciton _sanitize_post()
	*
	*
	*
	*
	*
	*
	**********************************************/
	private function _sanitize_array($array_to_sanitize,$array_ref)
	{

		foreach($array_to_sanitize as $key => $value)
		if(in_array($key, $array_ref))
		{
			unset($array_to_sanitize[$key]);
		}
		
		return true;
	}

	
	/**************************************
	*
	*	Mise à jour de la Fiche
	*
	*	utilisation :
	*	$fiche = new Fiche;
	*	$fiche->nom = "toto";
	*	$fiche->update();
	*
	***************************************/
	public function update()
	{
	

		if(empty($this->slug))
		{
			$slug = convert_accented_characters($this->public_name);
			$this->slug = url_title($slug);
		}
		//On met à jour la catégorie
		$data = array(
			"public_name"	=>	$this->public_name,
			"slug"			=>	$this->slug,
			"parent_cat"	=>	$this->parent_cat
		);
		$this->db->where("id_category",$this->id_category);
		$this->db->update($this->table, $data);
		
		
		//On met à jour les types du model
		$type = new Type_model;
		$type->update_cat_types($this->id_category,$this->type);
		
		//On met à jour le GUID
		$slug = convert_accented_characters($this->slug);
		$guid_string = url_title($slug)."/";
		$guid = new Guid_model;
		$guid->update_guid($this->content_type, $this->id_category, $guid_string);

		return TRUE;
		
	}
	
	public function delete($id_category="")
	{
		if($id_category !="")
		{
			$id = $id_category;
		}else{
			$id = $this->id_category;
		}
		
		//On supprime la catégorie
		$this->db->delete($this->table, array("id_category" => $id));
		
		//suppression des types liés à la catégorie
		$type = new Type_model;
		$type->delete_cat_type($id);
		
		//Suppression du GUID lié à la catégorie
		$guid = new Guid_model;
		$guid->delete_guid("category",$id);
	}
	
	
	public function get()
	{
		$query	=	$this->db->get($this->table);
		$result = 	$query->result();
		return $result;
	}
	
	public function get_cat_child($id)
	{
		$this->db->select('*');
		$this->db->where("parent_cat",$id); 
		
		$query = $this->db->get($this->table);
		$result = $query->result();
		//echo $this->db->last_query();
		
		return $result;
	}
	
	public function get_domaine()
	{
		$query	=	$this->db->get_where($this->table,array("parent_cat" => "0"));
		$result = 	$query->result();
		return $result;
	}
	
	
	

}