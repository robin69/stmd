<?php
/**
 * Created by PhpStorm.
 * L'objet forfait matérialise le forfait utilisateur.
 * A ne pas confondre avec le Forfait générique pour
 * lesquels les champs sont différents et qui ne dispose
 * pas d'un modèle spécifique (ou peut être à venir en rérivé)
 *
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









    public function __construct($id_user = "")
    {
        parent::__construct();


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


    //Liste des getters
    public function id() { return $this->id; }
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
        $query  =   $this->db->get_where("user_has_forfaits", array("user_id"=>$id_user));
        $results = $query->result();
        //echo $this->db->last_query();

        return $results;
    }


    /******************************
     * Fonction qui parcours la table des demandes
     * de forfait utilisateur pour ne garder que les dernières demandes
     * pour chaque.
     * Note : une demande est caractérisée par le fait qu'elle n'a ni
     * date de début, ni date de fin.
     *
     * @return (array) la liste des utilisateurs ayant une demande active.
     */
    public function clean_demandes()
    {
        //On sélectionne toutes les fiches utilisateur classée par date décroissante
        $query  =   $this->db->order_by("date_demande","DESC");
        $query  =   $this->db->get_where("user_has_forfaits", array("date_debut"=>NULL,"date_fin"=>NULL));
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
            "actif"
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
        $query = $this->db->group_by("user_id");
        $query = $this->db->order_by("date_demande", "DESC");
        $query = $this->db->join("user", "user.id_user = user_has_forfaits.user_id", "inner");
        $query = $this->db->join("forfaits", "forfaits.id = user_has_forfaits.forfait_id", "inner");
        $query = $this->db->get_where("user_has_forfaits", array("date_debut"=>NULL,"date_fin"=>NULL, "status"=>"demande"));
        $result = $query->result();

       // echo $this->db->last_query();

        return $result;


    }




} 