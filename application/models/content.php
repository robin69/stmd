<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Content extends CI_Model{


	private $table = "contenu";			//Table
	private $tbl_contenu_meta = "contenu_meta";
	public	$content_type = "page";
	public	$default_content_type = "page";
	public 	$id_contenu ="";
	
	//Informations du contact
	public $contenu ="";			
	public $title ="";
	public $extrait="";
	public $guid="";
	public $publications_status = "";
	
	public $contenu_meta ="";

	private $exception_field = array("submit");	//Tableau d'éléments (par exemple champ) à ne pas traiter dans une boucle.

	
	public function __construct($id_contenu = "")
	{
		parent::__construct();
		if($id_contenu!="")
		{
			$this->id_contenu = $id_contenu;
			$this->populate($id_contenu);
		}
		
	}
	
	
	
	/**************************************
	*
	*	(privée) Rapatrie les informations de la fiche
	*
	*	utilisation :
	*	$fiche = new Fiche($id_contenu);
	*
	***************************************/
	private function populate($id_contenu)
	{
		//On récupère les informations générales
		$query = $this->db->get_where($this->table, array('id_contenu' => $id_contenu)/* , $limit, $offset */);
		$result = $query->row();
		
		foreach($result as $key => $value)
		{
			$this->$key = $value;
		}
		
		//On récupère le GUID
		$guid = new Guid_model;
		$this->guid = $guid->get_guid($this->content_type, $this->id_contenu);
		
	}
	
	/**************************************
	*
	*	(public) Alimente l'objet à partir des 
	*	informations contenues dans un $_POST
	*
	*	utilisation :
	*	$fiche = new Fiche($id_contenu);
	*
	***************************************/
	public function build($post)
	{
		foreach($post as $key => $value)
		{
			if(!in_array($key, $this->exception_field))
			{
				$this->$key = $value;
			}
		}
		
		return TRUE;		
	}
	
	
	/**************************************
	*
	*	Création d'une fiche
	*
	*	utilisation :
	*	$fiche = new Fiche;
	*	$fiche->nom = "toto";
	*	$id_contenu = $fiche->add();
	*
	***************************************/
	public function add()
	{
		$this->contenu		=	$this->input->post("contenu");
		$this->title		=	$this->input->post("title");
		$this->meta_title	=	$this->input->post("meta_title");
		$this->meta_desc	=	$this->input->post("meta_desc");
		$this->guid			=	$this->input->post("guid");
		if($this->input->post("content_type") != "")
		{
			$this->content_type = $this->input->post("content_type");
		}else{
			$this->content_type = $this->default_content_type;
		}
		
		$this->db->insert($this->table,array(
										"contenu"		=> $this->contenu,
										"title"			=> $this->title,
										"meta_title"	=> $this->meta_title,
										"meta_desc"		=> $this->meta_desc,
										"content_type"	=> $this->content_type
										)
						);
		$this->id_contenu = $this->db->insert_id();
		
		
		//On ajoute le GUID
		$guid_string = url_title($slug)."/";
		
		$guid = new Guid_model;
		$guid->add_guid($this->content_type,$this->id_contenu,$guid_string);
		
		return $this->id_contenu;
	}
	
	
	
	/**************************************
	*
	*	Mise à jour de la Fiche
	*
	*	utilisation :
	*	$fiche = new Fiche;
	*	$fiche->nom = "toto";
	*	$fiche->update();
	*
	***************************************/
	public function update()
	{
	
		$this->contenu		=	$this->input->post("contenu");
		$this->title		=	$this->input->post("title");
		$this->meta_title	=	$this->input->post("meta_title");
		$this->meta_desc	=	$this->input->post("meta_desc");
		$this->guid			=	$this->input->post("guid");
		
		$datas = array(
					"contenu"		=>$this->contenu,
					"title"			=>$this->title,
					"meta_title"	=>$this->meta_title,
					"meta_desc"		=>$this->meta_desc,
					"content_type"	=>$this->content_type
				);
		
		$this->db->where("id_contenu",$this->id_contenu);
		$this->db->update($this->table, $datas);
		
		//On met à jour le GUID
		if($this->guid == "")
		{
			$slug = convert_accented_characters($this->title);
			$guid_string = url_title($slug)."/";
		}
		else
		{
			$guid_string = $this->guid;
		}
		$guid = new Guid_model;
		$guid->update_guid($this->content_type, $this->id_contenu, $guid_string);
		
		return TRUE;
		
	}
	
	public function delete($id_contenu="")
	{
		if($id_contenu !="")
		{
			$id = $id_contenu;
		}else{
			$id = $this->id_contenu;
		}
		
		$this->db->delete($this->table, array("id_contenu" => $id));
	}

    public function get_contenu_by_guid($guid)
    {

        //On va regarder si le GUID existe
        $query = $this->db->get_where("guid", array("guid"=>$guid));
        $result = $query->result();
        if($result)
        {

            return $result;
        }else{
            return false;
        }

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