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

	
	
	 public function index()
	 {
	 
	 	$this->data["domaine"] = NULL;
		$this->_layout('login');
	}
	
	
	
	
	
	private function _layout($layout)
	{
		$this->data["body_id"] = "landing_page";
		$this->layout->view("_html_head", 	$this->data);
		$this->layout->view("_menu", 	$this->data);
		$this->layout->view("_breadcrumb", $this->data);
		
		$this->layout->view($layout, $this->data);
		$this->layout->view("_html_foot");
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */