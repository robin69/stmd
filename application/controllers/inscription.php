<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscription extends CI_Controller {
	

	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{

		$this->layout->view("inscription");

	}
	
	
	public function sign_in()
	{
		
		$this->layout->view("_header");
		$this->layout->view("inscription");
		$this->layout->view("_footer");
	}
	
	
	
	
	
}