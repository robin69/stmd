<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Espace_inscrits extends CI_Controller {

	var $theme = "stmd2014";


	public function __construct()
	{
		parent::__construct();
		
		$this->layout->set_theme($this->theme);
	}
	
	public function _remap($method, $params = array())
	{
		 //Protection 
 		 
		 
		 //renvois général avec les paramètres.
		 if(method_exists($this, $method))
		 {
				 return call_user_func_array(array($this, $method), $params);
		 }
	}
	
	public function sign_up()
	{


		//Si on ne passe pas la vérification
		if($this->form_validation->run("front_sign_up_form") == FALSE)
		{
			
			//On retourne au formualaire. Les messages d'erreus sont automatiquement affichés
			$this->_layout("login");
		}else{
		
			//On enregistre l'utilisateur
			$u = new User;
			$u->hydrate($this->input->post());	//On alimente l'objet
			$id_user = $u->_save();
	
	
			//On envois l'email de confirmation
			$mail 			= new Mails;
			$mail->to 		= $this->input->post("email");
			$mail->userpass	= $this->input->post("userpass");
			$mail->account_activation()	;	
			
			//On affiche le message en popin
			$this->data["success"]	=	TRUE;
			$this->data["success_message"]	=	"Un email de confirmation viens de vous être envoyé. Suivez les instructions qu'il contient pour activer votre compte et finaliser votre inscription.";				
				
			$this->_layout("login");
		}
		
		
		
		
	}
	
	
	public function index()
	{
	
		$this->_layout("esp_insc_accueil");

	}
	
	
	
	private function _layout($layout)
	{
		$this->data["no_google_map"] = TRUE;
		$this->data["body_id"] = "landing_page";
		$this->data["domaine"] = NULL;
		$this->layout->view("_html_head", 	$this->data);
		$this->layout->view("_menu", 	$this->data);
		$this->layout->view("_breadcrumb", $this->data);
		
		$this->layout->view($layout, $this->data);
		$this->layout->view("_html_foot");
		
	}
}