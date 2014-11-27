<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {


	public $theme 		= "admin";
	public $data		= array("");




	public function __construct()
	{
		parent::__construct();
		
		$this->layout->set_theme($this->theme);
		$this->data["activ_menu"] 	= 	"categories";
		$this->data["page_title"]	=	"GESTION DES CATEGORIES";
		$this->data["sub_title"]	=	"Toutes les catégories";
		$this->data["categories"]		=	array();
	}
	
	public function _remap($method, $params = array())
	{
		 //Protection 
 		 $this->user->protect();
		 
		 //renvois général avec les paramètres.
		 if(method_exists($this, $method))
		 {
			 return call_user_func_array(array($this, $method), $params);
		 }
	}

	
	/***
	*
	*	Function index()
	*
	*	affiche par la liste des fiches
	*/
	public function index()
	{
		//par défaut on affiche la liste des fiches
		$this->liste();
	}
	
	
	/********************************
	*
	*
	*
	*
	*
	*********************************/
	public function liste()
	{
	
		//Je récupère le tableau d'argument de l'url.
		$uri_array = $this->uri->uri_to_assoc(4);
		
		//Si il y a un numéro de page
		if(array_key_exists("offset",$uri_array)){
			$offset = $uri_array["offset"];		//On le récupère
			unset($uri_array["offset"]);			//Puis on détuit l'élément du tableau
		}else{
			$offset = 0;
		}
		
		//On crée une instance du manageur de catégorie
		$category = new Category;
		//On récupère le nombre totale de lignes
		$config["total_rows"] = $category->count_list($uri_array);
		//On définie l'URL de pagination
		$uri = $this->uri->assoc_to_uri($uri_array)."/";
		
		$config["base_url"] = site_url("admin/categories/liste")."/".$uri."/offset/";
		$config['uri_segment'] = (count($uri_array)*2)+5;	//Une entrée dans le tableau = 2 éléments (key et value) donc 2 segments d'url.
		$config["per_page"] = $this->config->item('elem_per_page');
		
		
		//On complète la reqûete pour l'affichage et on lance la requête
		$uri_array["offset"]	= 	$offset;
		$uri_array["limit"]		=	$config["per_page"];
		$liste_cats = $category->get_list($uri_array);
		

		//On parse le résultat pour générer la variable $data["categories"];
		$this->data["categories"] = array();
		if(count($liste_cats)>=1)
		{
			foreach($liste_cats as $key => $cat)
			{
				$item = new Category($cat["id_category"]);
				array_push($this->data["categories"],$item);
			}

		}	
		
		//Envois pour affichage		
		$this->pagination->initialize($config); 

		$this->_layout("cat_liste");
		
	}
	
	
	/***************************************
	*
	*	EDIT Function
	*
	*	@id_fiche : Identifiant de la fiche
	*
	*****************************************/
	public function edit($id_category)
	{
		//On vérifie les informations envoyées
		if($this->form_validation->run("cat_form_modif") == TRUE)
		{
			//On récupère les informations dans la base
			$cat = new Category($id_category);
			
			//on met à jour l'objet avec les informations du post
			$cat->hydrate($this->input->post());
			
			//on sauvegarde
			$cat->_save();

			//On instancie une fiche
			$cat = new Category($id_category);
		}
		
	
		$this->data["title"]		=	"MODIFIER UNE CATÉGORIE";
		$this->data["form"]			=	"modif";
		$this->data["cat"] =	new Category($id_category);
		$types = new Type;
		$this->data["types"]	= $types->get_types();
		$cat = new Category;
		$this->data["cat_liste"] = $cat->get_all_domaines();
		$this->data["submit_button_label"]	=	"Mettre à jour";
		$this->data["sub_menu_actif"]		=	"cat_form";
		
		$this->_layout("cat_form");
	}
	
	
	
	public function add()
	{
		$c = new Category;
		
		if($this->input->post())
		{
			
			//si le formulaire est correctement renseigné
			if($this->form_validation->run("cat_form") == TRUE)
			{
				$c->hydrate($this->input->post());	//On alimente l'objet
				$id_cat = $c->_save();

				redirect("admin/categories/edit/".$id_cat);
			}
			
		}
		$this->data["title"]				=	"AJOUTER UN NOUVEL CATEGORIE";
		$this->data["form"]					=	"add";
		$this->data["submit_button_label"]	=	"Enregistrer";
		$this->data["cat"]				=	$c;
		$this->data["sub_menu_actif"]		=	"cat_add";
		
		//On récupère la liste des types de fiche
		$types = new Type;
		$this->data["types"]	= 	$types->get_types();
		$cat = new Category;
		$this->data["cat_liste"] = $cat->get_all_domaines();
		
		$this->_layout("cat_form");
	}

	
	
	
	public function edit_submit()
	{

		//On vérifie les informations envoyées
		if($this->form_validation->run("cat_form_modif") == TRUE)
		{


			//On instancie une fiche
			$cat = new Category_model();
			//on nourris l'objet avec les infos du post
			$cat->build($this->input->post());
			if($cat->update())
			{
				//On envois un message de confirmation au formulaire
				$this->data["notification_note"] = array("type"=>"success","msg"=>"La mise à jour s'est effectuée correctement");
			}else{
				$this->data["notification_note"] = array("type"=>"error","msg"=>"Il y a eu problème pendant la mise à jour");
			}
			
			//On revient sur le formulaire d'édition
			$this->edit($cat->id_category);
			
			
		}else{
			$this->edit($cat->id_category);
		}
	}
	
	
	
	public function add_submit()
	{

		$this->data["form"]		=	"add";
		$this->data["title"]	=	"AJOUTER UNE CATÉGORIE";
		//On récupère la liste des types de fiche
		$types = new Type_model;
		$this->data["types"]	= 	$types->get_types();
		$cat = new Category_model;
		$this->data["cat_liste"] = $cat->get_domaine();

		//On vérifie les informations envoyées
		if($this->form_validation->run("cat_form") == TRUE)
		{
			$cat = new Category_model;
			$cat->build($this->input->post());
			$this->id_category = $cat->add();
			$this->edit($this->id_category);
			
			
		}else{
			//echo validation_errors();
			$this->_layout("cat_form");
		}
	}
	
	
	
	
	/**
	*
	*	Supprime une catégorie.
	*
	*	!!! ATTENTION !!!!
	*	Supprime aussi les types et le GUID de la catégorie.
	*
	*/
	public function delete($id)
	{
		//Suppression de la catégorie
		$cat = new Category;
		$cat->delete($id);
		
		redirect("admin/categories/liste");
		

	}
	
	
	/*****************************
	*
	*	Importer les catégories de 
	*	l'ancien site SolutionsTMD.
	*	Nes pas utiliser pour importer de
	*	nouvelles catégories
	*
	*
	***************/
	public function import_from_old_site()
	{
	
		
		//On se connecte à la base de données de l'ancien site
		$DB1 = $this->load->database('old', TRUE);
		//On se connecte à la base de données de l'ancien site
		$DB2 = $this->load->database('dev', TRUE);

		
		$query = $DB1->get("solutionstmd.cat");
		$categories = $query->result();
		
		//On remet à zéro les deux tables
		$query = $DB2->truncate("stmd.category");			//La table catégory
		$query = $DB2->truncate("stmd.cat_has_type");		//La table des types pour les catégories
		$query2 = $this->db->delete("guid", array("content_type" => "category"));
		
		
		//Pour chaque catégorie
		$stored_cat = array();
		foreach($categories as $cat)
		{

			
			
			
			$cat->nom = stripslashes($cat->nom);
			
			//Si la catégories n'existe pas
			if(!in_array($cat->nom, $stored_cat))
			{
				switch($cat->main_cat)
				{
					case "1"	:	$type = array("transporteurs_md");		break;
					case "2"	:	$type = array("expediteurs_md");		break;
					case "3"	:	$type = array("conseiller_securite");	break;
				}
				
				echo "<h3>La catégorie n'existe pas </h3>";
				$array = array(
					"public_name"	=>	$cat->nom,
					"type"			=>	$type
				);
				
				$c = new Category;
				$c->hydrate($array);
				$c->_save();
				
				//on ajoute les noms des catégories insérées dans un tableau
				array_push($stored_cat, $cat->nom);
			}else{
				echo "<h3>La catégorie existe déjà !!!!!! </h3>";
				
				//On formate le nom
				$nom = url_title($cat->nom);
				//On récupère l'id de l'affiche
				$query = $DB2->get_where("stmd.category", array("slug"=>$nom) );
				$result = $query->row_array();
				
				$c = new Category($result["id_category"]);
				
				echo $cat->main_cat;
				switch($cat->main_cat)
				{
					case "1"	:	$type = array("transporteurs_md");		break;
					case "2"	:	$type = array("expediteurs_md");		break;
					case "3"	:	$type = array("conseiller_securite");	break;
				}
				
				//On compile ça avec le type actuel de l'objt
				$cat_types = $c->type(); //Le type actul

				array_push($cat_types, $type[0]); //on ajoute le nouveau type
				
				$c->set_type($cat_types);
				$c->_save();
				
			}

		}
			
			
		//fin chaque catégorie
		
	}
	
	
	
	private function _layout($layout)
	{
		$this->layout->view("_header");
		$this->layout->view("_menu", $this->data);
		$this->layout->view($layout, $this->data);
		$this->layout->view("_footer");
		
	}
	
	
	
}