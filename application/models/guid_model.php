<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guid_model extends CI_Model
{

	public $table		=	"guid";
	public $type 		= 	"";
	public $id_content	=	"";
	public $guid		=	"";


	public function __construct()
	{
		parent::__construct();
		
		
		
		
	}
	
	
	/***************************************
	*
	*	Récupère le GUID d'un élément
	*
	*	UTILISATION :
	*	@guid = new Guid;
	*	@adresse = $guid->get("page","12");	//(par exemple)
	*
	*	@return : FALSE si aucun, la chaine Guid si il y en a une
	*/
	public function get_guid($type="",$id_content="")
	{
		//$CI =& get_instance();
		if($type != "" && $id_content != "")
		{
			$this->type = $type;
			$this->id_content = $id_content;
			
			$query = $this->db->get_where("guid",array("content_type"=>$this->type, "id_content"=>$id_content));
			$result = $query->row();

			if(count($result)>=1)
			{
				return $result->guid;
			}
			else
			{
				return FALSE;
			}
			
		}
		
	}
	
	/***
	*
	*	Pour savoir a quel contenu apparient ce Guid
	*
	*	@guid : Le Guid à mettre à jour
	*
	*	@return : array($content_type,id_content
	*/
	public function get_content($guid)
	{
		$query = $this->db->get_where("guid",array("guid"=>$guid));
		$result = $query->row();
		
		$returned_array = array($result->type,$result->id_content);
		
		return $returned_array;
		
	}
	
	
	/***
	*
	*	Met à jour l'Guid pour un contenu
	*
	*	@content_type : Type de contenu (category,page,fiche,news,etc....)
	*	@id : l'id du contenu concerné
	*	@guid : Le Guid à mettre à jour
	*
	*
	*/
	public function update_guid($content_type, $id, $guid)
	{
		$this->delete_guid($content_type,$id);
		$this->add_guid($content_type, $id, $guid);
	}
	
	
	
	
	/***
	*
	*	Supprime le Guid d'un contenu
	*
	*	@content_type : Type de contenu (category,page,fiche,news,etc....)
	*	@id : l'id du contenu concerné
	*
	*
	*/
	public function delete_guid($content_type,$id)
	{
		$this->db->delete("guid", array("id_content"=>$id, "content_type"=>$content_type));
	}
	
	
	
	
	
	/***
	*
	*	Ajoute le Guid pour un contenu
	*
	*	@content_type : Type de contenu (category,page,fiche,news,etc....)
	*	@id : l'id du contenu concerné
	*	@guid : Le Guid à mettre à jour
	*
	*
	*/
	public function add_guid($content_type, $id, $guid)
	{
		$datas = array(
			"guid"			=>	$guid,
			"type"			=>	$content_type,
			"id_content"	=>	$id
		);
		
		$query = $this->db->insert("guid",$datas);
	}
	
	public function convert_to_url($string)
	{
		$string = url_title($string);
		
		return $string;
	}
	

}