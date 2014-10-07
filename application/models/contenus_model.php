<?php


class Contenus_model extends CI_Model{




	public function __construct()
	{
		parent::__construct();
		
		
	}
	
	
	
	public function get_contenu($guid)
	{
	
		//On récupère les informations du contenu
		$query = $this->db->get_where("contenu", array("guid"=>$guid), 1);
		//Si il y en a on va 
		if($query->num_rows()>0)
		{
			//récupère les infos
			$row = $query->row();	
			return $row;
		}else{
			return false;
		}
		
		
	}


}