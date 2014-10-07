<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Forms extends CI_Controller {
	
	
	
	public function __constrcut()
	{
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}
	
	public function index()
	{
		$this->layout->set_theme("admin");
		$this->layout->view("login");
	} 
	
	
	
	
	public function sign_in()
	{
		$this->layout->set_theme("front");
		$this->form_validation->set_rules('nom', 'Nom', 'required|trim');
		$this->form_validation->set_rules('prenom', 'Prénom', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('tel', 'Téléphone', 'required|trim');
		$this->form_validation->set_rules('userpass', 'Mot de passe', 'required|trim|matches[userpassconf]|md5');
		$this->form_validation->set_rules('userpassconf', 'Confirmation Mot de passe', 'required|trim|md5');
		$this->form_validation->set_rules('cgu_conf', 'Acceptation des Conditions Générales d\'Utilisation', 'required|trim');
		
		$this->User_model->add_user() == TRUE;
		$this->User_model->activation_mail();
		
		/*
if($this->form_validation->run()== FALSE)
		{
			$this->layout->view("inscription");
		}else{
		
			
			if($this->User_model->add_user() == TRUE)
			{

				$this->User_model->activation_mail();
				die("END OF SCRIPT");
				$this->layout->view("espace_inscrits");
			}else{
				$this->layout->view("espace_inscrits");
			}
		}
*/
		
		
		
	}
	
	
	public function logout()
	{
		$this->User_model->disconnect_user();
		redirect("/");
	}
	
	public function front_loggin()
	{
		$this->form_validation->set_rules('username','Identifiant','required|valid_email||trim|min_length[5]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('pass','Mot de pass','required|trim|md5');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->layout->view("inscription");
			
		}else{
		
			//On tenete l'identification
			$this->User_model->identify_user($_POST["username"], $_POST["pass"]);
			//si oui,...
			if($this->session->userdata("logged_in"))
			{
				//On redirige vers l'espace inscrit
				redirect("/espace_inscrits/");
			}else{
			
				//Sinon, on retour sur la page insription
				$this->layout->view("inscription");
			}
		}
	}
	
	
	
	
}
