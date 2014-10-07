<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscrits extends CI_Controller {


	public $theme 		= "admin";
	public $data		= array("");




	public function __construct()
	{
		parent::__construct();
		
		$this->layout->set_theme($this->theme);
		$this->data["activ_menu"] 	= 	"fiches";
		$this->data["page_title"]	=	"GESTION DES FICHES";
		$this->data["sub_title"]	=	"Toutes les fiches";
		$this->data["fiches"]		=	array();
	}
	
	public function _remap($method, $params = array())
	{
		 //Protection 
 		 $this->utilisateur_model->protect();
		 
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
	*	Liste par status
	*
	*
	*
	*********************************/
	public function liste()
	{
		//On récupère les filtres
		$uri_segments = $this->uri->uri_to_assoc(2);
		$status = $uri_segments["status"];

		//On récupère le nombre d'enregistrement totaux
		$query = $this->db->from("fiche");
		if($uri_segments["status"] != "tous")
		{
			$query = $this->db->where(array('publications_status' => $uri_segments["status"]));
			$uri = "/status/".$uri_segments["status"];
		}else{
			$uri = "/status/tous";
		}
		
		$query = $this->db->join("fiche_has_category", "fiche_id = id_fiche","left");
		$query = $this->db->join("category", "category_id = id_category","left");
		
		//Configuration paginatio
		$config["per_page"] = $this->config->item('elem_per_page');
		$config['uri_segment'] = 6;
		$config["total_rows"] = $this->db->count_all_results();
		$config["base_url"] = site_url("admin/inscrits/liste").$uri."/";
		$config['full_tag_open'] = '<div class="dataTables_paginate paging_full_numbers">';
		$config['full_tag_close'] = '</div>';
		$config['first_tag_open'] = '<span class="first paginate_button">';
		$config['first_tag_close'] = '</span>';
		$config['first_link'] = '<<';
		$config['last_link'] = '>>';
		$config['last_tag_open'] = '<span class="last paginate_button">';
		$config['last_tag_close'] = '</span>';
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<span class="next paginate_button">';
		$config['next_tag_close'] = '</span>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<span class="previous paginate_button">';
		$config['prev_tag_close'] = '</span>';
		$config['cur_tag_open'] = '<span class="paginate_active">';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '<span class="paginate_button">';
		$config['num_tag_close'] = '</span>';


		
		//récupération des informations de page
		$offset =	$this->uri->segment(6);
		$page = $offset/$config["per_page"];

		
		//Récupération des enregistrements à l'affichage.
		$query = $this->db->limit($config["per_page"],$offset);
		$query = $this->db->from("fiche");
		if($uri_segments["status"] != "tous")
		{
			$query = $this->db->where(array('publications_status' => $uri_segments["status"]));
		}
		
		$query = $this->db->join("fiche_has_category", "fiche_id = id_fiche","left");
		$query = $this->db->join("category", "category_id = id_category","left");
		$query	=	$this->db->get();
		//echo $this->db->last_query();
		$this->data["fiches"] = $query->result();
		
		
	


		 //On récupère les catégories principales (domaines)
		 $category = new Category_model;
		 $this->data["categories_principales"] = $category->get_domaine();
		
		
		
		//Envois pour affichage
		$this->pagination->initialize($config); 

		$this->_layout("fiche_liste");


		
	}
	

	/********************************
	*
	*	Liste par catégorie
	*
	*
	*
	*********************************/
	public function liste_by_cat($cat_id)
	{
		
		//On récupère le nombre d'enregistrement totaux
		$query = $this->db->from("fiche");
		$query = $this->db->join("fiche_has_category", "fiche_id = id_fiche", "left");
		$query = $this->db->join("category", "category_id = id_category","left");
		$query = $this->db->where("category_id",$cat_id);
		$config["total_rows"] = $this->db->count_all_results();
		$config["base_url"] = site_url("admin/inscrits/liste_by_cat/".$cat_id."/");
		$config['uri_segment'] = 5;
		$config["per_page"] = $this->config->item('elem_per_page');
		
	/*
	echo $this->db->last_query();
		$this->data["fiches"] = $query->result();
		echo "<pre style='background-color:white;color:black;font-size:16px;text-align:left;'>";
			var_dump($this->data);
		echo "</pre>";
		die("<br />EOF SCRIPT");
*/
		
				
		//Configuration pagination
		
		
		$config['full_tag_open'] = '<div class="dataTables_paginate paging_full_numbers">';
		$config['full_tag_close'] = '</div>';
		$config['first_tag_open'] = '<span class="first paginate_button">';
		$config['first_tag_close'] = '</span>';
		$config['first_link'] = '<<';
		$config['last_link'] = '>>';
		$config['last_tag_open'] = '<span class="last paginate_button">';
		$config['last_tag_close'] = '</span>';
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<span class="next paginate_button">';
		$config['next_tag_close'] = '</span>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<span class="previous paginate_button">';
		$config['prev_tag_close'] = '</span>';
		$config['cur_tag_open'] = '<span class="paginate_active">';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '<span class="paginate_button">';
		$config['num_tag_close'] = '</span>';


		
		//récupération des informations de page
		$offset =	$this->uri->segment(5);
		$page = $offset/$config["per_page"];

		
		//Récupération des enregistrements à l'affichage.
		$query = $this->db->limit($config["per_page"],$offset);
		$query = $this->db->from("fiche");
		$query = $this->db->join("fiche_has_category", "fiche_id = id_fiche", "left");
		$query = $this->db->join("category", "category_id = id_category","left");
		$query = $this->db->where("category_id",$cat_id);

	
		$query	=	$this->db->get();
		//echo $this->db->last_query();
		$this->data["fiches"] = $query->result();

		 //On récupère les catégories principales (domaines)
		 $category = new Category_model;
		 $this->data["categories_principales"] = $category->get_domaine();

	
		//Envois pour affichage
		$this->pagination->initialize($config); 

		$this->_layout("fiche_liste");


		
	}
	
	
	/***************************************
	*
	*	EDIT Function
	*
	*	@id_fiche : Identifiant de la fiche
	*
	*****************************************/
	public function edit_fiche_infos($id_fiche="")
	{
		
		//On traite le formulaire s'il est envoyé
		if($this->input->post())
		{
			if($this->form_validation->run("fiche_infos_update") == TRUE)
			{
				$fiche = $this->_update_object_field();
			}
			
		}else{
			$fiche = new Fiche_model($id_fiche);
		}
		
		
		
		$cat = new Category_model;
		
		$this->data["form"]					=	"modif";
		$this->data["sub_menu_actif"]		=	"fiche_infos_form";
		$this->data["submit_button_label"]	=	"Mettre à jour";
		$this->data["title"]				=	"FICHE : ".$fiche->raison_sociale;
		$this->data["fiche"] 				=	$fiche;
		$this->data["domaines"]				= $cat->get_domaine();
		$this->data["fiche_cats"] 			= $fiche->get_fiche_cats();

		$this->_layout("fiche_infos_form");
	}
	
	
	/***************************************
	*
	*	EDIT Function
	*
	*	@id_fiche : Identifiant de la fiche
	*
	*****************************************/
	public function edit_fiche_desc($id_fiche="")
	{
		//On traite le formulaire s'il est envoyé
		if($this->input->post())
		{
			$fiche = $this->_update_object_field();
			
		}else{
			$fiche = new Fiche_model($id_fiche);
		}
		
		
		
		$cat = new Category_model;
		
		$this->data["form"]					=	"modif";
		$this->data["sub_menu_actif"]		=	"fiche_desc_form";
		$this->data["submit_button_label"]	=	"Mettre à jour";
		$this->data["title"]				=	"FICHE : ".$fiche->raison_sociale;
		$this->data["fiche"] 				=	$fiche;
		$this->data["domaines"]				= $cat->get_domaine();
		$this->data["fiche_cats"] 			= $fiche->get_fiche_cats();

		$this->_layout("fiche_desc_form");
	}
	
	/***************************************
	*
	*	EDIT Function
	*
	*	@id_fiche : Identifiant de la fiche
	*
	*****************************************/
	public function edit_fiche_ressoc($id_fiche="")
	{
		
		//On traite le formulaire s'il est envoyé
		if($this->input->post())
		{
			$fiche = $this->_update_object_field();
			
		}else{
			$fiche = new Fiche_model($id_fiche);
		}
		
		
		
		$cat = new Category_model;
		
		$this->data["form"]					=	"modif";
		$this->data["sub_menu_actif"]		=	"fiche_ressoc_form";
		$this->data["submit_button_label"]	=	"Mettre à jour";
		$this->data["title"]				=	"FICHE : ".$fiche->raison_sociale;
		$this->data["fiche"] 				=	$fiche;
		$this->data["domaines"]				= $cat->get_domaine();
		$this->data["fiche_cats"] 			= $fiche->get_fiche_cats();

		$this->_layout("fiche_ressoc_form");
	}
	
	
	/***************************************
	*
	*	EDIT Function
	*
	*	@id_fiche : Identifiant de la fiche
	*
	*****************************************/
	public function edit_fiche_cat($id_fiche="")
	{

		//On traite le formulaire s'il est envoyé
		if($this->input->post())
		{

			$fiche = $this->_update_object_field();
			
		}else{
			$fiche = new Fiche_model($id_fiche);
		}
		
		
		
		$cat = new Category_model;
		
		$this->data["form"]					=	"modif";
		$this->data["sub_menu_actif"]		=	"fiche_cats_form";
		$this->data["submit_button_label"]	=	"Mettre à jour";
		$this->data["title"]				=	"FICHE : ".$fiche->raison_sociale;
		$this->data["fiche"] 				=	$fiche;
		$this->data["domaines"]				= $cat->get_domaine();
		$this->data["fiche_cats"] 			= $fiche->get_fiche_cats();

		$this->_layout("fiche_cats_form");
	}
	
	
	
	/****
	*
	*	Met à jour l'objet
	*	avec les éléments envoyés par le post
	*
	*
	*
	*
	*/
	private function _update_object_field()
	{
		//on peuple l'objet avec les infos existantes
		$fiche = new Fiche_model($this->input->post("id_fiche"));

		//On met à jour les informations de l'objet
		foreach($this->input->post() as $field => $value)
		{
			$fiche->$field = $value;
		}
		
		//on fait la mise à jour de l'objet
		$fiche->update();	

		return $fiche;	
	}
	
	
	
	public function add()
	{
		$cat = new Category_model;
		$fiche = new Fiche_model;

		if($this->input->post())
		{

			//si le formulaire est correctement renseigné
			if($this->form_validation->run("fiche_infos_add") == TRUE)
			{
				$fiche = $this->_update_object_field();
				
				
				$fiche->date_creation = time();
				
				$id_fiche = $fiche->add();
				
				redirect("admin/inscrits/edit_fiche_infos/".$id_fiche);
			}
			
		}
/* 		echo "coucou"; */
		
		$this->data["form"]					=	"add";
		$this->data["sub_menu_actif"]		=	"fiche_infos_form";
		$this->data["submit_button_label"]	=	"Enregistrer";
		$this->data["title"]				=	"CRÉATION D'UNE NOUVELLE FICHE";
		$this->data["fiche"]				=	$fiche;
		$this->data["domaines"]				= $cat->get_domaine();
		
		$this->_layout("fiche_infos_form");
		

	}

	
	
	
	public function edit_submit()
	{
		
		//On vérifie les informations envoyées
		if($this->form_validation->run("fiche_form_modif") == TRUE)
		{

			//On instancie une fiche
			$fiche = new Fiche_model();
			//on nourris l'objet avec les infos du post
			$fiche->build($this->input->post());
			if($fiche->update())
			{
				//On envois un message de confirmation au formulaire
				$this->data["notification_note"] = array("type"=>"success","msg"=>"La mise à jour s'est effectuée correctement");
			}else{
				$this->data["notification_note"] = array("type"=>"error","msg"=>"Il y a eu problème pendant la mise à jour");
			}
			

				
			if($this->input->post("cat"))
			{
				
				//On met à jour les catégories pour cette fiche. 
				$fiche->update_cats($this->input->post("cat"));
				
			}
			
			//On revient sur le formulaire d'édition
			$this->edit($fiche->id_fiche);
			
		}else{
			$this->edit($fiche->id_fiche);
		}
	}
	
	public function delete($id_fiche)
	{
	
		$fiche = new Fiche_model;
		$fiche->delete($id_fiche);
		//On récupère l'url d'origine et on redirige vers cette url
		$url_back = str_replace(site_url(),"",$_SERVER["HTTP_REFERER"]);
		redirect($url_back);
		
	}
	
	
	
	public function add_submit()
	{
		$this->data["form"]		=	"add";
		$this->data["title"]	=	"AJOUTER UNE FICHE";
		//On vérifie les informations envoyées
		if($this->form_validation->run("fiche_form") == TRUE)
		{
			$fiche = new Fiche_model;
			$fiche->build($this->input->post());
			$this->id_fiche = $fiche->add();
			$this->edit($this->id_fiche);
			
			
		}else{
			//echo validation_errors();
			$this->_layout("fiche_form");
		}
	}
	
	
	
	private function _layout($layout)
	{
		$this->layout->view("_header");
		$this->layout->view("_menu", $this->data);
		$this->layout->view($layout, $this->data);
		$this->layout->view("_footer");
		
	}
	
	
	
}