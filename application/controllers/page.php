<?php

class Page extends CI_Controller{




	var $guid = "";
	var $contenu = "";
	var $theme = "front";

	public function __construct()
	{
	
		parent::__construct();
		$this->layout->set_theme($this->theme);
		
		//On récupère la chaine demandée par l'url
		$this->guid = $this->uri->uri_string();
		
		//J'utilise le model pour voir si le contenu existe
		$this->contenu = $this->Contenus_model->get_contenu($this->guid);
		if($this->contenu === FALSE){
			$this->error404();
		}else{
			
			
			switch($this->contenu->type)
			{
				case "page"	:	$function_name = "page"; break;
				default : 		$function_name = "error404"; break;
			}
			
			$this->$function_name();
			
		}
	}
	
	public function index()
	{
	
		//SI on est sur un controller connys, on n'arrive pas sur cette page.
		
		//Si on est sur un controller incconu, on arrive ici. `
		//on récupère l'URL
		echo "on cherche : ".$this->guid;
		
		
	}
	
	public function error404()
	{
		$this->layout->view("404");
	}
	
	public function page()
	{
		echo "coucou";
	}
}