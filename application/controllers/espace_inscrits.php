<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Espace_inscrits extends CI_Controller {

	var $theme = "stmd2014";


	public function __construct()
	{
		parent::__construct();
		
		$this->layout->set_theme($this->theme);
	}
	
	
	public function index()
	{
	
		$this->_layout("esp_insc_accueil");
		$this->layout->view("espace_inscrits");
	}
}