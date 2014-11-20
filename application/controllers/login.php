<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 	public $theme = "stmd2014";

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	 {
		 parent::__construct();
				 
		 
		 $this->layout->set_theme($this->theme);
	 }
	 
	 public function _remap($method, $params =array())
	 {

	 	/*****************************************************
	 	*
	 	*	On ne tente une authentification auto que lorsqu'on 
	 	*	n'utilise pas un token et lorsqu'on n'est pas déjà
	 	*	entrain d'essayer de se connecter avec un profil.
	 	*
	 	***************************************************/
		 if($method != "token" AND $method != "connexion"){


             if($this->session->userdata("id_user") != ""){ //si l'utilisateur est déjà identifié on renvois vers l'espace inscrit

                 redirect("/espace_inscrits/");

             } elseif($this->input->cookie("smtp_auth") != ""){ //si l'utilisateur a un cookie, on lance l'anthentifiaction

                 //TODO : rediriger ver l'ancer l'authentification avec les infos du cookie
                 echo "il y a un cookie !";
                 $u = new User;
                 try{

                     $u->auto_auth();

                 } catch(Exception $e){

                     delete_cookie("stmd_auth"); // On supprime le cookie s'il y en a un
                     $this->index();
                     exit;
                 }
             } else{
                 $this->index();
             }

         }else{
			 return call_user_func_array(array($this, $method), $params);
		 }
	 }

	 public function token()
	 {
	 	//On récupère les informations contenues dans le token
	 	$token = $this->input->get("token");
	 	$mails = new Mails;
	 	$token_datas = $mails->tokenread($token);
	 	
	 	//en fonction de ACTION on fait ce qu'il y a à faire
	 	switch($token_datas["action"])
	 	{
		 	case "account_confirm"	:	
		 		$u = new User;
		 		//On récupère les infos de l'utilisateur
		 		$user_id = $u->auth($token_datas["email"], $token_datas["userpass"]);
		 		$our_user = new User($user_id);
		 		
		 		
		 		//On met à jour l'utilisateur en activant son compte
		 		$our_user->set_compte_status("active");
		 		$our_user->_save();
		 		
		 		//on crée une fiche vide pour cet utilisateur
		 		$user_fiche = new Fiche;
		 		$user_fiche->set_user_id($user_id);
		 		$user_fiche->set_publication_status("unpublished");
		 		$user_fiche->set_date_creation();
		 		$user_fiche->set_payante("0");
		 		$user_fiche->_save();
		 		
		 		
		 		//On crée la session utilisateur
		 		$our_user->create_user_session($our_user->id_user());
		 		
		 		
		 		//On redirige vers l'accueil de l'espace inscrit.
		 		$this->_layout("/esp_inscrit/accueil");
		 		
	 	}
	 }
	
	
	 public function index()
	 {
	 
	 	$this->data["domaine"] = NULL;
		$this->_layout('login');
	}
	
	public function connexion()
	{
		

		try {
			//On prépare les infos pour l'authentification
			$email 			= $this->input->post("email");
			$pass 			= $this->input->post("userpass");
			$cookie_set 	= $this->input->post("cookie_set");
			
			//On lance l'anthentification
			$u = new User;
			$u_id = $u->auth($email,md5($pass));
			
			//On crée la session
			$u->create_user_session($u_id);
			
			//On crée un cookie
			if(isset($cookie_set) AND $cookie_set == "on")
			{
				$u->create_user_cookie($email,$pass);
			}
			
			
			redirect("/espace_inscrits");
		} catch (Exception $e) {
			$error = "Exception reçue : ".$e->getMessage()."\n";
		}

		$this->_layout("login");
		
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */