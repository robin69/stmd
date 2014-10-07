<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




/******************************************************************
*
*
*	Classe de gestion d'une fiche. Elle gère les interactions
*	avec la bse de données
*
*
*
*
*
*
*
******************************************************************/
class Fiche_manager extends CI_Model
{

	private $tbl_fiche 			= "fiche";
	private $tbl_cats			= "category";
	private $tbl_fiche_cats		= "fiche_has_category";
	private $tbl_fiche_types	= "fiche_has_type";
	private $tbl_fiche_zones	= "fiche_has_zone";
	private $tbl_fiche_eval		= "fiche_eval";
	protected $required_infos		= array(					//Les champs qui sont obligatoires pour une fiche
									"raison_sociale",
									"ville"
								);

	public function __construct()
	{
		parent::__construct();
		
		
	}
	
	
	/**
	*
	*	Function du processus d'ajout d'une fiche
	*	et de toutes ses dépendances.
	*
	*	@fiche_obj objet L'objet Fiche
	*	@return int id_fiche;
	*	
	********************************/
	public function add($fiche_array)
	{
		//comme c'est une création, on crée la date_creation
		$fiche_array["date_creation"] = time();					//donnedate et heure courante pour la date de création
		if(!isset($fiche_array["publication_status"]) OR $fiche_array["publication_status"] == "")
		{
			$fiche_array["publication_status"]	= "unpublished";	//Le status de publication par défaut est à "unpublished"					
		}

		
		$exception_field = array("categories","types","zones");
		//On met à jour les informations principales
		foreach($fiche_array as $field=>$value)
		{

			if(!in_array($field,$exception_field))
			{
				$this->db->set($field,$value);
			}
		}
		//ajoute les informations dans la table fiche

		$this->db->insert($this->tbl_fiche);
		$fiche_array["id_fiche"] = $new_id_fiche = $this->db->insert_id();	

		
		
		//Si l'objet contient des catégories ajoute les catégories de la Fiche_manager
		$this->_add_cats($fiche_array);
		
		//ajoute le type de fiche
		$this->_add_types($fiche_array);
		
		//ajoute la zone de la fiche
		$this->_add_zones($fiche_array);

		return $new_id_fiche;
		
	}
	
		

	
	
	
	
	/**
	*
	*	ajoute les catégories d'une fiche dans 
	*	la table d'association
	*	
	*	@fiche_obj obj L'objet fiche (contenant l'id_fiche)
	*	@return void
	*
	*
	*
	*************************************/
	private function _add_cats($fiche_array)
	{

		$cats = $fiche_array["categories"];
		if(count($cats)>=1)
		{
			$array_to_insert = array();
			foreach($cats as $key=>$value)
			{
				$array = array(
					"fiche_id"		=>	$fiche_array["id_fiche"],
					"category_id"	=>	$value
				);
				
				array_push($array_to_insert,$array);
			}

			$this->db->insert_batch($this->tbl_fiche_cats, $array_to_insert);
/* 			echo $this->db->last_query(); */
		}
		
		
		
		return;
	}
	
	
	
	/**
	*
	*	ajoute les types d'une fiche dans 
	*	la table d'association
	*	
	*	@fiche_obj obj L'objet fiche (contenant l'id_fiche)
	*	@return void
	*
	*
	*
	*************************************/
	private function _add_types($fiche_array)
	{
		$types = $fiche_array["types"];
		if(count($types)>=1)
		{
			$array_to_insert = array();
			foreach($types as $key=>$value)
			{
				$array = array(
					"fiche_id"		=>	$fiche_array["id_fiche"],
					"type_slug"		=>	$value
				);
				
				array_push($array_to_insert,$array);
			}
			
			$this->db->insert_batch($this->tbl_fiche_types, $array_to_insert);
		}
		
		
		
		return;
	}
	
	
	/**
	*
	*	ajoute les zones d'une fiche dans 
	*	la table d'association
	*	
	*	@fiche_obj obj L'objet fiche (contenant l'id_fiche)
	*	@return void
	*
	*
	*
	*************************************/
	private function _add_zones($fiche_array)
	{
		$zones = $fiche_array["zones"];
		if(count($zones)>=1)
		{
			$array_to_insert = array();
			foreach($zones as $key=>$value)
			{
				$array = array(
					"fiche_id"		=>	$fiche_array["id_fiche"],
					"zone_id"		=>	$value
				);
				
				array_push($array_to_insert,$array);
			}
			
			$this->db->insert_batch($this->tbl_fiche_zones, $array_to_insert);
		}
		
		
		
		return;
	}
	
	
	
	
	
	
	
	/**
	*
	*	supprime une fiche, ainsi que tous ses éléments d'association
	*	
	*	@id_fiche int id de la fiche à supprimer
	*	@return void
	*
	*
	*
	*************************************/

	public function delete($id_fiche)
	{
		//On supprime la fiche dans la table fiche
		$this->db->delete($this->tbl_fiche, array("id_fiche" => $id_fiche));
		
		//On supprime la fiche dans la table de liaison cateogories
		$this->db->delete($this->tbl_fiche_cats, array("fiche_id" => $id_fiche));
		
		//On supprime la fiche dans la table de liaison type
		$this->db->delete($this->tbl_fiche_types, array("fiche_id" => $id_fiche));
		
		//On supprime la fiche dans la table de liaison zone
		$this->db->delete($this->tbl_fiche_zones, array("fiche_id" => $id_fiche));
		
		return;
		
	}
	
	
	/*************************************
	*
	*
	*	Récupère les informations d'une fiche,
	*	y compris ses dépendances
	*
	*	@$id_fiche	(int)	l'id de la fiche à récupérer
	*	@return	(array)		le tableau multi-dimensions contenant les infos de la fiche
	*
	*************************************/
	public function get($id_fiche)
	{
	
		//On récupère les informations générales
		$query = $this->db->get_where($this->tbl_fiche, array("id_fiche"=>$id_fiche));
		$infos = $query->row_array();
		$query->free_result();
		
		$cats = $this->get_fiche_cats($id_fiche);		
		//On récupère les types de la fiche
		$query = $this->db->get_where($this->tbl_fiche_types, array("fiche_id"=>$id_fiche));
		$result_types = $query->result_array();
		
		$types = array();
		foreach($result_types as $key=>$type){
			array_push($types,$type["type_slug"]);
		}
		
		$query->free_result();
		
		//On récupère les zones de la fiche
		$query = $this->db->get_where($this->tbl_fiche_zones, array("fiche_id"=>$id_fiche));
		$result_zones = $query->result_array();
		$zones = array();
		foreach($result_zones as $key=>$zone){
			array_push($zones,$zone["zone_id"]);
		}
		$query->free_result();
		
		$fiche = $infos;
		$fiche["categories"] 	= $cats;
		$fiche["types"]			= $types;
		$fiche["zones"]			= $zones;
		
		
		//On retourne le tableau complet pour qu'il puisse être instancié
		return $fiche;
		
		
		
	}
	
	/***
	*
	*	Retourne la liste des
	*	catégories d'une fiche
	*
	*
	*********/
	private function get_fiche_cats($id_fiche)
	{
		//On récupère les catégories de la fiche
		$query = $this->db->join($this->tbl_cats, "category_id = id_category","left");
		$query = $this->db->get_where($this->tbl_fiche_cats, array("fiche_id"=>$id_fiche));
		$result = $query->result_array();

		//Il faut transformer la liste de catégorie en élément simple.
		$cats = array();
		foreach($result as $key=>$cat){
			array_push($cats,$cat);
		}
		
		return $cats;
		$query->free_result();
	}
	
	public function search_fiche($string,$offset,$published=TRUE,$count=FALSE)
	{
		//On construit la requête
		$query = $this->db->from($this->tbl_fiche);
		
		//On demande par défaut les fiches publiées
		if($published){
			$query = $this->db->where(array("publication_status"=>"published"));
		}
		
		$query = $this->db->where('MATCH(`nom_contact`,`raison_sociale`,`ville`,`cp`,`email_societe`,`site`,`facebook`,`googleplus`,`viadeo`,`twitter`,`linkedin`,`description`,`competences`,`certifications`,`references`) AGAINST ("'.$string.'" IN BOOLEAN MODE)');
		
		//On récupère l'information de "Type".		
		$query = $this->db->join($this->tbl_fiche_types, "fiche.id_fiche = fiche_has_type.fiche_id","left");
		$query = $this->db->join($this->tbl_fiche_cats, "fiche.id_fiche = fiche_has_category.fiche_id","left");
		if(!$count)
		{
			$query = $this->db->limit($this->config->item('elem_per_page'),$offset);
		}
		
		$query = $this->db->group_by("id_fiche");
		

		$query = $this->db->get();
		$results = $query->result_array();
		$nbr_results = count($results);
		
		
		
		if($count==FALSE)
		{
			if($nbr_results >=1)
			{
				//On ajoute le tableau des catégories de la fiche au résultats.
				foreach($results as $key => $fiche)
				{
					
					$cats = $this->get_fiche_cats($fiche["id_fiche"]); //On récupère les infos de catégorie
					$results[$key]["category"]=$cats;					//On les ajoute aux résultats.
					
				}
			}
			
			return $results;
		}else{
			return $nbr_results;
		}

	
	}
	
	/**********************************
	*
	*	retourne la liste des fiches
	*	avec les fiches formatées par this->get()
	*
	*	Le tableau d'argument doit être formaté comme suit :
	*	$args = array(
	*		"filter"	=> "",
	*		"filter_by"	=> "",
	*		"offset"	=> "",
	*		"limit"		=> ""
	*	);	
	*
	*	@args	array	tableau d'arguments
	*	@return	array	tableau multi-dimensionnel
	**********************************/
	public function get_list($args)
	{
		/*
		$args = array(
					"filter_name"	=> "",
					"filter_value"	=> "",
					"type"			=> "", //Type transporteurs_md, experiteurs_md, etc...
					"alaune"		=> "", //Une fiche est à la une si elle est payante.
					"offset"		=> "",
					"limit"			=> ""
				);
		*/	
		
		//On récupère la liste des ID. Requête de base
		$query 	=	$this->db->from($this->tbl_fiche);
		
		//Si il y a des filtres, on les ajoutes à la requête
		if(isset($args["filter_name"]))
		{
			
			/**********
			*
			*	un SWITCH sans BREAK !
			*	parce que comme ça, l'instruction par défaut est exécutée quand même.
			*	Si besoin on peut rajouter des "join" pour d'autres tables (types, zones, etc...)
			*
			***************/
			switch($args["filter_name"])
			{
				case 'category_id'	:	$query = $this->db->join($this->tbl_fiche_cats, "fiche_has_category.fiche_id = fiche.id_fiche","left");
										$query = $this->db->join($this->tbl_cats, "category_id = id_category","left");

				default :				$query	=	$this->db->where(array($args["filter_name"] => $args["filter_value"]));
			}
			
		}
		
		
		$this->db->join($this->tbl_fiche_types, "fiche.id_fiche = fiche_has_type.fiche_id","left"); 
		if(isset($args["type"]) AND $args["type"]!="")
		{
			//Si un type est sélectionné, il faut filtrer avec
			$this->db->where(array("type_slug"=>$args["type"]));
			//$this->db->join($this->tbl_fiche_types, "type_slug = ".$args["type"], "left");
			
		}
		if(isset($args["limit"]) AND $args["limit"] != "")
		{
			$query 	=	$this->db->limit($args["limit"],$args["offset"]);
		}
		
		//Si on ne veut que les fiches payantes/alaune
		if(isset($args["payante"]) AND $args["payante"]==TRUE)
		{
			$this->db->where(array("payante"=> "1" ));
			//$this->db->join($this->tbl_fiche_types, "type_slug = ".$args["type"], "left");
			
		}
		
		
		
		$query = $this->db->order_by("raison_sociale", "asc");
		//on exécute la requête
		$query = $this->db->get();
		
		//On génère le résultat
		$results = $query->result_array();
		
		/*
$fiches_liste = array();
		foreach($results as $row)
		{
			unset($fiche); 								//on détruit le tableau par précaution.
			$fiche = $this->get($row->id_fiche);		//On récupère chaque fiche
			$fiches_liste[$row->id_fiche] = $fiche;		//On alimente le tableau global de résultat
		}
		*/
		
		if(count($results) >=1)
		{
			//On ajoute le tableau des catégories de la fiche au résultats.
			foreach($results as $key => $fiche)
			{
				
				$cats = $this->get_fiche_cats($fiche["id_fiche"]); //On récupère les infos de catégorie
				$results[$key]["category"]=$cats;					//On les ajoute aux résultats.
				
			}
		}
		

		

		
		return $results;
		
		
	}
	
	
	
	
	public function count_list($args)
	{
		/*
		$args = array(
					"filter_name"	=> "",
					"filter_value"	=> "",
					"type"			=> "",
					"offset"		=> "",
					"limit"			=> ""
				);	
		*/
		
			

		//On récupère la liste des ID. Requête de base
		$query 	=	$this->db->from("fiche");
		
		//Si il y a des filtres, on les ajoutes à la requête
		if(isset($args["filter_name"]))
		{
			
			/**********
			*
			*	un SWITCH sans BREAK !
			*	parce que comme ça, l'instruction par défaut est exécutée quand même.
			*	Si besoin on peut rajouter des "join" pour d'autres tables (types, zones, etc...)
			*
			***************/
			switch($args["filter_name"])
			{
				case 'category_id'	:	$query = $this->db->join($this->tbl_fiche_cats, "fiche_id = id_fiche","left");
										$query = $this->db->join($this->tbl_cats, "category_id = id_category","left");

				default :				$query	=	$this->db->where(array($args["filter_name"] => $args["filter_value"]));
			}
			
		}
		
		$this->db->join($this->tbl_fiche_types, "fiche_has_type.fiche_id = id_fiche", "left");
		//Si un type est sélectionné, il faut filtrer avec 
		if(isset($args["type"]) AND $args["type"]!="")
		{
			
			$this->db->where(array("type_slug"=>$args["type"]));
			//$this->db->join($this->tbl_fiche_types, "type_slug = ".$args["type"], "left");
			
		}

		if(array_key_exists("limit",$args))
		{
			if($args["limit"] != "" && $args["offset"] != "")
			{
				$query 	=	$this->db->limit($args["limit"],$args["offset"]);
			}
		}

			
		
		
		//on exécute la requête
		
		$count = $this->db->count_all_results();

				
		return $count;
		
		
	}
	
	
	/******
	*
	*	met à jour l'enregistrement de l'objet
	*	on récupère un tableau fournis par l'objet lui-même (fiche->save())
	*	parceque les attributs de l'objet ne sont pas en accès direct (private)
	*	et bloquent la requête SQL.
	*
	**********************************/
	public function update($fiche_array)
	{



		$exception_field = array("categories","types","zones");
		//On met à jour les informations principales
		foreach($fiche_array as $field=>$value)
		{

			if(!in_array($field,$exception_field))
			{
				$this->db->set($field,$value);
			}
		}
		$this->db->where("id_fiche",$fiche_array["id_fiche"]);		
		$this->db->update($this->tbl_fiche);		
		

		//On supprime les enregs présents dans les tables de liaison
		$this->db->delete($this->tbl_fiche_cats, array("fiche_id" 	=> $fiche_array["id_fiche"]));
		$this->db->delete($this->tbl_fiche_types, array("fiche_id" 	=> $fiche_array["id_fiche"]));
		$this->db->delete($this->tbl_fiche_zones, array("fiche_id" 	=> $fiche_array["id_fiche"]));
		//On insert le nouveau lot de catégories
		//Si l'objet contient des éléments de dépendance, on les ajoute dans les tables appropriées
		$this->_add_cats($fiche_array);
		$this->_add_types($fiche_array);
		$this->_add_zones($fiche_array);

		
		return;

		
	}
	
	
	protected function _publishing($bool)
	{
		if($bool)
		{
			//on publie
			$this->db->set("publication_status","published");
			
		}else{
			//on dépublie
			$this->db->set("publication_status","unpublished");

		}
		$this->db->where("id_fiche",$this->id_fiche);
		$this->db->update($this->tbl_fiche);
	}
	
	
	




	
}
