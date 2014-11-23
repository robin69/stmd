<?php



    /************************************
     * Class Token
     *
     * Gère l'ensemble des actions du token.
     * L'objet Token est instancié puis la méthode
     * execute() doit être appellée. Cette dernière lancera
     * automatiquement l'action contenue dans le Token
     * dans le champ "action" du tableau.
     *
     * Méthode d'appel :
     * $Token = new Token();
     * $Token->execute();
     */

    class Token extends CI_Model{


        public $string;
        public $data = array();


        public function __construct($token_string=null)
        {
            parent::__construct();


            $this->string   = $this->get_token($token_string);
            $this->data     = $this->tokenread();

        }

        public function get_token($token_string=null)
        {

            if($token_string===null)
            {
                $string = $this->input->get("token");
            }else{
                $string = $token_string;
            }

            return $string;


        }

        /************************************
         *
         *	Fonction qui génère un token
         *
         *
         *	Réceptionne un tableau contenant des informations
         *	sérialize le tableau, l'encode et retourne une chaine
         *
         *	$array = array(
         *		"action"	=>	"Mon_action",
         *		"info_nom1"	=>	"info_value1",
         *		"info_nom2"	=>	"info_value2"
         *	);
         *
         *************************************/
        public function tokenize($array)
        {
            if(!is_array($array))
            {
                throw new Exception("Erreur Token : L'élément fourni n'est pas un tableau");
            }else{
                $string = serialize($array);				//On sérialise la chaine au cas où il s'agisse d'un tableau
                $string = $this->encrypt->encode($string);	//On décrypte le token
                $this->string = urlencode($string);
            }

        }

        /************************************
         *
         *	Fonction qui décrypt un token
         *
         *
         *	Réceptionne une chaine,
         *	puis désérialize la chaine pour récupérer
         *	un tableau qu'elle peut retourner
         *
         *	ATTENTION : on ne fait pas de urldecode, ce n'est pas la peine.
         *
         *************************************/
        public function tokenread()
        {
            $string = $this->encrypt->decode($this->string);	//On décode le cryptage
            $data = unserialize($string);				//On désérialize pour récupérer notre tableau

            return $data;
            //var_dump($this->data);


        }


        /***************************************
         * Active un compte via un token
         * @throws Exception
         */
        private function _tk_account_confirm()
        {
            $u = new User;

            //On récupère les infos de l'utilisateur
            try{
                $user_id = $u->auth($this->data["email"], $this->data["userpass"]);
            }catch(Exception $e){
                delete_cookie("stmd_auth"); // On supprime le cookie s'il y en a un
                return false;
                exit;
            }

            $our_user = new User($user_id);


            //On met à jour l'utilisateur en activant son compte
            $our_user->set_compte_status("active");
            $our_user->_save();

            //on crée une fiche vide pour cet utilisateur
            $user_fiche = new Fiche;
            $user_fiche->set_user_id($user_id);
            $user_fiche->set_publication_status("unpublished");
            $user_fiche->set_date_creation();
            $user_fiche->set_payante("0");
            $user_fiche->_save();


            //On crée la session utilisateur
            $our_user->create_user_session($our_user->id_user());


            //On redirige vers l'accueil de l'espace inscrit.
            return true;

        }

        public function execute()
        {
            //on appelle la méthode en fonction du contenu du token
            $method = "_tk_".$this->data["action"];
            $return =  $this->{$method}();
            try{
                $return =  $this->{$method}();
            }catch(Exception $e){
                $return = $e->getMessage();
            }


            return $return;

        }


        public function __toString()
        {
            if($this->string)
            {
                return $this->string;
            }else {
                return "Il n'y a pas de Tojen";
            }

        }

    }