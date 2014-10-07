<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Category extends Category_manager
{

	protected $id_category;
	protected $public_name;
	protected $slug;
	protected $parent_cat;
	protected $type;
	protected $guid;
	
	
	
	
	
	
	
	public function __construct($id_category="")
	{
		 parent::__construct();
		
		if($id_category!="")
		{
			
			$infos = $this->get($id_category);

			$this->hydrate($infos);
		}	
		
	}
	
	/***
	*
	*	Function qui hydrate l'objet à partir
	*	du tableau de données
	*
	*	@donnees array tableau associatif contenant les champs de l'objet
	*	@return void
	*
	*
	*****************/
	public function hydrate($donnees)
	{

		foreach($donnees as $key => $value)
		{
			$method_name = "set_".$key;

			
			if(method_exists($this,$method_name))
			{
				$this->$method_name($value);
			}
		}
		//Si slug n'est pas renseigné, on le lance quand même
		if(!isset($donnees["slug"]) OR $donnees["slug"] == "" )
		{
			$this->set_slug();			
		}
		
		//Si guid n'est pas renseigné, on le lance quand même
		if(!isset($donnees["guid"]) OR $donnees["guid"] == "")
		{
			$this->set_guid($this->slug());			
		}
		
		//Si parent_cat n'est pas renseigné, on le met à 0 parce que c'est un domaine
		if(!isset($donnees["parent_cat"]) OR $donnees["parent_cat"] == "")
		{
			$this->set_parent_cat("0");			
		}

		
	}
	
	
	/***
	*
	*	Callers
	*
	*
	***********/
	
	public function id_category(){ return $this->id_category; }	
	public function public_name(){ return $this->public_name; }	
	public function slug(){ return $this->slug; }	
	public function parent_cat(){ return $this->parent_cat; }
	public function type(){ return $this->type; }	
	public function guid(){ return $this->parent_cat; }		
	
	/***
	*
	*	Setters
	*
	*
	***********/
	
	public function set_id_category($id_category)
	{
		$this->id_category = $id_category;
	}
	
	public function set_public_name($public_name)
	{
		$this->public_name = $public_name;
	}
	
	public function set_slug($slug="")
	{
		if($slug!=""){
			//On prépare l'url
			$string = $slug;
		}else{
			$string = $this->public_name;
		}
		
		$string = url_title($string);
		$string	= strtolower($string);
		
		$this->slug = $string;
	}
	
	public function set_parent_cat($parent_cat)
	{
		$this->parent_cat = $parent_cat;
	}
	
	public function set_type($type_slug_array)
	{
		$this->type = $type_slug_array;
	}
	
	public function set_guid($guid)
	{
		$this->guid = $guid;
	}
	
	/*****************************************
	*
	*	S'occupe d'enregistrer l'utilisateur.
	*	Si l'objet Fiche a $id_fiche renseigné
	*	la fonction met à jour l'enregistrement
	*	dans la base.
	*	Si l'objet n'a pas d'ID, la function
	*	crée un nouvel enregistrement
	*
	*	@return TRUE si update,
	*	@return int $id_fiche si ajout.
	*
	******************************************/
	public function _save()
	{
		$manager = new Category_manager;
		$exception_fields = array();
		$array_to_save = array();
		
		//on prépare le tableau de sauvegarde
		foreach($this as $key=>$value){
			if(!in_array($key,$exception_fields))
			{
				$array_to_save[$key] = $value;
			}		
		}

		
		
		
		//Si l'objet à un id, on fait un update.
		if($this->id_category != "")
		{
			$manager->update($array_to_save);
			return TRUE;
			
		}else{
			//Si l'objet n'a pas d'id, on crée une nouvelle fiche
			$id_user = $manager->add($array_to_save);
			return $id_user;
		}
	}
		

}