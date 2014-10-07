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
class User_manager extends CI_Model{


	protected $tbl_user		=	"user";
	protected $tbl_fiche 	=	"fiche";
	
	
	public function __construct()
	{
		parent::__construct();
		
		
	}
	
	protected function add($user_array)
	{
		
		$exception_field = array("tbl_fiche");
		//On met à jour les informations principales
		foreach($user_array as $field=>$value)
		{

			if(!in_array($field,$exception_field))
			{
				$this->db->set($field,$value);
			}
		}
		//ajoute les informations dans la table user

		$this->db->insert($this->tbl_user);
		$fiche_array["id_user"] = $new_id_user = $this->db->insert_id();
		
		return $new_id_user;	
		
	}
	
	public function delete($id_user)
	{
		if($id_user !="")
		{
			$id = $id_user;
		}else{
			$id = $this->id_user;
		}
		
		$this->db->delete($this->tbl_user, array("id_user" => $id));
		
	}
	
	public function get($id_user)
	{
		//On récupère les informations générales
		$query = $this->db->get_where($this->tbl_user, array("id_user"=>$id_user));
		$infos = $query->result_array();

		if(count($infos)>=1)
		{
			return $infos[0];
		}
		
		return FALSE;
	}
	
	public function get_list($args)
	{

		//On récupère la liste des ID. Requête de base
		$query 	=	$this->db->from($this->tbl_user);
		
		//Si il y a des filtres, on les ajoutes à la requête
		if(isset($args["filter_name"]))
		{
			
				$query	=	$this->db->where(array($args["filter_name"] => $args["filter_value"]));
		}
			

		if($args["limit"] != "")
		{
			$query 	=	$this->db->limit($args["limit"],$args["offset"]);
		}
		
		
		//on exécute la requête
		$query = $this->db->get();
		
		
		//On génère le résultat
		$results = $query->result_array();
		$users_liste = array();
		
		return $results;

		
	}
	
	public function count_list($args)
	{
		//On récupère la liste des ID. Requête de base
		$query 	=	$this->db->from($this->tbl_user);
		
		//Si il y a des filtres, on les ajoutes à la requête
		if(isset($args["filter_name"]))
		{
			
				$query	=	$this->db->where(array($args["filter_name"] => $args["filter_value"]));
		}
			

		if(array_key_exists("limit",$args))
		{
			if($args["limit"] != "")
			{
				$query 	=	$this->db->limit($args["limit"],$args["offset"]);
			}
		}
		
		

		//on exécute la requête
		$count = $this->db->count_all_results();
		
		return $count;

	}
	
	protected function update($user_array)
	{
		$exception_field = array();
		//On met à jour les informations principales
		foreach($user_array as $field=>$value)
		{

			if(!in_array($field,$exception_field))
			{
				$this->db->set($field,$value);
			}
		}
		$this->db->where("id_user",$user_array["id_user"]);		
		$this->db->update($this->tbl_user);		
		
		return;
	}
	
	public function protect()
	{
		if($this->session->userdata("admin")!="1")
		{
			redirect("admin/login");
		}
	}
	
	public function is_admin()
	{
		if($this->admin)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	/************************************
	*
	*	Permet d'activer un compte utilisateur
	*
	*
	************************************/
	public function activate($id_user)
	{
		//On met l'objet à jour
		$this->compte_status = "active";
		//on fait la mise à jour dans la base
		$this->db->set("compte_status",$this->compte_status);
		$this->db->where("id_suer",$id_user);
		
				

	}
	
	public function auth($email,$pass,$is_admin = FALSE)
	{
	//	$query = $this->db->get($this->tbl_user);
		
		$query = $this->db->where('email', $email);
		$query = $this->db->where('userpass', $pass);
		if($is_admin)
		{
			$query = $this->db->where('admin', 1);
		}
		
		
		$query = $this->db->get($this->tbl_user);
		$result = $query->row();
		/* echo $this->db->last_query(); */

		
		if(isset($result->id_user) && $result->id_user !="")
		{
			//On met à jour la date de dernière connexion
			$this->db->set("lastcnx",time());
			$this->db->where("id_user",$result->id_user);
			$this->db->update($this->tbl_user);
			
			return $result->id_user;
		}
				
		return FALSE;
	}
	
	public function disconnect_user()
	{
		$this->session->sess_destroy();
	}
	
	public function has_fiche($id_user = 0)
	{
		if($id_user == 0)
		{
			$user = $this->id_user;
		}else{
			$user = $id_user;
		}
		
		$query = $this->db->get_where($this->tbl_fiche, array('user_id' => $user));
		$result = $query->result();
/* 		echo $this->db->last_query(); */
		
		return $result;
	}
	


}
