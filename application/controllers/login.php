<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	private $CI;
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
		 
		 //On tente l'authentification automatique
		 $u = new User;
		 if($u->auto_auth())
		 {
		 	redirect("/espace_inscrits");
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
			echo "Exception reçue : ".$e->getMessage()."\n";
		}

		$this->_layout("login");
		
	}
	
	
	
	
	
	
	private function _layout($layout)
	{
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