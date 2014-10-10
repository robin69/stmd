<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*******************************
**
**
*	Class Uitilsateur
*
*	Définition : toute personne identifiée en front ou 
*	en back office.
*
*
*
*******************************/
class User extends User_manager{


	protected $id_user;
	protected $email;
	protected $userpass;
	protected $nom;
	protected $prenom;
	protected $tel;
	protected $admin;
	
	protected $lastcnx;
	protected $compte_status;	
	
	
	
	public function __construct($id_user = "")
	{
		parent::__construct();
		

		if($id_user !="")
		{
			$infos = $this->get($id_user);
		
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
		
		if(!isset($donnees["admin"]) OR $donnees["admin"] == "")
		{
			$this->set_admin(0);
		}
		
		
	}
	
	/********************
	*
	*	Les accesseurs de l'objet
	*
	***************************/
	public function id_user(){ return $this->id_user; }
	public function email(){ return $this->email; }
	public function userpass(){ return $this->userpass; }
	public function nom(){ return $this->nom; }
	public function prenom(){ return $this->prenom; }
	public function tel(){ return $this->tel; }
	public function admin(){ return $this->admin; }
	public function compte_status(){ return $this->compte_status; }
	/**
	*	Retourne la date en seconde ou formatée
	*	en fonction de la demande $date_format
	*	
	*	@date_format	bool	Si TRUE retourne la date formatée
	*							Si FALSE retnourne la deate en seconde
	***/
	public function lastcnx($date_format = FALSE)
	{ 
		if($date_format)
		{
			return date("d/m/y h:i", $this->lastcnx);
		}else{
			return $this->lastcnx; 
			
		}
		
	}
	
	/********************
	*
	*	Les setters de l'objet
	*
	***************************/
	public function set_id_user($id_user)
	{
		$this->id_user = (int) $id_user;
	}

	public function set_email($email)
	{
		//On vérifie qu'il s'agit d'un adresse email valide
		$this->load->helper('email');
/* 		echo $email; */
		if(valid_email($email))
		{
			$this->email = $email;
		}
	}
	public function set_userpass($userpass)
	{
		//On ne met à jour le mot de pass QUE si celui-ci est renseigné.
		if($userpass != "")
		{
			$this->userpass = $userpass;
		}
		
	}
	
	public function set_nom($nom)
	{
		if(is_string($nom) && strlen($nom)<=45)
		{
			$this->nom = $nom;
		}
	}
	public function set_prenom($prenom)
	{
		if(is_string($prenom) && strlen($prenom)<=45)
		{
			$this->prenom = $prenom;
		}
	}
	
	public function set_tel($tel)
	{
		if(is_string($tel) && strlen($tel)<=45)
		{
			$this->tel = $tel;
		}
	}
	
	public function set_admin($admin)
	{
			$this->admin = $admin;
	}
	
	public function set_lastcnx($lastcnx)
	{

			$this->lastcnx = $lastcnx;

	}
	
	public function set_compte_status($compte_status)
	{
		$possible_values = array("active","non-active");
		if(in_array($compte_status,$possible_values))
		{
			$this->compte_status = $compte_status;	
		}
		
	}
	
	
	
	/*****************************************
	*
	*	S'occupe d'enregistrer l'utilisateur.
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
		$manager = new User_manager;
		$exception_fields = array(
			"required_infos",
			"tbl_user",
			"tbl_fiche"
		);
		$array_to_save = array();
			//on prépare le tableau de sauvegarde
			foreach($this as $key=>$value){
				if(!in_array($key,$exception_fields))
				{
					$array_to_save[$key] = $value;
				}
				
		}
		if($this->admin == "")
		{
			//On met à jour l'ob
			$this->set_admin = 0;
			$array_to_save["admin"] = 0;
		}
		if($this->compte_status == "")
		{
			//On met à jour l'ob
			$this->compte_status = "non-active";
			$array_to_save["compte_status"] = "non-active";
		}
		
		//Si l'objet à un id, on fait un update.
		if($this->id_user != "")
		{
			$manager->update($array_to_save);
			return $this->id_user;
		}else{
			//Si l'objet n'a pas d'id, on crée une nouvelle fiche
			$id_user = $manager->add($array_to_save);
			return $id_user;
		}
	}
	
	

	
	
}