<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fiche extends fiche_manager
{

	//Informations générales
	protected $id_fiche;            //Clef primaire en couple avec temp
	protected $user_id;
	protected $nom_contact;
	protected $prenom_contact;
	protected $tel_contact;
	protected $email_contact;
	protected $raison_sociale;
	protected $adr1;
	protected $adr2;
	protected $ville;
	protected $cp;
	protected $email_societe;
	protected $tel_societe;
	protected $fax;
	protected $site;
	protected $facebook;
	protected $twitter;
	protected $googleplus;
	protected $linkedin;
	protected $viadeo;
	protected $description;
	protected $competences;
	protected $certifications;
	protected $references;
	
	//Informations de Status
	protected $date_creation;
	protected $date_reglement;
	protected $payante;
	protected $publication_status;
    protected $temp;                    //Clef primaire en couple avec id_fiche
	
	//Elements relatifs
	protected $categories	=	array();				//Le tableau des catégories sous la forme array(id1, id2, id3, id4, etc...);
	protected $types		=	array();
	protected $zones		=	array();
    protected $mdtransp     =   array();
    protected $classes      =   array();

	
	
	public function __construct($id_fiche="")
	{
		parent::__construct();
		
		if($id_fiche!="")
		{
			$infos = $this->get($id_fiche);
			$this->hydrate($infos);
		}
	}
	
	/***
	*
	*	Function qui hydrate l'objet à partir
	*	du tableau de données
	*
	*	@donnees array tableau associatif contenant les champs de l'objet
	*	@return void
	*
	*
	*****************/
	public function hydrate($donnees)
	{

		foreach($donnees as $key => $value)
		{
			$method_name = "set_".$key;

			
			if(method_exists($this,$method_name))
			{
				$this->$method_name($value);
			}
		}

        /*****
         * On s'occupe des valeurs obligatoires dans la base
         */
        //Si "payante" n'est pas définie on le met à FALSE
        if(!array_key_exists("payante",$donnees))
        {
            $this->set_payante(FALSE);
        }

        if(!in_array("temp",$donnees))
        {
            $this->set_temp();
        }



	}


	public function set_payante($is_payante = FALSE)
	{
		if($is_payante === TRUE OR $is_payante === 1)
		{
			$this->payante = "1";
		}else{
			$this->payante = "0";
		}

	}


    /***********************************
     * Détermine si la fiche est une fiche
     * temporaire (demande de modération)
     * ou normale (inscription ou en ligne)
     *
     * @param bool $bool
     */
	public function set_temp($bool=FALSE)
	{
		$this->temp = $bool;
	}


	/********************
	*
	*	Les accesseurs de l'objet
	*
	*
	*
	*
	*
	***************************/
	public function id_fiche(){ return $this->id_fiche; }


	public function user_id(){ return $this->user_id; }


	public function nom_contact(){ return $this->nom_contact; }


	public function prenom_contact(){ return $this->prenom_contact; }


	public function tel_contact(){ return $this->tel_contact; }


	public function email_contact(){ return $this->email_contact; }


	public function raison_sociale(){ return $this->raison_sociale; }


	public function adr1(){ return $this->adr1; }


	public function adr2(){ return $this->adr2; }


	public function ville(){ return $this->ville; }


	public function cp(){ return $this->cp; }


	public function email_societe(){ return $this->email_societe; }


	public function tel_societe(){ return $this->tel_societe; }


	public function fax(){ return $this->fax; }


	public function site(){ return $this->site; }


	public function facebook(){ return $this->facebook; }


	public function twitter(){ return $this->twitter; }


	public function googleplus(){ return $this->googleplus; }


	public function linkedin(){ return $this->linkedin; }


	public function viadeo(){ return $this->viadeo; }


	public function description(){ return $this->description; }


	public function competences(){ return $this->competences; }


	public function certifications(){ return $this->certifications; }


	public function references(){ return $this->references; }


	public function date_creation(){ return $this->date_creation; }


	public function publication_status(){ return $this->publication_status; }


	public function categories(){ return $this->categories; }


	public function types(){ return $this->types; }


	public function zones(){ return $this->zones; }


    public function mdtransp(){ return $this->mdtransp;}


    public function classes(){ return $this->classes;}


	public function date_reglement(){ return $this->date_reglement; }

	
	public function payante(){ return $this->payante; }
	

	public function temp(){ return $this->temp;}


    public function set_classes($classes){
        $this->classes =   $classes;
    }
	
	
	public function set_mdtransp($mdtransp){
        $this->mdtransp =   $mdtransp;
    }
	

	public function set_date_reglement($date)
	{
		$this->date_reglement = $date;
	}
	
	
	public function set_user_id($user_id = "")
	{
		if($user_id !="")
		{
			$this->user_id 	= 	$user_id;
		}else{
			$this->user_id	=	$this->session->userdata('id_user');
		}
		
	}
	
	public function set_zones($zones)
	{
		$this->zones = $zones;
	}
	
	
	public function set_types($types)
	{
		$this->types =  $types;
	}
	
	
	/****
	*
	*	ATTENTION
	*	Le tableau de catégorie doit contenir le 
	*	champ "category_id".
	*
	***************/
	public function set_categories($cats)
	{


        //On dédoublonne le tableau
        $cats = array_unique($cats);

		$this->categories = array();	//IMPORTANT ! Il faut rééinitialiser le tableau sinon on cumule les entrées...
		
		$this->categories = $cats;
				
	}
	
	
	
	public function set_publication_status($status)
	{
		$possible_status = array(
			"published",
			"unpublished",
			"temp"
		);
		

		
		if(in_array($status, $possible_status))
		{
			$this->publication_status = $status;		
		}else{
			$this->publication_status = "unpublished";
		}
		
	}
	
	
	public function set_date_creation()
	{
        if($this->date_creation ==null OR $this->date_creation =="" OR $this->date_creation ==0){
            $this->date_creation = time();
        }

	}
	
	public function set_references($references)
	{
		if(is_string($references))
		{
			$this->references = $references;
		}
		
	}
	
	public function set_certifications($certifications)
	{
		if(is_string($certifications))
		{
			$this->certifications = $certifications;
		}
		
	}
	
	public function set_competences($competences)
	{
		if(is_string($competences))
		{
			$this->competences = $competences;
		}
		
	}
	
	public function set_description($description)
	{
		if(is_string($description))
		{
			$this->description = $description;
		}
		
	}
	
	public function set_viadeo($viadeo)
	{
		if(is_string($viadeo) && strlen($viadeo)<=45)
		{
			$this->load->helper('url');
			$this->viadeo = prep_url($viadeo);
		}
		
	}
	
	public function set_linkedin($linkedin)
	{
		if(is_string($linkedin) && strlen($linkedin)<=45)
		{
			$this->load->helper('url');
			$this->linkedin = prep_url($linkedin);
		}
		
	}
	
	public function set_googleplus($googleplus)
	{
		if(is_string($googleplus) && strlen($googleplus)<=45)
		{
			$this->load->helper('url');
			$this->googleplus = prep_url($googleplus);
		}
		
	}
	
	public function set_twitter($twitter)
	{
		if(is_string($twitter) && strlen($twitter)<=45)
		{
			$this->load->helper('url');
			$this->twitter = prep_url($twitter);
		}
		
	}
	
	public function set_facebook($facebook)
	{
		if(is_string($facebook) && strlen($facebook)<=45)
		{
			$this->load->helper('url');
			$this->facebook = prep_url($facebook);
		}
		
	}
	
	
	public function set_site($site)
	{
		if(is_string($site) && strlen($site)<=45)
		{
			$this->load->helper('url');
			$this->site = prep_url($site);
		}
		
	}
	
	public function set_fax($fax)
	{
		if(is_string($fax) && strlen($fax)<=15)
		{
			$this->fax = $fax;	
		}
		
	}
	
	public function set_tel_societe($tel_societe)
	{
		if(is_string($tel_societe) && strlen($tel_societe)<=15)
		{
			$this->tel_societe = $tel_societe;	
		}
		
	}
	
	public function set_email_societe($email_societe)
	{
		if(is_string($email_societe) && strlen($email_societe)<=120)
		{
			
			//On vérifie qu'il s'agit d'un adresse email valide
			$this->load->helper('email');
			if(valid_email($email_societe))
			{
				$this->email_societe = $email_societe;
			}
				
		}
		
	}
	
	public function set_ville($ville)
	{
		if(is_string($ville) && strlen($ville)<=120)
		{
			$this->ville = $ville;	
		}
		
	}
	
	public function set_cp($cp)
	{
		if(is_string($cp) && strlen($cp)<=5)
		{
			$this->cp = $cp;	
		}
		
	}
	
	public function set_adr2($adr2)
	{
		if(is_string($adr2) && strlen($adr2)<=120)
		{
			$this->adr2 = $adr2;	
		}
		
	}
	
	
	public function set_adr1($adr1)
	{
		if(is_string($adr1) && strlen($adr1)<=120)
		{
			$this->adr1 = $adr1;	
		}
		
	}
	
	public function set_raison_sociale($raison_sociale)
	{
		if(is_string($raison_sociale) && strlen($raison_sociale)<=150)
		{
			$this->raison_sociale = $raison_sociale;	
		}
		
	}
	
	
	public function set_email_contact($email_contact)
	{
		if(is_string($email_contact) && strlen($email_contact)<=120)
		{
			
			//On vérifie qu'il s'agit d'un adresse email valide
			$this->load->helper('email');
			if(valid_email($email_contact))
			{
				$this->email_contact = $email_contact;
			}	
		}
		
	}
	
	public function set_id_fiche($id_fiche)
	{
		$this->id_fiche = (int) $id_fiche;
	}
	
	public function set_nom_contact($nom_contact)
	{
		if(is_string($nom_contact) && strlen($nom_contact)<=45)
		{
			$this->nom_contact = $nom_contact;	
		}
		
	}
	
	public function set_prenom_contact($prenom_contact)
	{
		if(is_string($prenom_contact) && strlen($prenom_contact)<=45)
		{
			$this->prenom_contact = $prenom_contact;	
		}
		
	}
	
	public function set_tel_contact($tel_contact)
	{
		if(is_string($tel_contact) && strlen($tel_contact)<=15)
		{
			$this->tel_contact = $tel_contact;	
		}
		
	}
	
	
	/*****************************************
	*
	*	S'occupe d'enregistrer la fiche.
	*	Si l'objet Fiche a $id_fiche renseigné
	*	la fonction met à jour l'enregistrement
	*	dans la base.
	*	Si l'objet n'a pas d'ID, la function
	*	crée un nouvel enregistrement
	*
	*	@return TRUE si update,
	*	@return int $id_fiche si ajout.
	*
	******************************************/
	public function _save()
	{
		$manager = new Fiche_manager;
		$exception_fields = array(
			"required_infos"
		);
		$array_to_save = array();
			//on prépare le tableau de sauvegarde
			foreach($this as $key=>$value){
				if(!in_array($key,$exception_fields))
				{
					$array_to_save[$key] = $value;
				}



		}






		//Si l'objet à un id, on fait un update.
		if($this->id_fiche != "")
		{
			$manager->update($array_to_save);
			return $this->id_fiche;
		}else{

			//Si l'objet n'a pas d'id, on crée une nouvelle fiche
			$id_fiche = $manager->add($array_to_save);
			return $id_fiche;
		}



	}
	
	
	/**********************************************
	*
	*	Gère la publication d'une fiche en vérifiant
	*	si elle est publiable au préalable.
	*
	***********************************************/
	public function publish()
	{

		if($this->_check_fiche_before_publishing() == TRUE)
		{
			$this->_publishing(TRUE);
		}else{
			echo "	erreur lors de la publication.";
		}

	}
	
	
	/**
	*	Fonction qui vérifie si une fiche est publiable.
	*	Les critères pour être publiable sont les suivants :
	*
	*	- Les Infos Minimum abligatoires doivent être renseignées.
	*	- Avoir au moins un type.
	*		- si type presta : au moins 1 catégorie
	*		- si type conseiller : champs conseillers obligatoires
	*
	*	Si type Presta :
	*
	***************/
	protected function _check_fiche_before_publishing()
	{
		$fiche = $this->get($this->id_fiche);

		$have_type		=	$this->have_type();

		//La fiche a au moins une catégorie OU est de type "Conseiller"
		$have_category	=	$this->have_category();

		//les informations minimum sont renseignées
		$have_infos_mini=	$this->have_mini_infos();

		if($have_type AND $have_category AND $have_infos_mini)
		{
			return TRUE;
		}else{
			return FALSE;
		}


	}
	
	
	/********************************
	*
	*	Vérifie si la fiche a au moins
	*	Un type.
	*
	*	@return bool
	*
	*
	***********************************/
	public function have_type()
	{
		if(count($this->categories)>=1)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	
	/********************************
	*
	*	Vérifie si la fiche a au moins
	*	Une catégorie.
	*
	*	@return bool
	*
	*
	***********************************/
	public function have_category()
	{
		if(count($this->categories)>=1)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	
	/********************************
	*
	*	Vérifie si la fiche a les infos
	*	minimum requises (difinies en tant
	*	qu'attribue de l'objetà
	*
	*	@return bool
	*
	*
	***********************************/
	public function have_mini_infos()
	{
		foreach($this->required_infos as $info => $value)
		{
			if($value == "")
			{
				return FALSE;
			}
		}

		return TRUE;
	}
	
	
	/**********************************************
	*
	*	Gère la dépublication d'une fiche
	*	si elle est publiable au préalable.
	*
	***********************************************/
	public function unpublish()
	{
		$this->_publishing(FALSE);
	}
	
	
	public function __toString()
	{
		return "on est dabns une fiche";
	}


    /**********************************
     * Lorsqu'un utilisateur fait une modification sur sa
     * fiche alors que celle-ci est publiée, on fait un clône
     * de l'original. c'est ce clone qui sera modéré par
     * l'administrateur. Si le clône est validé, l'original
     * sera alors remplacé par la version courante.
     */
    public function __clone()
    {

        //Lorsqu'on clone la fiche c'est qu'on a fait une demande de modération. Donc on passe le champ temp à TRUE;
        $this->temp = TRUE;

        //

    }

}