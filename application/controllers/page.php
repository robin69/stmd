<?php

class Page extends CI_Controller{




    var $data = array();
	var $guid = "";
	var $contenu = "";
	var $theme = "stmd2014";

	public function __construct()
	{
	
		parent::__construct();
		$this->layout->set_theme($this->theme);
		
		//On récupère la chaine demandée par l'url
		$this->guid = $this->uri->uri_string();

        //On regarde dans la base si le contenu existe
        $cnt = new Content();
		$this->contenu = $cnt->get_contenu_by_guid($this->guid);

        //Is le contenu n'existe pas dans la base
		if($this->contenu === FALSE){
          //On va voir s'il y a une page statique
            $this->_layout($this->guid);

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

		//Si on est sur un controller incconu, on arrive ici. `
		//on récupère l'URL
		//echo "on cherche : ".$this->guid;
		
		
	}
	
	public function error404()
	{
		$this->_layout->view("404");
	}
	
	public function page()
	{
		echo "coucou";
	}


    private function _layout($layout)
    {
        $this->data["body_id"]	=	"home";
        $this->data["domaine"]  =   "";
        $this->data["no_google_map"]  =   "";

        /* 		$this->data["view_has_slider"] = TRUE; */
        $this->layout->view("_html_head", 	$this->data);
        $this->layout->view("_menu", 	$this->data);
        $this->layout->view("_breadcrumb", $this->data);
        $this->layout->view($layout, 	$this->data);
        $this->layout->view("_html_foot", 	$this->data);

    }
}