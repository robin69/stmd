<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Login extends CI_Controller
{

	var $theme 	= "admin";
	var $data 	= array();

	public function __construct()
	{
		
		parent::__construct();
		
		$this->layout->set_theme($this->theme);
		$this->index();
	}
	
	
	
	/****************************************************
	*
	**	FUNCTION index (admin/login)
	*
	*
	*	Employé pour le retour de formulaire d'authentification
	*	Lancée par défaut à l'instanciation du controller.
	*
	*	
	*	@is_admin : Si c'est une authentification pour l'admin (TRUE) ou non (FALSE). 
	*
	************************************************************/
	public function index()
	{
		if($this->form_validation->run("login") == FALSE)
		{
			//La librairie de vérification de formulaire auto-loadée
			echo validation_errors();
			$this->_layout("login");
			
			
			
			
		}else{
			
			$u = new User;
			
			//On vérifie login et pass
			$id_user = $this->user->auth($this->input->post("email"),$this->input->post("userpass"),$this->input->post("form_admin"));
/* 			echo $this->db->last_query(); */

			if($id_user !== FALSE)
			{
			

				
				$u->create_user_session($id_user);

				switch($this->input->post("form_admin"))
				{
					case "1" : 
						redirect("/admin/dashboard");
						break;
					
					default :
						redirect("espace_inscrits");	
				}
				
				
			}else{
				$this->layout->view("login");
			}
			
			
	
			if($this->session->userdata("logged_in")==TRUE AND $this->session->userdata("admin") == TRUE)
			{
				redirect("/admin/dashboard");
				//$this->layout->view("index");
			}else{
				$this->layout->view("login");
			}
			
			
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

