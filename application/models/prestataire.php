<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prestataire extends fiche
{
	
	public function __construct()
	{
		parent::__construct();
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
		$this->date_creation = time();	
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
		if(is_string($raison_sociale) && strlen($raison_sociale)<=45)
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
	
	public function have_category()
	{
		if(count($this->categories)>=1)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function _save()
	{
		$manager = new Fiche_manager;
		
		$array_to_save = array();
			//on prépare le tableau de sauvegarde
			foreach($this as $key=>$value){
				$array_to_save[$key] = $value;
		}
		
		//Si l'objet à un id, on fait un update.
		if($this->id_fiche != "")
		{
			$manager->update($array_to_save);
			return;
		}else{
			$id_fiche = $manager->add();
			return $id_fiche;
		}

		
		//Si l'objet n'a pas d'id, on crée une nouvelle fiche
	}
	
	
	public function __toString()
	{
		return "on est dabns une fiche";
	}

}