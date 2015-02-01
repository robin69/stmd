<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscrits extends CI_Controller {


	public $theme 		= "admin";
	public $data		= array("");




	public function __construct()
	{
		parent::__construct();
		
		$this->layout->set_theme($this->theme);
		$this->data["activ_menu"] 	= 	"fiches";
		$this->data["page_title"]	=	"GESTION DES FICHES";
		$this->data["sub_title"]	=	"Toutes les fiches";
		$this->data["fiches"]		=	array();
	}
	
	public function _remap($method, $params = array())
	{
		 //Protection 
 		 $this->user->protect();
		 
		 //renvois général avec les paramètres.
		 if(method_exists($this, $method))
		 {
				 return call_user_func_array(array($this, $method), $params);
		 }
	}

	
	/***
	*
	*	Function index()
	*
	*	affiche par la liste des fiches
	*/
	public function index()
	{
		//par défaut on affiche la liste des fiches
		$this->liste();
	}
	
	
	/********************************
	*
	*	Liste par status
	*
	*
	*
	*********************************/
	public function liste()
	{
	
		//Je récupère le tableau d'argument de l'url.
		$uri_array = $this->uri->uri_to_assoc(4);
		
		//Si il y a un numéro de page
		if(array_key_exists("offset",$uri_array)){
			$offset = $uri_array["offset"];		//On le récupère
			unset($uri_array["offset"]);			//Puis on détuit l'élément du tableau
		}else{
			$offset = 0;
		}
		

		//On crée une instance du manageur de fiche
		$f_manager = new Fiche_manager;
		//On récupère le nombre totale de lignes
		$config["total_rows"] = $f_manager->count_list($uri_array,false);
		//On définie l'URL de pagination
		$uri = $this->uri->assoc_to_uri($uri_array)."/";
		
		$config["base_url"] = site_url("admin/inscrits/liste")."/".$uri."/offset/";
		$config['uri_segment'] = (count($uri_array)*2)+5;	//Une entrée dans le tableau = 2 éléments (key et value) donc 2 segments d'url.
		$config["per_page"] = $this->config->item('elem_per_page');
		
		
		//On complète la reqûete pour l'affichage et on lance la requête
		$uri_array["offset"]	= 	$offset;
		$uri_array["limit"]		=	$config["per_page"];
		$liste_fiche = $f_manager->get_list($uri_array, false);
		
		//On parse le résultat pour générer la variable $data["fiches"];
		if(count($liste_fiche)>=1)
		{
			foreach($liste_fiche as $key => $fiche)
			{
				$item = new Fiche;
				$item->hydrate($fiche);
				array_push($this->data["fiches"],$item);
			}

		}	
		
		//On récupère les catégories principales (domaines)
		$category = new Category;
		$this->data["categories_principales"] = $category->get_all_domaines();
		
		
		
		//Envois pour affichage

		
		$this->pagination->initialize($config); 

		$this->_layout("fiche_liste");


		
	}
		
	
	private function _layout($layout)
	{
		$this->layout->view("_header");
		$this->layout->view("_menu", $this->data);
		$this->layout->view($layout, $this->data);
		$this->layout->view("_footer");

	}
	
	
	/***************************************
	*
	*	EDIT Function
	*
	*	@id_fiche : Identifiant de la fiche
	*
	*****************************************/
	public function edit_fiche_desc($id_fiche="")
	{
		//On traite le formulaire s'il est envoyé
		if($this->input->post())
		{
			$fiche = $this->_update_object_field();

		}else{
			//On récupère les informations de la fiche
			$manager = new Fiche_manager;
			$fiche = new Fiche;
			$infos = $manager->get($id_fiche);
			$fiche->hydrate($infos);
		}



		$cat = new Category;

		$this->data["form"]					=	"modif";
		$this->data["sub_menu_actif"]		=	"fiche_desc_form";
		$this->data["submit_button_label"]	=	"Mettre à jour";
		$this->data["title"]				=	"FICHE : ".$fiche->raison_sociale();
		$this->data["fiche"] 				=	$fiche;
		$this->data["types"]				=	$this->db->get("types");
		$this->data["zones"]				=	$this->db->get("zones");
		$this->data["domaines"]				= 	$cat->get_all_domaines();
		$this->data["fiche_cats"] 			= 	$fiche->categories();

		$this->_layout("fiche_desc_form");
	}
	

	/****
	*
	*	Met à jour l'objet
	*	avec les éléments envoyés par le post
	*
	*
	*
	*
	*/
	private function _update_object_field()
	{
		//On récupère les informations actuelles
		$fiche = new Fiche;

		$infos = $fiche->get($this->input->post("id_fiche"));

		$fiche->hydrate($infos);

		//On ajoute modifie avec les informations du post
		foreach($this->input->post() as $field => $value)
		{
			$method_name = "set_".$field;
			$fiche->$method_name($value);
		}


		//on Enregistre l'objet.
		$fiche->_save();


		return $fiche;
	}
	
	
	/***************************************
	*
	*	EDIT Function
	*
	*	@id_fiche : Identifiant de la fiche
	*
	*****************************************/
	public function edit_fiche_ressoc($id_fiche="")
	{

		//On traite le formulaire s'il est envoyé
		if($this->input->post())
		{
			$fiche = $this->_update_object_field();

		}else{
			//On récupère les informations de la fiche
			$manager = new Fiche_manager;
			$fiche = new Fiche;
			$infos = $manager->get($id_fiche);
			$fiche->hydrate($infos);
		}



		$cat = new Category;

		$this->data["form"]					=	"modif";
		$this->data["sub_menu_actif"]		=	"fiche_ressoc_form";
		$this->data["submit_button_label"]	=	"Mettre à jour";
		$this->data["title"]				=	"FICHE : ".$fiche->raison_sociale();
		$this->data["fiche"] 				=	$fiche;
		$this->data["types"]				=	$this->db->get("types");
		$this->data["zones"]				=	$this->db->get("zones");
		$this->data["domaines"]				= 	$cat->get_all_domaines();
		$this->data["fiche_cats"] 			= 	$fiche->categories();


		$this->_layout("fiche_ressoc_form");
	}
	
	
	/***************************************
	*
	*	EDIT Function
	*
	*	@id_fiche : Identifiant de la fiche
	*
	*****************************************/
	public function edit_fiche_cat($id_fiche="")
	{

		//On traite le formulaire s'il est envoyé
		if($this->input->post())
		{
			$fiche = $this->_update_object_field();

		}else{
			//On récupère les informations de la fiche
			$fiche = new Fiche;
			$fiche->hydrate($fiche->get($id_fiche));
		}



        //var_dump($fiche);




		$cat = new Category;

		$this->data["form"]					=	"modif";
		$this->data["sub_menu_actif"]		=	"fiche_cats_form";
		$this->data["submit_button_label"]	=	"Mettre à jour";
		$this->data["title"]				=	"FICHE : ".$fiche->raison_sociale() ;
		$this->data["fiche"] 				=	$fiche;





		//TYPES
		$this->data["types"]				=	Type::get();
        //ZONES
        $query = $this->db->get("zones");
        $zone_list = $query->result();

        //CLASSES
        $query = $this->db->get("classes");
        $class_list = $query->result();


        //var_dump($results);


		$this->data["zones"]				=	$zone_list;
		$this->data["domaines"]				= 	$cat->get_all_domaines();
		$this->data["fiche_cats"] 			= 	$fiche->categories();
        $this->data["classes"]              =   $class_list;


		$this->_layout("fiche_cats_form");
	}
	
	
	public function add()
	{
		$cat = new Category;
		$fiche = new Fiche;

		if($this->input->post())
		{

			//si le formulaire est correctement renseigné
			if($this->form_validation->run("fiche_infos_add") == TRUE)
			{
				$fiche->hydrate($this->input->post());	//On alimente l'objet




				$id_fiche = $fiche->_save();


				redirect("admin/inscrits/edit_fiche_infos/".$id_fiche);
			}

		}

		$this->data["form"]					=	"add";
		$this->data["sub_menu_actif"]		=	"fiche_infos_form";
		$this->data["submit_button_label"]	=	"Enregistrer";
		$this->data["title"]				=	"CRÉATION D'UNE NOUVELLE FICHE";
		$this->data["fiche"]				=	$fiche;
		$this->data["types"]				=	$this->db->get("types");
		$this->data["zones"]				=	$this->db->get("zones");
		$this->data["domaines"]				= 	$cat->get_all_domaines();


		$this->_layout("fiche_infos_form");


	}

	
	public function edit_submit()
	{
        //On instancie une fiche
        $fiche = new Fiche_model();

        //on nourris l'objet avec les infos du post
        $fiche->build($this->input->post());

		//On vérifie les informations envoyées
		if($this->form_validation->run("fiche_form_modif") == TRUE)
		{

			if($fiche->update())
			{
				//On envois un message de confirmation au formulaire
				$this->data["notification_note"] = array("type"=>"success","msg"=>"La mise à jour s'est effectuée correctement");
			}else{
				$this->data["notification_note"] = array("type"=>"error","msg"=>"Il y a eu problème pendant la mise à jour");
			}



			if($this->input->post("cat"))
			{

				//On met à jour les catégories pour cette fiche.
				$fiche->update_cats($this->input->post("cat"));

			}

			//On revient sur le formulaire d'édition
			$this->edit($fiche->id_fiche);

		}else{
			$this->edit($fiche->id_fiche);
		}
	}
	

	public function unpublish($id_fiche)
	{
		$fiche = new Fiche;
		$fiche->set_id_fiche($id_fiche)	;
		$fiche->unpublish();

		//On récupère l'url d'origine et on redirige vers cette url
		$url_back = str_replace(site_url(),"",$_SERVER["HTTP_REFERER"]);
		redirect($url_back);

	}
	

	public function publish($id_fiche)
	{
		$fiche = new Fiche;
		//avant de publier il faut alimenter l'objet pour qu'il puisse vérifier si la publication est possible
		$infos = $fiche->get($id_fiche);
		$fiche->hydrate($infos);


		$fiche->publish();

		//On récupère l'url d'origine et on redirige vers cette url
		$url_back = str_replace(site_url(),"",$_SERVER["HTTP_REFERER"]);
		redirect($url_back);

	}
	
	
	public function publishing($id_fiche,$status)
	{

		$fiche = new Fiche;

		if($status == TRUE)
		{

			$fiche->set_id_fiche($id_fiche)	;
			$fiche->publish();
		}

		//On récupère l'url d'origine et on redirige vers cette url
		$url_back = str_replace(site_url(),"",$_SERVER["HTTP_REFERER"]);
		//redirect($url_back);
	}
	
	
	public function delete($id_fiche)
	{

		$fiche = new Fiche;
		$fiche->delete($id_fiche);
		//On récupère l'url d'origine et on redirige vers cette url
		$url_back = str_replace(site_url(),"",$_SERVER["HTTP_REFERER"]);
		redirect($url_back);

	}
	
	
	public function add_submit()
	{
		$this->data["form"]		=	"add";
		$this->data["title"]	=	"AJOUTER UNE FICHE";
		//On vérifie les informations envoyées
		if($this->form_validation->run("fiche_form") == TRUE)
		{
			$fiche = new Fiche_model;
			$fiche->build($this->input->post());
			$this->id_fiche = $fiche->add();
			$this->edit($this->id_fiche);


		}else{
			//echo validation_errors();
			$this->_layout("fiche_form");
		}
	}
	
	
	/*****************************
	*
	*	Importer les catégories de
	*	l'ancien site SolutionsTMD.
	*	Nes pas utiliser pour importer de
	*	nouvelles catégories
	*
	*
	***************/
	public function import_from_old_site()
	{


		//On se connecte à la base de données de l'ancien site
		$DB1 = $this->load->database('old', TRUE);
		//On se connecte à la base de données de l'ancien site
		$DB2 = $this->load->database('dev', TRUE);


		$query = $DB1->get("solutionstmd.fiche");
		$fiches = $query->result_array();

		echo "<h1>Import des fiches depuis SolutiondTMD (ancien site)</h1>";
		echo "<br /><br /><br />";
		echo "+++++++++++++++++++++++++++++";
		echo "<br />> Purge des tables et réinnitialisation des clefs d'enregs.";
		//On remet à zéro les deux tables
		$query = $DB2->truncate("stmd.fiche");					//La table catégory
		$query = $DB2->truncate("stmd.fiche_has_category");		//La table de liaison catégorie
		$query = $DB2->truncate("stmd.fiche_has_type");			//La table de liaison catégorie
		$query = $DB2->truncate("stmd.user");					//La table de liaison catégorie
		$query = $DB2->truncate("stmd.fiche_has_zone"); 		//La table de liaison des zones
		echo "<br />> Purge effectuée";

		echo "<h3>+++++++++++++++++++++++++++++ MIGRATION DES FICHES +++++++++++++++++++++++++++++</h3>";
		//Pour chaque fiche
		$stored_users = array();

		foreach($fiches as $fiche)
		{

			echo "<pre style='background-color:white;color:black;font-size:16px;text-align:left;'>";
				var_dump($fiche);
			echo "</pre>";

			echo "<br/><br/>";
			echo "<h5>ID ancienne Fiche::".$fiche["id"]."</h5>";

			//Si il ne s'agit pas d'un compte géré par Guillaume ET si l'utilisateur n'existe pas déjà
			if(!in_array($fiche["email"], $stored_users))
			{
				$this->load->helper('email');
				if($fiche["email"] != "C@c.com" AND $fiche["email"] !="" AND valid_email($fiche["email"]))
				{
					//On s'occupe d'enregistrer l'utilisateur
					$array_user_to_store	=	array(
						"email"		=>	$fiche["email"],
						"userpass"	=>	md5($fiche["password"]),
						"nom"		=>	$fiche["nom_contact"],
						"prenom"	=>	$fiche["prenom_contact"],
						"tel"		=>	$fiche["tel"],
						"admin"		=>	0
					);

					switch($fiche["published"])
					{
						case "1"	:	$array_user_to_store["compte_status"]	=	"active"; break;
						default 	: 	$array_user_to_store["compte_status"]	=	"non-active";
					}

					$u = new User;
					$u->hydrate($array_user_to_store);
					$id_user = $u->_save();
					echo "<br />Création de l'utilisateur ...";

					array_push($stored_users, $fiche["email"]);

				}else{
					echo "<br />L'utilisateur est l'admin ...";
					$id_user = 1;
				}

			}else{
				echo "<br />L'utilisateur existe déjà ...";
				//on récupère l'id utilisateur
				$query = $DB2->get_where("user", array("email"=>$fiche["email"]));
				$result = $query->row_array();
				$id_user = $result["id_user"];

			}




			//On prépare le tableau
			$array_fiche_to_store = array(
				"user_id"				=>	$id_user,
				"nom_contact"			=>	stripslashes($fiche["nom_contact"]),
				"prenom_contact"		=>	stripslashes($fiche["prenom_contact"]),
				"tel_contact"			=>	stripslashes($fiche["tel"]),
				"email_contact"			=>	stripslashes($fiche["email_contact"]),
				"raison_sociale"		=>	stripslashes($fiche["raison_sociale"]),
				"adr1"					=>	stripslashes($fiche["adresse"]),
				"cp"					=>	stripslashes($fiche["cp"]),
				"ville"					=>	stripslashes($fiche["ville"]),
				"email_societe"			=>	stripslashes($fiche["email"]),
				"tel_societe"			=>	stripslashes($fiche["tel"]),
				"fax"					=>	stripslashes($fiche["fax"]),
				"site"					=>	$fiche["site"],
				"description"			=>	stripslashes($fiche["contenu_fiche"]),
				"date_creation"			=>	$fiche["date_creation"],
				"date_reglement"		=>	$fiche["date_reglement"],
				"payante"				=>	$fiche["payante"],
				"types"					=>	array(),
				"zones"					=>  array()
			);

			echo "<br/> SOCIETE : ".$array_fiche_to_store["raison_sociale"]."<br/>";

			//Lorsqu'il s'agit d'une fiche gérée par Guillaume, on ne s'occupe pas du nom et du prénom du contact
			if($fiche["nom_contact"] == "C" OR $fiche["prenom_contact"] == "C")
			{
				$array_fiche_to_store["nom_contact"] = "";
				$array_fiche_to_store["prenom_contact"] = "";
			}

			//On alimente le type
			switch($fiche["main_cat"])
			{
					case "1"	:	$type = array("transporteurs_md");		break;
					case "2"	:	$type = array("expediteurs_md");		break;
					case "3"	:	$type = array("conseiller_securite");	break;
			}
			array_push($array_fiche_to_store["types"], $type[0]);
			echo "<br />Le type est : ".$type[0]." ...";



			//On alimente les zones (régions). Par défaut, la région du siège correspond à une première zone d'intervention.
			$dpt = substr($fiche["cp"], 0, 2);
			$query = $DB2->get_where("stmd.departements", array("dept_nbr"=>$dpt));
			$result = $query->row();



			//Si il y a des résultats (certains CP sont étrangers et n'ont pas de région par défaut
			if($query->num_rows() > 0)
			{
				echo "<br />MAIN REGION: ".$result->main_region;

				array_push($array_fiche_to_store["zones"], $result->main_region);
				echo "<br />La zone par défaut est : ".$result->main_region." ...";
			}




			//On corrige le status de publication
			echo "<br />Le status est : ".$fiche["published"];
			switch($fiche["published"])
			{
					case "1"	:	$array_fiche_to_store["publication_status"] = "published";			break;
					case "0"	:	$array_fiche_to_store["publication_status"] = "unpublished";		break;
					default		:	$array_fiche_to_store["publication_status"] = "temp";				break;
			}

			//On s'occupe de l'ancienne catégorie
			if($fiche["categories"] != "")
			{
				echo $fiche["categories"];
				$old_id_list = explode(',', $fiche["categories"]);

				$query = $DB1->where_in("id", $old_id_list);
				$query = $DB1->from("solutionstmd.cat");
				$query = $DB1->get();
				$results = $query->result_array();

				$new_id_list = array();
				foreach($results as $old_cat)
				{
					$nom = url_title($old_cat["nom"]);
					//On recherche dans la nouvelle base les catégories concernées
					$query = $DB2->get_where("stmd.category", array("slug"=>$nom));
					$new_cat = $query->row_array();
					array_push($new_id_list, $new_cat["id_category"]);

				}

				$array_fiche_to_store["categories"] = $new_id_list;
			}



			//On vérifie si une fiche existe déjà avec le même libellé dans la base actuelle
			$query = $DB2->where("raison_sociale", $array_fiche_to_store["raison_sociale"]);
			$query = $DB2->from("fiche");
			$query = $DB2->get();
			$result = $query->row();

			if($result)
			{
				echo "<br />La fiche existe deja. Il faut juste la mettre a jout avec les bons types (et categories peut etre...).<br />";

				//On récupère la fiche concernée
				$f = new Fiche($result->id_fiche);

				//On complète les catégories par celle de la nouvelle fiche
				if(isset($array_fiche_to_store["categories"]))
				{
					$anciennes_categories = $f->categories();
					$nouvelles_categories = $array_fiche_to_store["categories"];
					$totale_categories = array_merge($anciennes_categories, $nouvelles_categories);
					$totale_categories = array_unique($totale_categories); //Dédoublonne les éléments du tableau
					$f->set_categories($totale_categories);
				}


				//On fait la même opération pour les types
				if(isset($array_fiche_to_store["types"]))
				{
					$anciennes_types = $f->types();
					$nouveau_types = $array_fiche_to_store["types"];
					$totale_types = array_merge($anciennes_types, $nouveau_types);
					$totale_types = array_unique($totale_types);
					$f->set_types($totale_types);
				}

			}else{
				echo "<br /> La fiche n'existe pas encore on peut l'enregistrer dans la nouvelle base.<br /> ";
				//On insert la fiche dans la nouvelle base
				$f = new Fiche;
				$f->hydrate($array_fiche_to_store);

			}


			//Qu'il s'agisse d'une nouvelle fiche ou d'une mise à jour, je sauvegarde mon travail
			$new_id_fiche = $f->_save();

			echo "<br />La nouvel ID de la fiche est : ".$new_id_fiche;
			echo "<br />La fiche a été créée correctement.";
			echo "<br/>-----------------------------------------------------------";




		}






		//fin chaque catégorie

	}
	
	
    public function moderate($id_fiche,$accepted)
    {
        /*echo $id_fiche;
        echo $accepted;*/
        $f = new Fiche($id_fiche);
        $status = $f->moderate($accepted);

        //On envois un message de confirmation au formulaire
        if($status){
            $this->data["notification_note"] = array("type"=>"success","msg"=>"La modération est prise en compte, un message a été envoyé à l'utlisateur");
        }else{
            $this->data["notification_note"] = array("type"=>"error","msg"=>"La modération a été prise en compte, mais l'utilisateur n'a pas été notifié.");
        }


        //On retourne sur la page d'édition de la fiche
        $this->edit_fiche_infos($id_fiche);




    }


	/***************************************
	*
	*	EDIT Function
	*
	*	@id_fiche : Identifiant de la fiche
	*
	*****************************************/
	public function edit_fiche_infos($id_fiche)
	{
		//On traite le formulaire s'il est envoyé
		if($this->input->post())
		{
			if($this->form_validation->run("fiche_infos_update") == TRUE)
			{
				$fiche = $this->_update_object_field();
			}

		}else{
			//On récupère les informations de la fiche
			$manager = new Fiche_manager;
			$fiche = new Fiche;
			$infos = $manager->get($id_fiche);
			$fiche->hydrate($infos);
		}



		$cat = new Category;

		$this->data["form"]					=	"modif";
		$this->data["sub_menu_actif"]		=	"fiche_infos_form";
		$this->data["submit_button_label"]	=	"Mettre à jour";
		$this->data["title"]				=	"FICHE : ".$fiche->raison_sociale();
		$this->data["fiche"] 				=	$fiche;
		$this->data["types"]				=	$this->db->get("types");
		$this->data["zones"]				=	$this->db->get("zones");
		$this->data["domaines"]				= 	$cat->get_all_domaines();
		$this->data["fiche_cats"] 			= 	$fiche->categories();


		$this->_layout("fiche_infos_form");
	}


    public function recieved_payment($fiche_id, $status)
    {
        //Instanciation de la fiche
        $f = new Fiche($fiche_id);

        //On met à jour les éléments de la fiche
        if(!empty($fiche_id) AND $status)
        {
            $f->set_date_reglement(time());
            $f->_save();
            //Si il y a règlement, il y a forfait. Il faut donc l'activer aussi.
            $this->load->model("Forfait");
            $uf = new Forfait();
            $uf->activate($f->user_id());
        }


        $this->edit_fiche_infos($fiche_id);



    }
	
	
}