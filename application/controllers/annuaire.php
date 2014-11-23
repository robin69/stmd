<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Annuaire extends CI_Controller {


	public 	$theme = "stmd2014";
	public	$tbl_category = "category";
	public	$tbl_cat_types = "cat_has_type";
	public	$tbl_fiche_cat = "fiche_has_category";
	public	$tbl_fiches = "fiche";
	public 	$tbl_fiche_eval = "fiche_eval";
	public 	$data = array("no_google_map"=>FALSE);
		
	public function __construct()
	{
		parent::__construct();
		
		$this->layout->set_theme($this->theme);
		
	}
	
		
	
	public function index()
	{
		
	}

	public function cat_prestas_tmd()
	{

        $g = new Guid_model();

		$this->data["domaine"]		=	"transporteurs_md";
        $this->data["type_guid"]    =   $g->get_guid("types","transporteurs_md");   //On récupère le guid du type
        $this->data["description"]  =   "Vous êtes transporteurs de marchandises dangereuses par route (ADR), les rubriques présentées ci-dessous vous aideront à trouver le prestataire qui correspond à votre problématique. Nous demeurons à votre disposition pour répondre à vos demandes.";
		$this->data["cats"]			=	$this->list_cats("transporteurs_md");
		$this->data["no_google_map"] = TRUE;

		$this->_layout("ann_liste_cat");
	}
	
	public function cat_prestas_emd()
	{
        $g = new Guid_model();

		$this->data["domaine"]	=	"expediteurs_md";
        $this->data["type_guid"]    =   $g->get_guid("types","expediteurs_md");   //On récupère le guid du type
        $this->data["description"]  =   "Vous êtes expéditeurs de marchandises dangereuses (ADR, IATA, IMDG) et vous recherchez un prestataire pouvant vous aider à gérer et expédier vos produits classés à risques.
Les rubriques présentées ci-dessous vous aideront à trouver le prestataire qui correspond à votre problématique. Nous demeu- rons à votre disposition pour répondre à vos demandes.";
        $this->data["cats"]		=	$this->list_cats("expediteurs_md");
		$this->data["menu_sidebar"]	=	"presta";
		$this->data["no_google_map"] = TRUE;

		$this->_layout("ann_liste_cat");
	}
	
	public function search_cas_form()
	{
        $g = new Guid_model();

		$this->data["domaine"]	=	"conseiller_securite";
        $this->data["type_guid"]    =   $g->get_guid("types","conseiller_securite");   //On récupère le guid du type
        $this->data["description"]  =   "En France, l’intervention d’un conseiller à la sécurité pour le transport de marchandises dangereuses est une obliga- tion légale (voir conditions fixées par l’arrêté TMD). Pour trouver un conseiller à la sécurité ADR proche de chez vous, vous devez sélectionner la région, la ou les classes de danger concernées correspondant à la matière dangereuse transportée ET au mode de transport qui sera utilisé : transport de marchandises par route (ADR), transport de mar- chandises dangereuses par chemin de fer (RID), transport de marchandises dangereuses par voies navigables (ADN).";
        $this->data["cats"]		=	$this->list_cats("expediteurs_md");
		$this->data["menu_sidebar"]	=	"cas";
		
		$this->_layout("search_conseiller");
	}

	/**
	*
	*	Il faut sécuriser la réception avec $domaine
	*	qui arrive tout droit de l'url...
	*
	*****/
	public function list_cats($domaine)
	{

		//On instancie la classe category
		$cats = new $this->category;
		
		//On récupère la liste des catégories qui appartiennet au domaine ET qui ont au moins une fiche
		$query = $this->db->join($this->tbl_cat_types, "cat_has_type.category_id = id_category");
		$query = $this->db->join($this->tbl_fiche_cat, "fiche_has_category.category_id = id_category");
		$query = $this->db->where(array('type_slug' => $domaine));
		$query = $this->db->group_by("id_category");
		$query = $this->db->order_by("public_name", "ASC");
		$query = $this->db->get($this->tbl_category);
		$results = $query->result_array();
		
		//on compte le nombre de fiche par catégories
		foreach($results as $key=>$cat)
		{
		
			$query = $this->db->where("category_id",$cat["id_category"]);
			$this->db->from('fiche_has_category');
			$nbr_fiches =  $this->db->count_all_results();
			
			
/* 			echo $nbr_fiches."<br/>"; */
			
				$f= new Fiche;
				$args = array(
						"filter_name"	=> "category_id",
						"filter_value"	=> $cat["id_category"],
						"type"			=> $domaine
						
					);	
				
				$results[$key]["nbr_fiches"] = $f->count_list($args);
			
			
		}

		
		//On transforme le retour en tableau
		//$cat_liste_array = $cats->get_list();

				
		return $results;
	}
	
	
	
	public function show_results_cat($domaine, $cat_segment,$offset=0)
	{
		//On récupère les informations de la catégorie
		$cat_slug = str_replace("cat-", "", $cat_segment);	//Le nom de la catégorie
		$c = new Category;
		$cat = $c->get_cat_by_slug($cat_slug);
				
		
		//On prépare l'affichage des fiches avec pagination
		//Si il y a un numéro de page on le récupère via le troisième argument facultatif
		

		$args = array(
			"filter_name"	=> 	"category_id",
			"filter_value"	=>	$cat["id_category"],
			"type"			=>	$domaine
		);
		$f = new Fiche;
		$config["total_rows"] = $this->data["total_fiches"] = $f->count_list($args);
		$config["base_url"] = site_url("annuaire/".$domaine."/cat-".$cat_segment)."/";
		$config['uri_segment'] = 4;	//Une entrée dans le tableau = 2 éléments (key et value) donc 4 segments d'url.
		$config["per_page"] = $this->config->item('elem_per_page');
		
		
		//On complète la reqûete pour l'affichage et on lance la requête
		$args["offset"]	= 	$offset;
		$args["limit"]	=	$config["per_page"];
		$fiche_liste = $f->get_list($args);
		
		//On alimente toutes les fiches dans $this->data
		
		
		//On alimente la liste des catégories dans $this->data
		$this->data["domaine"]	=	$domaine;
		$this->data["breadcrumb"] = array(
			"SolutionsTMD"	=> "",
			"Annuaire ".$domaine => "annuaire/".$domaine,
			$cat["public_name"] => "#"
		);
		$this->data["fiches"]	=	$fiche_liste;
		
		//Configuration de la pagination
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '<<';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '>>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="selected" >';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';


		
		$this->pagination->initialize($config);
		
		$this->data["alaune"] = $this->fiches_alaune($domaine,$cat);
		$this->data["menu_sidebar"]	=	"prestas";
		
		$c = new Category;
		
		$this->data["menu_categories"]	= $c->get_cat_by_type($domaine);
		
		$this->_layout("ann_results");
	}
	
	
	/***
	*
	*	Cette fonction interroge la base des fiches et récupère
	*	celles qui appartiennent au type (transporteurs_md, expediteurs_md, etc.)
	*	et qui sont payantes.
	*	On ne s'occupe pas de la catégorie parce qu'il n'y aurait pas assez de résultats.
	*	Pour ajouter les catégories, compléter le tableau args = array() avec les éléments
	*	attendus par category_manager.php dans get_list();
	*
	*	$limit est réglé dans les paramètres spécifiques du site dans le répertoire config.
	*
	*
	*	L'ordre d'affichage est rendu aléatoire.
	*
	*
	*
	*	@$domaine (string) Correspond au type
	*	@return (array) Tableau de résultat contenant les fiches
	******/
	
	public function fiches_alaune($domaine, $cat)
	{
		$limit = $this->config->item("nbr_fiche_alaune");
		
		$args = array(
					
					"type"			=> $domaine, //Type transporteurs_md, experiteurs_md, etc...
					"payante"		=> TRUE //Une fiche est à la une si elle est payante.
				);
		$f = new Fiche;
		$results = $f->get_list($args);
	
		$list_key = array_rand($results, $limit);
		
		$list_alaune = array();
		foreach($list_key as $offset => $key)
		{
			array_push($list_alaune, $results[$key]);
		}
		
		return $list_alaune;
	}
	
	/*********************************
	*
	*	Fonction qui incrémente le nombre
	*	de fois où est vue une fiche
	*
	*
	**********************************/
	public function fiche_count_up($id_fiche)
	{
		//on récupère l'id de la fiche
		
		$data = array(
			"fiche_view"	=>	$id_fiche,
			"datetime"		=>	time()
		);		
		$this->db->insert("fiche_view", $data);
		
			
	}
	
	
	/****************
	*
	*	Processus d'insertion d'une évaluation
	*	1/ on alimente l'historique des votes
	*	2/ on calcul la moyenne
	*	3/ on met à jour la fiche
	*
	*
	*******************/
	public function fiche_eval($id_fiche,$note)
	{
	

		//On récupère l'adresse IP
		$ip = $this->input->ip_address();
		
		//On détermine la date du jour en secondes
		echo "<br />".$starttime 	= strtotime(date("Y-m-d 00:00:00"));
		echo "<br />".$endtime		= strtotime(date("Y-m-d 23:59:59"));
		
		

		//Si l'adresse IP est valide
		if( $ip != "0.0.0.0")
		{
			
			//On vérifie si le couple id_fiche<>adresse IP existe pour aujourd'hui
			$query = $this->db->get_where("fiche_eval", array(
						"fiche_id"	=> $id_fiche,
						"ip"		=> $ip,
						"timestamp >"	=> $starttime,
						"timestamp <"	=> $endtime	
						));
			$result = $query->result();
			
/* A REMETTRE
			if(count($result)==0)
			{
*/
				$data = array(
					"fiche_id"	=> $id_fiche,
					"ip"		=> $ip,
					"eval"		=> $note,
					"timestamp"	=> time()
				);
				
				
				//On insert l'évaluation dans l'historique
				$this->db->insert("fiche_eval", $data);
								
				//On récupère la liste des notes
				$query2 = $this->db->select("eval");
				$query2 = $this->db->where("fiche_id", $id_fiche);
				$query2 = $this->db->from($this->tbl_fiche_eval);
				$query2 = $this->db->get();
				$result_array = array();
				if ($query2->num_rows() > 0)
				{
					foreach($query2->result() as $row)
					{
						array_push($result_array, $row->eval);
					}
				}
				
				$eval_count  = count($result_array);
				$eval_average = array_sum($result_array) / $eval_count; 
				$eval_average = ceil($eval_average);
				echo "<br />eval average 2 : ".$eval_average;
				
				//On met à jour la fiche
				$data = array(
				               'eval_average' 	=> $eval_average,
				               'eval_count' 	=> $eval_count
				              );				         
				
				$this->db->where('id_fiche', $id_fiche);
				$this->db->update($this->tbl_fiches, $data); 
				echo $this->db->last_query();
				//On calcul la moyenne des notes
							/* 
			} A REMETTRE 
			*/
		}
		
		
		return FALSE;
	}
	
	
	/**
	*
	*	Fonction qui permet de retourner le nombre de fiches
	*	de conseillers à la sécurité selon les critères
	*	du moteur de recherche en front.
	*	La sortie est au format json
	*
	**************/
	public function search_cas_ajax()
	{
		//On récupère la demande
		
		$ajax_req = $this->input->post();
		
		//On instancie le tableau des tables, pour alimenter dynamiquement les noms des tables
		$from= array("fiche","fiche_has_type as fht");
		
		if(isset($ajax_req["classes"]) AND count($ajax_req["classes"])>=1)
		{
			$classes_in_string = implode("','",$ajax_req["classes"]);
			array_push($from,"fiche_has_classe as fhc") ;
			$sql_classes = " AND fiche.id_fiche = fhc.fiche_id
            AND fhc.classe IN ('".$classes_in_string."') ";
		}else{
			$sql_classes = " ";
		}
		
		if(isset($ajax_req["zones"]) AND count($ajax_req["zones"])>=1)
		{
			$zones_in_string = implode("','",$ajax_req["zones"]);
			array_push($from,"fiche_has_zone as fhz") ;
			$sql_zones = " AND fiche.id_fiche = fhz.fiche_id
            AND fhz.zone_id IN ('".$zones_in_string."') ";
		}else{
			$sql_zones = " ";
		}
		
		if(isset($ajax_req["mdtransp"]) AND count($ajax_req["mdtransp"])>=1)
		{
			$mdtransp_in_string = implode("','",$ajax_req["mdtransp"]);
			array_push($from,"fiche_has_mdtransp as fhm") ;
			$sql_mdtransp = "  AND fiche.id_fiche = fhm.fiche_id
            AND fhm.mdtransp IN ('".$mdtransp_in_string."') ";
		}else{
			$sql_mdtransp =" ";
		}
		
		$sql = "SELECT COUNT(*) as nbr_fiches";
		$sql .= " FROM ".implode(",",$from)." ";
		$sql .= " 
				WHERE publication_status = 'published'
            	AND fiche.id_fiche = fht.fiche_id
				AND fht.type_slug = 'conseiller_securite'
		";
		$sql .= $sql_zones;
		$sql .= $sql_classes;
		$sql .= $sql_mdtransp;
		
		$query = $this->db->query($sql);
		$results = $query->result_array();
		
		$data["json"] = json_encode($results);
		
		$this->output->enable_profiler(FALSE);				//On envoie une instruction spécifique pour désactiver le profiler d'application (automatisé via un hook)
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$this->layout->view("ajax_json_view", $data);
	}
	
	public function show_results_cas()
	{
	
		//On récupère le POST de recherche
		$req = $this->input->post();

		
		
		//On instancie le tableau des tables, pour alimenter dynamiquement les noms des tables
		$from= array("fiche","fiche_has_type as fht");
		
		if(isset($req["classe"]) AND count($req["classe"])>=1)
		{
			$classes_in_string = implode("','",$req["classe"]);
			array_push($from,"fiche_has_classe as fhc") ;
			$sql_classes = " AND fiche.id_fiche = fhc.fiche_id
            AND fhc.classe IN ('".$classes_in_string."') ";
		}else{
			$sql_classes = " ";
		}
		
		if(isset($req["zone"]) AND count($req["zone"])>=1)
		{

			$zones_in_string = implode("','",$req["zone"]);
			array_push($from,"fiche_has_zone as fhz") ;
			$sql_zones = " AND fiche.id_fiche = fhz.fiche_id
            AND fhz.zone_id IN ('".$zones_in_string."') ";
		}else{
			$sql_zones = " ";
		}
		
		if(isset($req["mdtransp"]) AND count($req["mdtransp"])>=1)
		{
			$mdtransp_in_string = implode("','",$req["mdtransp"]);
			array_push($from,"fiche_has_mdtransp as fhm") ;
			$sql_mdtransp = "  AND fiche.id_fiche = fhm.fiche_id
            AND fhm.mdtransp IN ('".$mdtransp_in_string."') ";
		}else{
			$sql_mdtransp =" ";
		}
		
		$sql = "SELECT * ";
		$sql .= " FROM ".implode(",", $from)." ";
		$sql .= " 
				WHERE publication_status = 'published'
            	AND fiche.id_fiche = fht.fiche_id
				AND fht.type_slug = 'conseiller_securite'
		";
		$sql .= $sql_zones;
		$sql .= $sql_classes;
		$sql .= $sql_mdtransp;
		
		
		$query = $this->db->query($sql);
/* 		echo $this->db->last_query(); */
		$this->data["fiches"] = $query->result_array();
		$this->data["total_fiches"]	=	count($this->data["fiches"]);
		$this->data["domaine"]	=	"conseiller_securite";
		$this->data["menu_sidebar"]	=	"cas";
				
		$this->_layout("ann_results");
		
		
	}
	
	
	
	
	
	private function _layout($layout)
	{
		switch($layout)
		{
			case 'ann_liste_cat' :	$this->data["body_id"]	=	"annuaire-transp";
									break;
			case 'choisir_griffe' :	$this->data["body_id"]	=	"home";
									break;
			case 'results_conseillers' :
			case 'ann_results' :	$this->data["body_id"]	=	"search_result";
									break;

			default :				$this->data["body_id"]	=	"home";
									break;
		}
		
/* 		$this->data["view_has_slider"] = TRUE; */
		$this->layout->view("_html_head", 	$this->data);
		$this->layout->view("_menu", 	$this->data);
		$this->layout->view("_breadcrumb", $this->data);
		$this->layout->view($layout, 	$this->data);
		$this->layout->view("_html_foot", 	$this->data);
		
	}
}