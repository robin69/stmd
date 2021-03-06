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

	static function get_all_users_by_name()
	{
		$CI =& get_instance();

		$CI->db->select("id_user,nom,prenom");
		$CI->db->order_by("nom", "ASC");
		return $results = $CI->db->get("user")->result();



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
	

	public function protect()
	{
		if($this->session->userdata("admin")!="1")
		{
			redirect("admin/login");
		}
	}
	

    public function fprotect()
    {

	    if($this->session->userdata("id_user") =="")
        {
            redirect("login/");
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
	*	==>depreciated : maintenant il vaut mieux utiliser les setters de l'objet user
	*	puis mettre à jour l'objet. Exemple : $this->set_compte_status("active");
	*	$this->_save();
	*
	************************************/
	public function activate($id_user)
	{
		/*
//On met l'objet à jour
		$this->compte_status = "active";
		//on fait la mise à jour dans la base
		$this->db->set("compte_status",$this->compte_status);
		$this->db->where("id_suer",$id_user);
*/
		$this->set_compte_status("active");
		$this->_save();


	}


	public function create_user_cookie($email,$pass)
	{
		$array = array(
			"email"=>$email,
			"userpass"=>$pass
		);

		$cookie_string_value = serialize($array);
		$cookie_value = $this->encrypt->encode($cookie_string_value);
		$cookie = array(
			"name"		=> 	"auth",
			"value"		=>	$cookie_value,
			"expire"	=>	"315569260"
		);

		$this->input->set_cookie($cookie);

	}
	

	/*******************************************
	*
	*	Fonction d'authentification automaitque
	*	On va lire le cookie et si celui-ci est valide
	*	on authentifie automatiquement l'utilisateur
	*	(création d'une session)
	*
	*********************************************/
	public function auto_auth()
	{
		//On regarde s'il y a un cookie
		$cookie = $this->input->cookie("stmd_auth", TRUE);
		if($cookie){
            $cookie = $this->encrypt->decode($cookie);            //Il est crypté. On décode le cookie
            $cookie = unserialize($cookie);                        //L'information est sérialisée, on désérialise
            //On lance l'authentification
            try{
                $id_user = $this->auth($cookie["email"] , md5($cookie["userpass"]));
            } catch(Exception $e){
                //Si l'utilisateur n'est pas connu
                if($e->getMessage() == "Utilisateur inconnu.")
                {
                    delete_cookie("stmd_auth"); // On supprime le cookie s'il y en a un
                    redirect("login");

                }else{
                    die("Erreur inconnu: ". $e->getCode() . "<br />" .
                        " File : " . $this->getFile() .
                        " Line : " . $this->getLine()
                    );
                }

            }


			if($id_user!= FALSE )
			{
				$this->create_user_session($id_user);
				return TRUE;
			}

		}

		return FALSE;


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


		if(isset($result->id_user) && $result->id_user !="")
		{
			//On met à jour la date de dernière connexion
			$this->db->set("lastcnx",time());
			$this->db->where("id_user",$result->id_user);
			$this->db->update($this->tbl_user);

			return $result->id_user;
		}else{
			throw new Exception("Utilisateur inconnu.");
            return FALSE;
		}


	}
	

	public function create_user_session($id_user)
	{
		//On met toutes les informations en Session
		$infos = $this->get($id_user);
		$this->hydrate($infos);


		//$this->session->all_userdata();
		$informations_stored = array(
			"id_user"	=> $this->id_user(),
			"nom"		=> $this->nom(),
			"prenom"	=> $this->prenom(),
			"email"		=> $this->email(),
			"admin"		=> $this->admin(),
		);

		$this->session->set_userdata($informations_stored);
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
	
	
    /************************************
     * Ajout d'un utilisateur.
     * La fonction reçoit le tableau qui contient
     * toutes les infos et les insert dans la base de données
     *
     *
     * @param $user_array
     *
     * @return mixed : l'identifiant utilisateur.
     */
	protected function add($user_array)
	{

		$exception_field = array("tbl_fiche","forfait");
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
        $this->id_user = $fiche_array["id_user"] = $new_id_user = $this->db->insert_id(); // et on récupère l'id d'insertion


        //Cas d'une sélection de forfait avant inscription


        if($user_array["forfait"] != "")
        {
            $this->user_select_forfait($user_array["forfait"]);
        }
		return $new_id_user;

	}
	

    /*********************************************
     * Fonction qui sélectionne un forfait pour un utilisateur donné.
     * Le forfait n'est pas active puisqu'il n'a pas de date de début.
     * Il est enregistré comme "préférence" au moment de l'inscription.
     * A ce stade, le tarif enregistré pour l'utilisateur est celui du forfait
     * initial, mais il pourra être modifié par l'administrateur
     * si besoin dans l'admin.
     *
     * @id_user : Identifiant de l'utilisateur demandeur du forfait
     * @id_forfait :    Identifiant du forfait demandé
     *
     * @return bool
     */
    public function user_select_forfait($id_forfait)
    {
        $id_user    = $this->id_user;

        //On récupère dans la base les informations du forfait sélectionné
        $query = $this->db->get_where('forfaits', array('id' => $id_forfait));
        $forfait = $query->row();




        //On insert dans la base de données le forfait sélectionné
        $data = array(
            "forfait_id"    =>  $id_forfait,
            "user_id"       =>  $id_user,
            "tarif"         =>  $forfait->tarif,    //On enregistre le prix initial du forfait. On pourra le changer plus tard.
        );
        $this->db->insert("user_has_forfaits", $data);


        return true;
    }


	protected function update($user_array)
	{
		$exception_field = array("forfait");
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


        if($user_array["forfait"] != "")
        {
            $this->user_select_forfait($user_array["forfait"]);
        }

		return;
	}




	


}
