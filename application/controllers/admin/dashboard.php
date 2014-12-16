<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	var $theme = "admin";
	var $data		= array();

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
		 $this->data["activ_menu"] 	= 	"dashboard";
		 $this->data["page_title"]	=	"Votre tableau de bord";
		 
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


	 
	public function index()
	{
        $f = new Fiche_manager();
        //Menu Action
        $this->data["fiches_a_moderer"] = $f->get_fiche_to_moderate();
        $this->data["fiches_att_paiement"]  =   $f->get_fiche_unpaid();

		$this->layout->view("_header");
		$this->layout->view("_menu", $this->data);
		$this->layout->view('index', $this->data);
		$this->layout->view("_footer");

	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */