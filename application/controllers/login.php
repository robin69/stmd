<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


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
		 if($method != "token" AND $method != "connexion" AND $method != "sign_up" ){

             if($this->session->userdata("id_user") != ""){ //si l'utilisateur est déjà identifié on renvois vers l'espace inscrit

                 redirect("/espace_inscrits/");

             } elseif($this->input->cookie("smtp_auth") != ""){ //si l'utilisateur a un cookie, on lance l'anthentifiaction

                 //TODO : rediriger ver l'ancer l'authentification avec les infos du cookie
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
         $token = new Token();
         if($token->execute() === true)
         {
             //On redirige vers l'accueil de l'espace inscrit
             redirect("espace_inscrits");
         }
	 }
	
	
	 public function index()
	 {

	 	$this->data["domaine"] = NULL;
         $this->data["breadcrumb"]["Annuaire MD"]    =   "/";
         $this->data["breadcrumb"]["Accès à votre espace"]    =   "/login/";
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


    public function sign_up()
    {

        //Si on ne passe pas la vérification
        if($this->form_validation->run("front_sign_up_form") == FALSE)
        {

            //On retourne au formualaire. Les messages d'erreurs sont automatiquement affichés
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