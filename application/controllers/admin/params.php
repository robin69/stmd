<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Params extends CI_Controller
{

	
	public $theme = "admin";
	public $activ_menu = "settings";
	
	
	
	function __construct()
	{
		parent::__construct();
		
		
		$this->layout->set_theme($this->theme);

		
		
	}
	
	function test_mail()
	{
		echo "coucou";
		$this->load->model("Mail_model"); 
		$sysmail = new Mail_model;
		
		$sysmail->to = "robin.rumeau@gmail.com";
		$sysmail->confirmation_adr_mail();

		$this->layout->set_theme($this->theme);
		$this->_layout("test_mail");
		
	}
	
		
	
	private function _layout($layout)
	{
		$this->data = array();
		//$this->layout->view("_header");
		//$this->layout->view("_menu", $this->data);
		$this->layout->view($layout, $this->data);
		//$this->layout->view("_footer");
		
	}
}