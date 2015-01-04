<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




/******************************************************************
*
*
*	Classe de gestion d'une fiche. Elle gère les interactions
*	avec la bse de données
*
*
*
*
*
*
*
******************************************************************/
class Fiche_manager extends CI_Model
{

	protected $required_infos		= array(					//Les champs qui sont obligatoires pour une fiche

								);


	private $tbl_fiche 			= "fiche";


	private $tbl_cats			= "category";


	private $tbl_fiche_cats		= "fiche_has_category";


	private $tbl_fiche_types	= "fiche_has_type";


	private $tbl_fiche_zones	= "fiche_has_zone";


    private $tbl_fiche_mdtransp = "fiche_has_mdtransp";


    private $tbl_fiche_classes  = "fiche_has_classe";


	private $tbl_fiche_eval		= "fiche_eval";


	public function __construct()
	{
		parent::__construct();
		
		
	}
	
	
	/**
	*
	*	Function du processus d'ajout d'une fiche
	*	et de toutes ses dépendances.
	*
	*	@fiche_obj objet L'objet Fiche
	*	@return int id_fiche;
	*	
	********************************/
	public function add($fiche_array)
	{
		//comme c'est une création, on crée la date_creation
		$fiche_array["date_creation"] = time();					//donnedate et heure courante pour la date de création
		if(!isset($fiche_array["publication_status"]) OR $fiche_array["publication_status"] == "")
		{
			$fiche_array["publication_status"]	= "unpublished";	//Le status de publication par défaut est à "unpublished"					
		}

		
		$exception_field = array("categories","types","zones","mdtransp","classes");
		//On met à jour les informations principales
		foreach($fiche_array as $field=>$value)
		{

			if(!in_array($field,$exception_field))
			{
				$this->db->set($field,$value);
			}
		}
		//ajoute les informations dans la table fiche

		$this->db->insert($this->tbl_fiche);
		$fiche_array["id_fiche"] = $new_id_fiche = $this->db->insert_id();	

		
		
		//Si l'objet contient des catégories ajoute les catégories de la Fiche_manager
		$this->_add_cats($fiche_array);
		
		//ajoute le type de fiche
		$this->_add_types($fiche_array);
		
		//ajoute la zone de la fiche
		$this->_add_zones($fiche_array);

        //ajoute le mode de transp
        $this->_add_mdtransp($fiche_array);

		//ajoute le mode de transp
        $this->_add_classes($fiche_array);

		return $new_id_fiche;
		
	}
	
		

	
	
	
	
	/**
	*
	*	ajoute les catégories d'une fiche dans 
	*	la table d'association
	*	
	*	@fiche_obj obj L'objet fiche (contenant l'id_fiche)
	*	@return void
	*
	*
	*
	*************************************/
	private function _add_cats($fiche_array)
	{

		$cats = $fiche_array["categories"];
		if(count($cats)>=1)
		{
			$array_to_insert = array();
			foreach($cats as $key=>$value)
			{

                $array = array(
                "fiche_id"		=>	$fiche_array["id_fiche"],
                "category_id"	=>	$value
            );

                array_push($array_to_insert,$array);


			}

            //On ajoute les nouvelles valeurs
			$this->db->insert_batch($this->tbl_fiche_cats, $array_to_insert);
		}
		
		
		
		return;
	}
	
	
	
	/**
	*
	*	ajoute les types d'une fiche dans 
	*	la table d'association
	*	
	*	@fiche_obj obj L'objet fiche (contenant l'id_fiche)
	*	@return void
	*
	*
	*
	*************************************/
	private function _add_types($fiche_array)
	{
		$types = $fiche_array["types"];
		if(count($types)>=1)
		{
			$array_to_insert = array();
			foreach($types as $key=>$value)
			{
				$array = array(
					"fiche_id"		=>	$fiche_array["id_fiche"],
					"type_slug"		=>	$value
				);
				
				array_push($array_to_insert,$array);
			}
			
			$this->db->insert_batch($this->tbl_fiche_types, $array_to_insert);
		}
		
		
		
		return;
	}
	
	
	/**
	*
	*	ajoute les zones d'une fiche dans 
	*	la table d'association
	*	
	*	@fiche_obj obj L'objet fiche (contenant l'id_fiche)
	*	@return void
	*
	*
	*
	*************************************/
	private function _add_zones($fiche_array)
	{
		$zones = $fiche_array["zones"];
		if(count($zones)>=1)
		{
			$array_to_insert = array();
			foreach($zones as $key=>$value)
			{
				$array = array(
					"fiche_id"		=>	$fiche_array["id_fiche"],
					"zone_id"		=>	$value
				);
				
				array_push($array_to_insert,$array);
			}
			
			$this->db->insert_batch($this->tbl_fiche_zones, $array_to_insert);
		}
		
		
		
		return;
	}
	
	
	/**
	*
	*	ajoute les mode de transport d'une fiche dans
	*	la table d'association
	*
	*	@fiche_obj obj L'objet fiche (contenant l'id_fiche)
	*	@return void
	*
	*
	*
	*************************************/
	private function _add_mdtransp($fiche_array)
	{
		$mdtransp = $fiche_array["mdtransp"];
		if(count($mdtransp)>=1)
		{
			$array_to_insert = array();
			foreach($mdtransp as $key=>$value)
			{
				$array = array(
					"fiche_id"		=>	$fiche_array["id_fiche"],
					"mdtransp"		=>	$value
				);

				array_push($array_to_insert,$array);
			}

			$this->db->insert_batch($this->tbl_fiche_mdtransp, $array_to_insert);
		}



		return;
	}


/**
	*
	*	ajoute les classes de matière d'une fiche dans
	*	la table d'association
	*
	*	@fiche_obj obj L'objet fiche (contenant l'id_fiche)
	*	@return void
	*
	*
	*
	*************************************/
	private function _add_classes($fiche_array)
	{
		$classes = $fiche_array["classes"];
		if(count($classes)>=1)
		{
			$array_to_insert = array();
			foreach($classes as $key=>$value)
			{
				$array = array(
					"fiche_id"		=>	$fiche_array["id_fiche"],
					"classe"		=>	$value
				);

				array_push($array_to_insert,$array);
			}

			$this->db->insert_batch($this->tbl_fiche_classes, $array_to_insert);
		}



		return;
	}



	
	
	
	
	/**
	*
	*	supprime une fiche, ainsi que tous ses éléments d'association
	*	
	*	@id_fiche int id de la fiche à supprimer
	*	@return void
	*
	*
	*
	*************************************/

	public function delete($id_fiche)
	{
		//On supprime la fiche dans la table fiche
		$this->db->delete($this->tbl_fiche, array("id_fiche" => $id_fiche));
		
		//On supprime la fiche dans la table de liaison cateogories
		$this->db->delete($this->tbl_fiche_cats, array("fiche_id" => $id_fiche));
		
		//On supprime la fiche dans la table de liaison type
		$this->db->delete($this->tbl_fiche_types, array("fiche_id" => $id_fiche));
		
		//On supprime la fiche dans la table de liaison zone
		$this->db->delete($this->tbl_fiche_zones, array("fiche_id" => $id_fiche));
		
		//On supprime la fiche dans la table de liaison mdtransp
		$this->db->delete($this->tbl_fiche_mdtransp, array("fiche_id" => $id_fiche));

		//On supprime la fiche dans la table de liaison mdtransp
		$this->db->delete($this->tbl_fiche_classes, array("fiche_id" => $id_fiche));

		return;
		
	}
	
	
	/*************************************
	*
	*
	*	Récupère les informations d'une fiche,
	*	y compris ses dépendances
     *
     * ATTENTION la liste des catégories doit rester une liste d'ID.
	*
	*	@$id_fiche	(int)	l'id de la fiche à récupérer
	*	@return	(array)		le tableau multi-dimensions contenant les infos de la fiche
	*
	*************************************/
	public function get($id_fiche)
	{
	
		//On récupère les informations générales
		$query = $this->db->get_where($this->tbl_fiche, array("id_fiche"=>$id_fiche));
		$infos = $query->row_array();
		$query->free_result();

        //On récupère les catégories
        $cats_list = array();
		$cats = $this->get_fiche_cats($id_fiche);
        foreach($cats as $key => $cat)
        {
            array_push($cats_list, $cat["id_category"]);
        }

		//On récupère les types de la fiche
		$query = $this->db->get_where($this->tbl_fiche_types, array("fiche_id"=>$id_fiche));
		$result_types = $query->result_array();
		
		$types = array();
		foreach($result_types as $key=>$type){
			array_push($types,$type["type_slug"]);
		}
		
		$query->free_result();
		
		//On récupère les zones de la fiche
		$query = $this->db->get_where($this->tbl_fiche_zones, array("fiche_id"=>$id_fiche));
		$result_zones = $query->result_array();
		$zones = array();
		foreach($result_zones as $key=>$zone){
			array_push($zones,$zone["zone_id"]);
		}
		$query->free_result();

        //On récupère les classes de la fiche
        $query = $this->db->get_where($this->tbl_fiche_classes, array("fiche_id"=>$id_fiche));
        $result_classes = $query->result_array();
        $classes = array();
        foreach($result_classes as $key=>$classe){
            array_push($classes,$classe["classe"]);
        }
        $query->free_result();

        //On récupère le mdtransp de la fiche
        $query = $this->db->get_where($this->tbl_fiche_mdtransp, array("fiche_id"=>$id_fiche));
        $result_mdtransp = $query->result_array();
        $mdtransp = array();
        foreach($result_mdtransp as $key=>$mode){
            array_push($mdtransp,$mode["mdtransp"]);
        }
        $query->free_result();

		$fiche = $infos;
		$fiche["categories"] 	= $cats_list;
		$fiche["types"]			= $types;
		$fiche["zones"]			= $zones;
		$fiche["classes"]		= $classes;
		$fiche["mdtransp"]		= $mdtransp;

		
		//On retourne le tableau complet pour qu'il puisse être instancié
		return $fiche;
		
		
		
	}
	
	/***
	*
	*	Retourne la liste des
	*	catégories d'une fiche
	*
	*
	*********/
	private function get_fiche_cats($id_fiche)
	{

		//On récupère les catégories de la fiche
        $sql = "SELECT * FROM category cat
          INNER JOIN fiche_has_category fhc ON cat.id_category = fhc.category_id
        WHERE fhc.fiche_id = ".$id_fiche;

        $query = $this->db->query($sql);
		$result = $query->result_array();

		//Il faut transformer la liste de catégorie en élément simple.
		$cats = array();
		foreach($result as $key=>$cat){
			array_push($cats,$cat);
		}
		//echo $this->db->last_query();
		return $cats;
		//$query->free_result();
	}


	public function search_fiche($string,$offset,$published=TRUE,$count=FALSE)
	{


		//On demande par défaut les fiches publiées
		if($published){
			$query = $this->db->where(array("publication_status"=>"published", "temp"=>0));
		}

        $indexed_columns = array(
            "nom_contact"   => $string,
            "raison_sociale"  => $string,
            "ville"  => $string,
            "cp"  => $string,
            "email_societe"  => $string,
            "site"  => $string,
            "facebook"  => $string,
            "googleplus"  => $string,
            "viadeo"  => $string,
            "twitter"  => $string,
            "linkedin"  => $string,
            "description"  => $string,
            "competences"  => $string,
            "certifications"  => $string,
            "references"  => $string
        );

        $query = "SELECT * FROM (`fiche`) ";
        $query .= " LEFT JOIN `fiche_has_type` ON `fiche`.`id_fiche` = `fiche_has_type`.`fiche_id` ";
        $query .= "LEFT JOIN `fiche_has_category` ON `fiche`.`id_fiche` = `fiche_has_category`.`fiche_id` ";
        $query .= "WHERE `publication_status` = 'published' AND `temp` = 0 ";
        $query .= " AND ( ";

        $i = 0;
        foreach($indexed_columns as $column => $value)
        {
            $i++;
            if($i>1){
                $query .= " OR ";
            }
            $query .="`$column` LIKE '%$value%' ";


        }

        $query .= " ) ";
        $query .= "GROUP BY `id_fiche` ";
        $query .= "ORDER BY `payante` DESC, `raison_sociale`";

		if(!$count)
		{
            $query .= " LIMIT ".$offset.",".$this->config->item('elem_per_page');
		}

        $query = $this->db->query($query);





		$results = $query->result_array();
		$nbr_results = count($results);






		if($count==FALSE)
		{
			if($nbr_results >=1)
			{
				//On ajoute le tableau des catégories de la fiche au résultats.
				foreach($results as $key => $fiche)
				{

					$cats = $this->get_fiche_cats($fiche["id_fiche"]); //On récupère les infos de catégorie
					$results[$key]["category"]=$cats;					//On les ajoute aux résultats.

				}
			}

			return $results;
		}else{
			return $nbr_results;
		}


	}
	

    /*********************************
     * Compte le nombre de résultats d'une liste de fiche
     * @param $args
     * @param $published_only
     *
     * @return mixed
     */
	public function count_list($args, $published_only = true)
	{


        $count = count($this->get_list($args, $published_only));


		return $count;


	}
	

	/**********************************
	*
	*	retourne la liste des fiches
	*	avec les fiches formatées par this->get()
	*
	*	Le tableau d'argument doit être formaté comme suit :
	*	$args = array(
	*		"filter"	=> "",
	*		"filter_by"	=> "",
	*		"offset"	=> "",
	*		"limit"		=> ""
	*	);
	*
	*	@args	array	tableau d'arguments
	*	@return	array	tableau multi-dimensionnel
	**********************************/
	public function get_list($args,$published_only = true)
	{
		/*
		$args = array(
					"filter_name"	=> "",
					"filter_value"	=> "",
					"type"			=> "", //Type transporteurs_md, experiteurs_md, etc...
					"alaune"		=> "", //Une fiche est à la une si elle est payante.
					"offset"		=> "",
					"limit"			=> ""
				);
		*/


		//On récupère la liste des ID. Requête de base
		$query 	=	$this->db->from($this->tbl_fiche);

		//Si il y a des filtres, on les ajoutes à la requête
		if(isset($args["filter_name"]))
		{

			/**********
			*
			*	un SWITCH sans BREAK !
			*	parce que comme ça, l'instruction par défaut est exécutée quand même.
			*	Si besoin on peut rajouter des "join" pour d'autres tables (types, zones, etc...)
			*
			***************/
			switch($args["filter_name"])
			{

                case 'unpaid'       :   $query = $this->db->where(array("payante"=>1,"date_reglement"=>0)); break;

				case 'category_id'	:	$query = $this->db->join($this->tbl_fiche_cats, "fiche_has_category.fiche_id = fiche.id_fiche","inner");
										$query = $this->db->join($this->tbl_cats, "category_id = id_category","inner");

				default :				$query	=	$this->db->where(array($args["filter_name"] => $args["filter_value"]));
			}

		}


		$this->db->join($this->tbl_fiche_types, "fiche.id_fiche = fiche_has_type.fiche_id","left"); //INNER OBLIGATOIRE sinon ça ne fonctionne plus en back
		if(isset($args["type"]) AND $args["type"]!="")
		{
			//Si un type est sélectionné, il faut filtrer avec
			$this->db->where(array("type_slug"=>$args["type"]));
			//$this->db->join($this->tbl_fiche_types, "type_slug = ".$args["type"], "left");

		}
		if(isset($args["limit"]) AND $args["limit"] != "")
		{
			$query 	=	$this->db->limit($args["limit"],$args["offset"]);
		}



		//Si on vient du front on ne demande que les fiche publiées.
		if($published_only){

            $this->db->where(array("publication_status"=>"published","temp"=>0));
        }

		$query = $this->db->order_by("payante", "desc");
		$query = $this->db->order_by("raison_sociale", "asc");
		//on exécute la requête
		$query = $this->db->get();


        //echo $this->db->last_query();
		//On génère le résultat
		$results = $query->result_array();



		if(count($results) >=1)
		{
			//On ajoute le tableau des catégories de la fiche au résultats.
			foreach($results as $key => $fiche)
			{

				$cats = $this->get_fiche_cats($fiche["id_fiche"]); //On récupère les infos de catégorie
				$results[$key]["category"]=$cats;					//On les ajoute aux résultats.

			}
		}





		return $results;


	}


	/******
	*
	*	met à jour l'enregistrement de l'objet
	*	on récupère un tableau fournis par l'objet lui-même (fiche->save())
	*	parceque les attributs de l'objet ne sont pas en accès direct (private)
	*	et bloquent la requête SQL.
	*
	**********************************/
	public function update($fiche_array)
	{



        //var_dump($fiche_array);



		$exception_field = array("categories","types","zones","mdtransp","classes");
		//On met à jour les informations principales
		foreach($fiche_array as $field=>$value)
		{

			if(!in_array($field,$exception_field))
			{
				$this->db->set($field,$value);
			}
		}
		$this->db->where("id_fiche",$fiche_array["id_fiche"]);
		$this->db->update($this->tbl_fiche);


		//On supprime les enregs présents dans les tables de liaison
		$this->db->delete($this->tbl_fiche_cats, array("fiche_id" 	=> $fiche_array["id_fiche"]));
		$this->db->delete($this->tbl_fiche_types, array("fiche_id" 	=> $fiche_array["id_fiche"]));
		$this->db->delete($this->tbl_fiche_zones, array("fiche_id" 	=> $fiche_array["id_fiche"]));
		$this->db->delete($this->tbl_fiche_mdtransp, array("fiche_id" 	=> $fiche_array["id_fiche"]));
		$this->db->delete($this->tbl_fiche_classes, array("fiche_id" 	=> $fiche_array["id_fiche"]));

		//On insert le nouveau lot de catégories
		//Si l'objet contient des éléments de dépendance, on les ajoute dans les tables appropriées
		$this->_add_cats($fiche_array);
		$this->_add_types($fiche_array);
		$this->_add_zones($fiche_array);
        $this->_add_mdtransp($fiche_array);
        $this->_add_classes($fiche_array);



		return;


	}
	
	
    /*********************************************
     * Permet de lister l'ensemble des fiches qui
     * nécessitent d'être modérée.
     *
     * @return mixed
     */
    public function get_fiche_to_moderate()
    {
        $query = $this->db->get_where($this->tbl_fiche, array("temp"=>1));
        $results = $query->result();


        //var_dump($results);



        return $results;
    }


    public function get_fiche_unpaid()
    {
        $query = $this->db->get_where($this->tbl_fiche, array("payante"=>1,"date_reglement"=>0));
        $results = $query->result();

        return $results;
    }


    /***********************************
     * Modération : change le champ temp
     * à la valeur souhaitée.
     * @param $accepted
     */
    public function moderate($accepted)
    {
        $data = array(
            "temp"  => $accepted
        );
        $query  = $this->db->where("id_fiche",$this->id_fiche);
        $query  = $this->db->update($this->tbl_fiche, $data);


        //Envoie un email lorsque la modération est faite
        $mail = new Mails();
        $mail->to = $this->email_contact;
        if($mail->fiche_moderation())
        {
            return true;
        }else{
            return false;
        }

    }


    /**********************************
     * Calcul l'état de remplissage de la fiche
     * Basés sur le nombre de champs obligatoires renseignés.
     *
     */
    public function calul_progress_bar($id_user)
    {
        //Le pourcentage de progression est calculé sur le nombre de champs (obligatoires) renseignés dans la fiche
        $required_fields = array(
            "nom_contact",
            "prenom_contact",
            "tel_contact",
            "email_contact",
            "raison_sociale",
            "adr1",
            "cp",
            "ville",
            "email_societe",
            "tel_societe",
            "site",
            "facebook",
            "description",
            "description",
        );

        //On récupère la fiche utilisateur
        $f = new Fiche();
        $f->get_user_fiche($id_user);



        $score = 0;
        foreach ($required_fields as $field)
        {
            if($f->$field() != "" AND $f->$field() != NULL)
            {
                $score ++;
            }
        }

        //Les champs représentent 80%, le classement dans une catégorie, 10%;
        $progress = $score / count($required_fields) * 80;

        //La fiche a un type : +5
        if(count($f->types()) >=1)
        {
            $progress += 5;
        }

        if(count($f->categories())>=1)
        {
            $progress += 15;
        }else if(count($f->zones()) >=1 AND count($f->mdtransp())>=1 AND count($f->zones()>=1)){
            $progress += 15;
        }


        return $progress;
    }


    /**
     * Permet de retrouver la ou les fiches qui appartiennent à un utilisateur donné.
     *
     * @param $user_id : ID de l'utilisateur
     *
     * @return array : La liste de résultats.
     */
    public function get_user_fiche($user_id)
    {
        $query = $this->db->get_where($this->tbl_fiche, array("user_id"=>$user_id));
        $result = $query->result_array();

        //Si il y a une fiche on alimente l'objet
        if(count($result)>=1)
        {

            $this->hydrate($result[0]);
            return true;
        }

        return false;
    }


    /**********************************
     * Retourne la liste des zones d'intervention
     * @return array tableau de zones
     */
    public function get_all_zones()
    {
        $q = $this->db->get('zones');
        return $q->result();
    }


    /***************************************
     *Retourne la liste des classes de conseillers
     * @return array de classes
     */
    public function get_all_classes()
    {
        $q = $this->db->get("classes");
        return $q->result();
    }


    /*************************************
     * retourne la liste des modes de transport
     * pour les conseillers
     * @return array de mode de transport
     */
    public function get_all_mdtransp()
    {

        return array("route","fer","navigation");
    }


    /********************************************************************
     *
     */
    public function get_fiche_in_warning_periode()
    {

        //On récupère le délais de warning
        $wp_config = $this->config->item("warning_periode");

        //Date de début de warning = date actuelle -12 mois
        list($year,$month,$day,$hour,$minute,$secondes) = explode("-",date("Y-m-d-h-i-s"));
        $limite_haute = mktime($hour,$minute,$secondes,$month-12,$day,$year);
        $limite_basse = mktime($hour,$minute,$secondes,$month-12,$day+$wp_config,$year);



        $query  =   $this->db->order_by("date_reglement","ASC");
        $query  =   $this->db->get_where("fiche", array("payante"=>1,"temp"=>0, "date_reglement <"=>$limite_basse));
        $result =   $query->result();

        return $result;


        //On récupère toutes les fiches qui sont payantes et dont la date de règlement est soit expirée, soit dans la période de warning




    }


    /***********************************
     * Seul l'admin peut appeller cette fonction
     *
     * @param $bool
     */
	protected function _publishing($bool)
	{
        if($bool)
        {
            //on publie
            $this->db->set("publication_status","published");

        }else{
            //on dépublie
            $this->db->set("publication_status","unpublished");

		}
		$this->db->where("id_fiche",$this->id_fiche);
		$this->db->update($this->tbl_fiche);
	}






	
}
