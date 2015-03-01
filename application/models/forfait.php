<?php
    /**
    * Created by PhpStorm.
    * L'objet forfait matérialise le forfait utilisateur.
    * A ne pas confondre avec le Forfait générique pour
    * lesquels les champs sont différents et qui ne dispose
    * pas d'un modèle spécifique (ou peut être à venir en rérivé)
    *
    * Je fais une modification.
    * User: Rumeau
    * Date: 16/12/14
    * Time: 16:52
    */

    class Forfait extends CI_Model{

        protected $id;
        protected $forfait_id;
        protected $user_id;
        protected $tarif;
        protected $date_debut;
        protected $date_fin;
        protected $renouvel_from;
        protected $libelle;
        protected $description;
        protected $duree;
        protected $actif;
        private   $available_status  =   array("demande","forfait_en_attente_reglement","forfait_en_cours","old","demande_refusee");









        public function __construct($id_user = "")
        {
            parent::__construct();


        }


        public function id() { return $this->id; }


        //Liste des getters


        public function forfait_id() { return $this->forfait_id; }


        public function user_id() { return $this->user_id; }


        public function tarif() { return $this->tarif; }


        public function date_debut() { return $this->date_debut; }


        public function date_fin() { return $this->date_fin; }


        public function renouvel_from() { return $this->renouvel_from; }


        public function libelle(){return $this->libelle; }


        public function description(){return $this->description; }


        public function duree(){return $this->duree; }


        public function actif(){return $this->actif; }


        public function set_id($id)
        {
            if($id != "")
            {
                $this->id = $id;
            }
        }


        //Liste des setters


        public function set_forfait_id($forfait_id)
        {
            if($forfait_id != "")
            {
                $this->forfait_id = $forfait_id;
            }
        }


        public function set_user_id($user_id)
        {
            if($user_id != "")
            {
                $this->user_id = $user_id;
            }

        }


        public function set_tarif($tarif)
        {

            //On vérifie qu'il s'agit d'un numbre positif entier ou a virgule.
            if( is_numeric($tarif))
            {
                $this->tarif = $tarif;
            }
        }


        public function set_renouvel_from($id)
        {

            if($id != "")
            {
                $this->renouvel_from = $id;
            }
        }


        /***************
         * Retourne la liste des forfait de l'utilisateur. Un utilisateur
         * peut avoir plusieurs forfaits avec pour chacun un status différent
         * (demande, forfait en attente de règlement, forfait en cours.
         *
         * @param $id_user : id de l'utiilisateur concerné
         *
         * @return mixed : tableau des informations du forfait.
         */
        public function get_user_forfaits($id_user)
        {
            //Va chercher le forfait courant de l'utilisateur
            $this->clean_demandes();

            $query  =   $this->db->join("forfaits", "forfaits.id = user_has_forfaits.forfait_id","inner");
            $query  =   $this->db->order_by("date_demande", "DESC");
            $query  =   $this->db->get_where("user_has_forfaits", array("user_id"=>$id_user));

            $results = $query->result();
            $this->db->last_query();

            return $results;
        }


        /******************************
         * Fonction qui parcours la table des demandes
         * de forfait utilisateur pour ne garder que les dernières demandes
         * pour chaque.
         * Note : une demande est caractérisée par le fait qu'elle n'a ni
         * date de début, ni date de fin + qu'elle a le status "demande"
         *
         * @return (array) la liste des utilisateurs ayant une demande active.
         */
        public function clean_demandes()
        {
            //On sélectionne toutes les fiches utilisateur classée par date décroissante
            $query  =   $this->db->order_by("date_demande","DESC");
            $query  =   $this->db->get_where("user_has_forfaits", array("date_debut"=>NULL,"date_fin"=>NULL, "status"=>"demande"));
            $demandes =   $query->result();

            //Pour chaque utilisateur on supprime tous les enregistrement sauf le plus récent
            $users = array();
            foreach($demandes as $key => $demande)
            {
                if(in_array($demande->user_id,$users)){
                    $this->db->delete("user_has_forfaits", array("id"=>$demande->id));
                }else{
                    array_push($users,$demande->user_id);
                }
            }

            return $users;

        }


        /****************************************
         * Retourne la liste complète des forfaits, sans filtre.
         * @return mixed
         */
        public function get_all_forfaits()
        {

            $q =  $this->db->get_where("forfaits");
            $results = $q->result();

            return $results;
        }


        /******************
         * Retourne un forfait précis, actif,
         * sélectionné par ID
         *
         * @id :  l'id du forfait
         * @return : les informations du forfait
         */
        public function get_by_id($id)
        {
            $q = $this->db->get_where("forfaits", array("id"=>$id, "actif"=>1));
            $result = $q->row();


            return $result;

        }


        /***********
         * Retourne la liste des demandes de chnagement de forfait
         * effectuées par les utilisateurs.
         * un utilisateur peut faire autant de demandes qu'il le souhaite
         * mais seule la dernière demande sera prise en compte.
         *
         * Une demande référence un utilisateur et le forfait sélectionné + le status demande.
         *
         * @return array Liste des demandes utilisateur.
         */
        public function get_demmandes_chg_forfait()
        {
            //On vérifie s'il y a d'autres demandes avant celle en cours,
            $this->clean_demandes();

            //on sélectionne tous les ID dont
            /* $query = $this->db->group_by("user_id");
             $query = $this->db->order_by("date_demande", "DESC");
             $query = $this->db->join("user", "user.id_user = user_has_forfaits.user_id", "inner");
             $query = $this->db->join("forfaits", "forfaits.id = user_has_forfaits.forfait_id", "inner");
             $query = $this->db->get_where("user_has_forfaits", array("date_debut"=>NULL,"date_fin"=>NULL, "status"=>"demande"));*/
            $sql = "SELECT
          uhf.id as id_demande,
          uhf.forfait_id as id_forfait,
          uhf.user_id as user_id,
          uhf.tarif as tarif_effectif,
          uhf.date_debut as date_debut,
          uhf.date_fin as date_fin,
          uhf.renouvel_from as renouvel_from,
          uhf.status as status_demande,
          uhf.date_demande as date_demande,
          user.*,forfaits.*
        FROM user_has_forfaits as uhf
          INNER JOIN `user` ON `user`.`id_user` = `uhf`.`user_id`
          INNER JOIN `forfaits` ON `forfaits`.`id` = `uhf`.`forfait_id`
        WHERE `date_debut` IS NULL AND `date_fin` IS NULL AND `status` = 'demande' GROUP BY `user_id` ORDER BY `date_demande` DESC";
            $query = $this->db->query($sql);
            $result = $query->result();

            // echo $this->db->last_query();

            return $result;


        }


        /******************************************************
         * Function qui permet d'activer un forfait. L'activation d'un forfait ne peut avoir lieu que si l'utilisateur
         * a fait une demande. L'activation consiste à ajouter une date de début et de fin + changer le status d'une demande à
         * forfait_en_cours.
         *
         * @param $user_id
         *
         * @return bool
         */
        public function activate($user_id)
        {

            //On récupère la dernière demande
            $demande =   $this->get_user_latest_demande($user_id);

            if(!empty($demande))
            {
                $this->hydrate($demande); //on alimente l'objet actuel avec la demande en vue de sa transformation en forfait actif

                //On passe le forfait actuel en old s'il y en a un
                $forfait_courant = $this->get_user_current_forfait($user_id);
                if(!empty($forfait_courant))
                {
                    $old_forfait = new Forfait();
                    $old_forfait->hydrate($forfait_courant);
                    $old_forfait->set_status("old");
                    $old_forfait->save();
                }

                //On prépare la demande pour qu'elle se transforme en forfait actif
                list($year,$month,$day) = explode('-',date("Y-m-d"));
                $this->set_date_debut(time());
                $date_fin = mktime(23,59,59,$month,$day,($year + 1));
                $this->set_date_fin($date_fin);
                $this->set_status("forfait_en_cours");
                $this->clean_demandes();//On nettoie les demandes pour ne garder que la dernière
                $this->save();

                return true;
            }

            return false;
        }


        /******************************************
         * Permet de récupérer la dernière demande effectuée par
         * un utilisateur.
         * + nettoyage des anciennes demandes au passage.
         * @param $user_id
         *
         * @return mixed
         */
        public function get_user_latest_demande($user_id)
        {
            $query  =   $this->db->order_by("date_demande", "DESC");
            $query  =   $this->db->get_where("user_has_forfaits", array("user_id"=>$user_id, "status"=>"demande"));
            $result = $query->row();
            return $result;
        }


        public function hydrate($donnees)
        {

            foreach($donnees as $key => $value)
            {
                $method_name = "set_".$key;


                if(method_exists($this,$method_name))
                {
                    $this->$method_name($value);
                }
            }
        }


        /**********************************************
         * Récupère LE forfait en cours pour un utilisateur donné
         *
         * @param $user_id
         *
         * @return mixed
         */
        public function get_user_current_forfait($user_id)
        {
            $query  =   $this->db->get_where("user_has_forfaits", array("user_id"=>$user_id, "status"=>"forfait_en_cours"));
            $result = $query->row();
            return $result;
        }


        /**************************************
         * Le status du forfait détermine s'il s'agit d'une demande
         * de changement ou si la demande a été acceptée, etc.
         * Les status disponibles sont renseignés dans la base dans le
         * champ status en enum, et dans le code, dans cette classe,
         * sous la forme d'un tableau privé.
         * Avant d'attribuer un status, on vérifie donc que celui demandé correspond
         * bien a un status existant.
         *
         * @param $status
         */
        public function set_status($status)
        {
            if(in_array($status,$this->available_status))
            {
                $this->status = $status;
            }

        }


        /************************************
         * Détermine s'il s'agit d'un nouvel
         * enregistrement ou d'un ancien, et de fait
         * effectue une mise à jour ou
         * crée un nouvel enregistrement.
         *
         */
        public function save()
        {
            $data = array();
            $exception = array(
                "libelle",
                "description",
                "duree",
                "actif",
                "available_status"
            );

            foreach ($this as $key => $value)
            {
                if(!in_array($key, $exception)){
                    $data[$key] = $value;
                }

            }



            if(empty($this->id))
            {
                $this->db->insert("user_has_forfaits", $data);
            }else{

                $this->db->where("id",$this->id);
                $this->db->update("user_has_forfaits", $data);
            }
        }


        public function set_date_debut($date)
        {
            if($date != '')
            {
                $this->date_debut = $date;
            }

        }


        public function set_date_fin($date)
        {
            if($date != '')
            {
                $this->date_fin = $date;
            }
        }


        public function moderate_demande($id_demande, $status)
        {
            //On va chercher toutes les demandes pour le même utilisateur
            //Ex. id 106
            $sql = "SELECT * FROM user_has_forfaits as uhf
          left join user_has_forfaits as uhf2 ON uhf.user_id = uhf2.user_id
        WHERE uhf.id = ".$id_demande."
        ORDER BY uhf.date_demande DESC";

            $query = $this->db->query($sql);
            $results = $query->result();

            //echo $this->db->last_query();

            //On traite les changements
            if($status == "accepter" && count($results)>=1)
            {
                foreach($results as $forfait)
                {

                    //Si il s'agit de la demande en cours de traitement, on met à jour le statut et le reste...
                    if($forfait->id == $id_demande)
                    {
                        $data = array(
                            "status"=>"forfait_en_cours",
                            "date_debut"=>time(),
                            "date_fin" => mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y")+1)
                        );

                        $this->db->where("id",$id_demande);
                        $this->db->update("user_has_forfaits",$data);



                    }elseif($forfait->status =="forfait_en_cours"){
                        $data=  array(
                            "date_fin"=>time(),
                            "status"=>"old"
                        );
                        $this->db->where("id",$forfait->id);
                        $this->db->update("user_has_forfaits",$data);
                    }

                }
            }else{
                //On met le status de la demande à "demande_refusee" et on ne touche pas aux autres
                $this->db->where("id",$id_demande);
                $this->db->update("user_has_forfaits",array("status"=>"demande_refusee"));
                echo $this->db->last_query();
            }



            return true;

        }


    }