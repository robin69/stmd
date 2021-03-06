<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Type extends type_manager
{


	private static $tbl_types = "types";
	private static $tbl_fiche_types = "fiche_has_type";
	
	
	
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	
	
	/*****************************
	*
	*	Fonction Statique qui permet
	*	d'obtenir la liste des types.
	*
	*	Appel : Types::get();
	*
	*	@return array tableau multi-dimensions
	*
	*******************************/
	public static function get()
	{
		$CI =& get_instance();
		$sql    = "SELECT * FROM types";
		$query = $CI->db->query($sql);
		$query->result();
		$types = $query->result();
		$sql = $CI->db->last_query();

		
		
		return $types;
	}

	
}