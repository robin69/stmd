<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Contenus extends CI_Controller
{

	public $theme 		= "admin";
	public $data		= array("");
	
	
	
	
	public function __construct()
	{
		parent::__construct();
		
		$this->layout->set_theme($this->theme);
		$this->data["activ_menu"] 	= 	"contenus";
		$this->data["page_title"]	=	"GESTION DES CONTENUS";
		$this->data["sub_title"]	=	"Tous les contenus";
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
	*	Function liste()
	*
	*	liste l'ensemble des éléments avec système de pagination.
	*
	*********************************/
	public function liste()
	{
		//On récupère les filtres
		$uri_segments = $this->uri->uri_to_assoc(2);
		$status = $uri_segments["status"];

		//On récupère le nombre d'enregistrement totaux
		$query = $this->db->from("contenu");
		if($uri_segments["status"] != "tous")
		{
			$query = $this->db->where(array('publications_status' => $uri_segments["status"]));
			$uri = "/status/".$uri_segments["status"];
		}else{
			$uri = "/status/tous";
		}
		
		//Configuration pagination
		$config["per_page"] = $this->config->item('elem_per_page');
		$config['uri_segment'] = 6;
		$config["total_rows"] = $this->db->count_all_results();
		$config["base_url"] = site_url("admin/contenus/liste").$uri."/";
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
		$query = $this->db->from("contenu");
		if($uri_segments["status"] != "tous")
		{
			$query = $this->db->where(array('publications_status' => $uri_segments["status"]));
		}
		$query	=	$this->db->get();
		//echo $this->db->last_query();
		$this->data["contenus"] = $query->result();


		 
		
		
		
		//Envois pour affichage
		$this->pagination->initialize($config); 

		$this->_layout("contenu_liste");


		
	}
	
	
	
		
		
	
	
	
	
	/***************************************
	*
	*	EDIT Function
	*
	*	@id_element : Identifiant de l'élément
	*
	*****************************************/
	public function edit($id_contenu)
	{
	
		$this->data["title"]		=	"MODIFIER UN CONTENU";
		$this->data["form"]			=	"modif";
		$this->data["contenu"] =	new Contenu_model($id_contenu);
		$this->_layout("contenu_form");
	}
	
	
	
	public function add()
	{
		$this->data["form"]		=	"add";
		$this->data["title"]	=	"AJOUTER UN CONTENU";
		
		$this->_layout("contenu_form");
	}

	
	
	
	public function edit_submit()
	{
	

		//On vérifie les informations envoyées
		if($this->form_validation->run("contenu_form") == TRUE)
		{

			//On instancie une fiche
			$contenu = new Contenu_model();
			//on nourris l'objet avec les infos du post
			$contenu->build($this->input->post());
			if($contenu->update())
			{
				//On envois un message de confirmation au formulaire
				$this->data["notification_note"] = array("type"=>"success","msg"=>"La mise à jour s'est effectuée correctement");
			}else{
				$this->data["notification_note"] = array("type"=>"error","msg"=>"Il y a eu problème pendant la mise à jour");
			}
			
			//On revient sur le formulaire d'édition
			$this->edit($contenu->id_contenu);
			
		}else{
			$this->edit($$contenu->id_contenu);
		}
	}
	
	
	
	public function add_submit()
	{

		$this->data["form"]		=	"add";
		$this->data["title"]	=	"AJOUTER UN CONTENU";
		//On vérifie les informations envoyées
		if($this->form_validation->run("contenu_form") == TRUE)
		{
			$contenu = new Contenu_model;
			$contenu->build($this->input->post());
			$this->id_contenu = $contenu->add();
			$this->edit($this->id_contenu);
			
			
		}else{
			//echo validation_errors();
			$this->_layout("contenu_form");
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