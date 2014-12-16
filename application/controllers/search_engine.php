<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*	Classe qui assure la recherche dans l'annuaire
*	par mot clefs en Fulltext.
*
*
********/
class Search_engine extends CI_Controller{

	public $test;

	public $guid = "";
	public $contenu = "";

	public function __construct()
	{
		parent::__construct();
	}




    /***************************
     * Lorsque l'utilisateur fait une recherche
     * il pointe son formulaire vers cette fonction
     * On encode alors la chaine cherchée et on redirige
     * vers la page recherche avec la chaine dans l'URL.
     */
	public function index()
	{
		//On récupère la chaine de recherche
		$string = urlencode($this->input->get("string"));



       //On renvvois vers cette URL pour l'avoir réécrite dans le navigateur
        redirect("recherche/". $string . "/");



		//On récupère l'offset s'il y en a un
		//$this->search();
	}
	
	public function search($string,$offset=0)
	{
		
		//$string = $this->input->get("string");

       $string =  urldecode($this->uri->segment(2));
        //echo "string = ". $string;
		//On instancie la classe fiche
		$f= new Fiche;

		//On compte les résultats
		$config["total_rows"] = $this->data["total_fiches"] = $f->search_fiche($string,$offset,TRUE,TRUE);
		$config["per_page"] = $this->config->item('elem_per_page');

		//$config['enable_query_strings'] = TRUE;
		$config["base_url"] 	= site_url("recherche/".$string."/");
		
		//On construit la requête
		$this->data["fiches"] = $f->search_fiche($string,$offset,TRUE);



		//On alimente la liste des catégories dans $this->data
		$this->data["breadcrumb"] = array(
			"SolutionsTMD"	=> "/",
			"Recherche " => "/recherche/",
			$string	=>	""
		);


		//Configuration de la pagination
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '<<';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '>>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="selected" >';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$this->_layout("ann_results");

	}
	
	
		
	
	
	
	private function _layout($layout)
	{
		$this->data["domaine"] = "";
		$this->data["alaune"] = NULL;
		$this->data["menu_sidebar"] = NULL; //Lorsqu'on fait une recherche, le menu de la sidebar est à NULL pour qu'il ne soit pas affiché et laisse la place aux autres éléments.
		
		switch($layout)
		{
			case 'ann_liste_cat' :	$this->data["body_id"]	=	"annuaire-transp";
									break;
			case 'choisir_griffe' :	$this->data["body_id"]	=	"home";
									break;
			case 'ann_results' :	$this->data["body_id"]	=	"search_result";
									break;

			default :				$this->data["body_id"]	=	"home";
									break;
		}
		$this->layout->view("_html_head", 	$this->data);
		$this->layout->view("_menu", 	$this->data);
		$this->layout->view("_breadcrumb", $this->data);
		$this->layout->view($layout, 	$this->data);
		$this->layout->view("_html_foot", 	$this->data);
		
	}
	
}
