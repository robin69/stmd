<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Espace_inscrits extends CI_Controller {

    var $user;
    var $fiche_user;


	public function __construct()
	{
		parent::__construct();
		
		
		$params = "";
		$this->load->library("gravatar", $params);

        //On récupère les informations de l'utilisateur
        $user_id = $this->session->userdata("id_user");
        $this->user= new User($user_id);
        $fiche = new Fiche();
        $this->fiche_user = $fiche->get_user_fiche($user_id);
	}
	
	public function _remap($method, $params = array())
	{
	
		 //Protection
        $this->user->fprotect();

		 //renvois général avec les paramètres.
		 if(method_exists($this, $method))
		 {
				 return call_user_func_array(array($this, $method), $params);
		 }
	}
	

	
	public function logout()
	{
		$this->user->disconnect_user();
		$this->_layout("login");
    }
	
	
	private function _layout($layout)
	{


		$this->data["no_google_map"] 	= TRUE;
		$this->data["body_id"] 			= "esp_insc";
		$this->data["domaine"] 			= NULL;
		$this->layout->view("_html_head", 	$this->data);
		$this->layout->view("_menu", 	$this->data);
		$this->layout->view($layout, $this->data);
		$this->layout->view("_html_foot");

	}
	

	public function index()
	{
		$this->_layout("/esp_inscrit/accueil");
	}
	

	public function user_profil()
	{


        //Si il y a un post, on traite
        $posts = $this->input->post();
        if(!empty($posts))
        {
            //Si il y a un POST je le traite
            if($this->_treat_posts($posts,"form_fiche_profile", "user") == TRUE)
            {
                $this->data["returned_message"] = "Données enregistrées";
            }else{
                $this->data["returned_message"] = "Erreur lors de l'enregistrement";
            }
        }


        //On récupère les informations de l'utilisateur
        $this->data["user"] = New User($this->session->userdata("id_user"));


		$this->_layout("/esp_inscrit/form_user");
	}
	

    /**
     * Fonction qui traite les posts en vérifiant les informations saisies
     * par les utilisateurs avant de les enregistrer en tant que fiche
     *
     * @param $posts    : tableau de post issue de la classe input pour les vérifications de sécurité
     * @param $form : le nom du formulaire pour qu'on puisse gérer les spécificités de chacun des
     *              formulaires
     *
     * @return bool : TRUE/FALSE en fonction du résultat.
     */
	private function _treat_posts($posts, $form, $enregType = "fiche")
    {
        //On lance la vérification.
        if($this->form_validation->run($form) == FALSE)
        {

            return false;
        }else{


            if($enregType == "fiche")
            {
                //On enregistre les informations dans la fiche
                $f = new Fiche();
                $f->get_user_fiche($this->session->userdata("id_user"));//On récupère la fiche par l'ID_USER
                $f->hydrate($posts);//On met à jour l'objet avec les datas du post
                $f->set_temp(TRUE); // On passe la fiche à temporaire (on garde le status de publication), elle ne sera donc pas visible en front.
                $f->_save(); //On sauvegarde dans la base de donées.
            }elseif($enregType == "user"){

                $u = new User($this->session->userdata("id_user"));
                $u->hydrate($posts);
                $u->_save();

            }




            //On retourne True
            return true;
        }
    }
	

    /****************************************
     * Sélection d'un forfait par un utilisateur.
     *
     * On inserre dans la base la table user_has_forfaits un nouvel enregistrement de forfait
     * sans date_debut ni date_fin (qui indicrait que ce forfait a été validé et payé par l'admin).
     *
     * ATTENTION : L'objet Forfait correspond au forfait utilisateur, et non à un forfait lambda (champs différents)
     *
     */
    public function select_forfait()
    {
        //On récupère la demande de l'utilisateur
        $id_user        = ($this->input->post("id_user")) ?     $this->input->post("id_user") : $this->input->get("id_user");
        $id_forfait     = ($this->input->post("id_forfait")) ?  $this->input->post("id_forfait") : $this->input->get("id_forfait");

        //On va chercher le forfait demandé dans la base
        $this->load->model("Forfait");
        $forfait = new Forfait;
        $selected = $forfait->get_by_id($id_forfait);


        //var_dump($selected);


        //On récupère les informations pour affecter le nouveau forfait à l'utilisateur
        $forfait->set_forfait_id($selected->id);
        $forfait->set_user_id($id_user);
        $forfait->set_tarif($selected->tarif);

        //On insert dans la table user_has_forfait la nouvelle demande
        $forfait->save();

        //On informe l'utilisateur que la demande a été effectuée
        //On récupère la liste des forfaits existants
        $this->data["returned_message"] = "Votre demande a été prise en compte. Vous serez contacté dans les meilleurs délais.";
        $this->user_forfait();







    }


	public function user_forfait()
	{

        //On récupère les informations du forfait utilisateur
        $this->load->model("Forfait");
        $f = new Forfait();
        $this->data["user_forfaits"]   = $f->get_user_forfaits($this->session->userdata("id_user"));

        //On récupère la liste des forfaits existants
        $this->data["all_forfaits"] =   $f->get_all_forfaits();
        $this->_layout("/esp_inscrit/form_user_forfait", $this->data);
	}
	

	public function fiche_contact_form()
	{

        //Si il y a un post, on traite
        $posts = $this->input->post();
        if(!empty($posts))
        {
            //Si il y a un POST je le traite
            if($this->_treat_posts($posts,"form_fiche_contact") == TRUE)
            {
                $this->data["returned_message"] = "Données enregistrées";
            }else{
                $this->data["returned_message"] = "Erreur lors de l'enregistrement";
            }
        }

        //Sinon on récupère les informations de la fiche pour les afficher
        $f = new Fiche;
        $f->get_user_fiche($this->session->userdata("id_user"));
        $this->data["fiche"] = $f;










        //TODO: retourner les valeurs au formulaire contact
		$this->_layout("/esp_inscrit/form_fiche_contact");
	}
	

	public function fiche_societe_form()
	{
        //Si il y a un post, on traite
        $posts = $this->input->post();
        if(!empty($posts))
        {
            //Si il y a un POST je le traite
            if($this->_treat_posts($posts,"form_fiche_societe") == TRUE)
            {
                $this->data["returned_message"] = "Données enregistrées";
            }else{
                $this->data["returned_message"] = "Erreur lors de l'enregistrement";
            }
        }

        //Sinon on récupère les informations de la fiche pour les afficher
        $f = new Fiche;
        $f->get_user_fiche($this->session->userdata("id_user"));
        $this->data["fiche"] = $f;

		$this->_layout("/esp_inscrit/form_fiche_societe");
	}
	

	public function fiche_descriptions()
	{

        //Si il y a un post, on traite
        $posts = $this->input->post();
        if(!empty($posts))
        {
            //Si il y a un POST je le traite
            if($this->_treat_posts($posts,"form_fiche_description") == TRUE)
            {
                $this->data["returned_message"] = "Données enregistrées";
            }else{
                $this->data["returned_message"] = "Erreur lors de l'enregistrement";
            }
        }

        //Sinon on récupère les informations de la fiche pour les afficher
        $f = new Fiche;
        $f->get_user_fiche($this->session->userdata("id_user"));
        $this->data["fiche"] = $f;


		$this->_layout("/esp_inscrit/form_fiche_descriptions");
	}


	public function fiche_classements()
	{

        //Si il y a un post, on traite
        $posts = $this->input->post();


        if(!empty($posts))
        {
            //Si il y a un POST je le traite
            if($this->_treat_posts($posts,"form_fiche_classement") == TRUE)
            {
                $this->data["returned_message"] = "Données enregistrées";
            }else{
                $this->data["returned_message"] = "Erreur lors de l'enregistrement";
            }
        }

        //On récupère les listes de types et de catégories.
		$c = new Category;
		$t = new Type;

		$this->data["types"] 			= $t->get_types();


		//On récupères les informations de la fiche à jour
        $fm = new Fiche;
        $fm->get_user_fiche($this->session->userdata("id_user")); //On récupère les infos de la fiche

        $f = new Fiche($fm->id_fiche());
        $this->data["fiche"] = $f;





		$this->_layout("/esp_inscrit/form_fiche_classements");
	}
	

	public function fiche_res_sociaux()
	{
        //Si il y a un post, on traite
        $posts = $this->input->post();
        if(!empty($posts))
        {
            //Si il y a un POST je le traite
            if($this->_treat_posts($posts,"form_fiche_reseaux") == TRUE)
            {
                $this->data["returned_message"] = "Données enregistrées";
            }else{
                $this->data["returned_message"] = "Erreur lors de l'enregistrement";
            }
        }

        //Sinon on récupère les informations de la fiche pour les afficher
        $f = new Fiche;
        $f->get_user_fiche($this->session->userdata("id_user"));
        $this->data["fiche"] = $f;


        $this->_layout("/esp_inscrit/form_fiche_res_sociaux");
	}



}