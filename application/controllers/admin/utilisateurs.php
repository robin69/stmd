<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilisateurs extends CI_Controller {


	public $theme 		= "admin";
	public $data		= array("");




	public function __construct()
	{
		parent::__construct();
		
		$this->layout->set_theme($this->theme);
		$this->data["activ_menu"] 	= 	"utilisateurs";
		$this->data["page_title"]	=	"GESTION DES UTILISATEURS";
		$this->data["sub_title"]	=	"Tous les utilisateurs";
		$this->data["utilisateurs"]	=	array();
		
		

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
	
	/***
	*
	*	Function index()
	*
	*	affiche par la liste des utilisateurs
	*/
	public function index()
	{
		//par défaut on affiche la liste des utilisateurs
		$this->liste();
	}
	
	
	/********************************
	*
	*	Function liste
	*
	*	Liste les utilisateurs tenant compte de la pagination.
	*
	*	
	*
	*********************************/
	public function liste()
	{
	
	
		//Je récupère le tableau d'argument de l'url.
		$uri_array = $this->uri->uri_to_assoc(4);
		
		//Si il y a un numéro de page
		if(array_key_exists("offset",$uri_array)){
			$offset = $uri_array["offset"];		//On le récupère
			unset($uri_array["offset"]);			//Puis on détuit l'élément du tableau
		}else{
			$offset = 0;
		}
		
		//On crée une instance du manageur de fiche
		$u_manager = new User_manager;
		//On récupère le nombre totale de lignes
		$config["total_rows"] = $u_manager->count_list($uri_array);
		//On définie l'URL de pagination
		$uri = $this->uri->assoc_to_uri($uri_array)."/";
		
		$config["base_url"] = site_url("admin/utilisateurs/liste")."/".$uri."/offset/";
		$config['uri_segment'] = (count($uri_array)*2)+5;	//Une entrée dans le tableau = 2 éléments (key et value) donc 2 segments d'url.
		$config["per_page"] = $this->config->item('elem_per_page');
		
		
		//On complète la reqûete pour l'affichage et on lance la requête
		$uri_array["offset"]	= 	$offset;
		$uri_array["limit"]		=	$config["per_page"];
		$liste_user = $u_manager->get_list($uri_array);
		
		//On parse le résultat pour générer la variable $data["fiches"];
		$this->data["users"] = array();
		if(count($liste_user)>=1)
		{
			foreach($liste_user as $key => $user)
			{
				$item = new User($user["id_user"]);

				array_push($this->data["users"],$item);
			}

		}	
		
		//Envois pour affichage		
		$this->pagination->initialize($config); 

		$this->_layout("utilisateur_liste");

		
		
	}
	
	
	private function _layout($layout)
	{
		$this->_prepar_pagination();
		$this->layout->view("_header");
		$this->layout->view("_menu", $this->data);
		$this->layout->view($layout, $this->data);
		$this->layout->view("_footer");

	}
	
	
	private function _prepar_pagination()
	{
		$actual_uri = $this->uri->uri_string();
		$config["base_url"]	=	"admin/utilisateurs/liste";

	}

	
	/***************************************
	*
	*	EDIT Function
	*
	*	@id_user : Identifiant de l'utilisateur
	*
	*****************************************/
	public function edit($id_user)
	{


		if($this->input->post())
		{

			if($this->form_validation->run("utilisateur_form") == TRUE)
			{
				$u = $this->_update_object_field();
			}

			//On récupère les informations de la fiche
			$u = new User;
			$infos = $u->get($id_user);
			$u->hydrate($infos);

		}else{
			//On récupère les informations de la fiche
			$u = new User;
			$infos = $u->get($id_user);
			$u->hydrate($infos);
		}


		$this->data["title"]				=	"MODIFIER UN UTILISATEUR";
		$this->data["form"]					=	"modif";
		$this->data["utilisateur"] 			=	$u;
		$this->data["submit_button_label"]	=	"Mettre à jour";


		$this->_layout("utilisateur_form");
	}
	

	/****
	*
	*	Met à jour l'objet
	*	avec les éléments envoyés par le post
	*
	*
	*
	*
	*/
	private function _update_object_field()
	{
		//On récupère les informations actuelles
		$user = new User;
		$infos = $user->get($this->input->post("id_user"));
		$user->hydrate($infos);

		$exception_fields = array("passconf");
		//On ajoute modifie avec les informations du post
		foreach($this->input->post() as $field => $value)
		{
			if(!in_array($field, $exception_fields))
			{
				$method_name = "set_".$field;
				$user->$method_name($value);
			}

		}


		//on Enregistre l'objet.
		$user->_save();


		return $user;
	}
	
	
	public function add()
	{
		$u = new User;

		if($this->input->post())
		{



			//si le formulaire est correctement renseigné
			if($this->form_validation->run("utilisateur_form") == TRUE)
			{
				$u->hydrate($this->input->post());	//On alimente l'objet
				$id_user = $u->_save();


				redirect("admin/utilisateurs/edit/".$id_user);
			}

		}
		$this->data["title"]				=	"AJOUTER UN NOUVEL UTILISATEUR";
		$this->data["form"]					=	"add";
		$this->data["utilisateur"]			=	$u;
		$this->data["submit_button_label"]	=	"Enregistrer";
		$this->data["sub_menu_actif"]		=	"user_add";




		$this->_layout("utilisateur_form");
	}
	

	public function logout()
	{
		$this->user->disconnect_user();
		redirect("/");
	}
	

	public function delete($id_user)
	{

		$u = new User;
		$u->delete($id_user);
		//On récupère l'url d'origine et on redirige vers cette url
		$url_back = str_replace(site_url(),"",$_SERVER["HTTP_REFERER"]);
		redirect($url_back);

	}


    /****************************************
     * Affiche la liste des demandes utilisateur
     * pour le changement de forfait
     *
     *
     */
    public function demandes_liste()
    {
        //Je récupère le tableau d'argument de l'url.
        $uri_array = $this->uri->uri_to_assoc(4);

        //Si il y a un numéro de page
        if(array_key_exists("offset",$uri_array)){
            $offset = $uri_array["offset"];		//On le récupère
            unset($uri_array["offset"]);			//Puis on détuit l'élément du tableau
        }else{
            $offset = 0;
        }


        $this->load->model("forfait");
        $Forfaits = new Forfait();
        //On récupère le nombre totale de lignes
        $config["total_rows"] = count($Forfaits->get_demmandes_chg_forfait());
        //On définie l'URL de pagination
        $uri = $this->uri->assoc_to_uri($uri_array)."/";

        $config["base_url"] = site_url("admin/utilisateurs/demandes_liste")."/".$uri."/offset/";
        $config['uri_segment'] = (count($uri_array)*2)+5;	//Une entrée dans le tableau = 2 éléments (key et value) donc 2 segments d'url.
        $config["per_page"] = $this->config->item('elem_per_page');


        //On complète la reqûete pour l'affichage et on lance la requête
        $uri_array["offset"]	        = 	$offset;
        $uri_array["limit"]		        =	$config["per_page"];
        $this->data["liste_demandes"]   = $Forfaits->get_demmandes_chg_forfait();



        //Envois pour affichage
        $this->pagination->initialize($config);

        $this->data["page_title"]   =   "Liste des demandes de changement de forfait";
        $this->data["sub_title"]    =   "La liste ci-dessous présente chaque utilisateur ayant effectué une demande de changement de forfait dans son espace perso.";
        $this->_layout("demandes_liste");



    }

	
	
	
	
}