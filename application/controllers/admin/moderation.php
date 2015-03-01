<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Moderation extends CI_Controller
    {


        public $theme = "admin";
        public $data = array("");


        public function __construct()
        {

            parent::__construct();

            $this->layout->set_theme($this->theme);
            $this->data["activ_menu"] 	= 	"moderation";
            $this->data["page_title"]	=	"MODERATION";
            $this->data["sub_title"]	=	"Modération du site";
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

        public function mod_forfait($id_demande="",$status="")
        {

            $forfait = new Forfait();

            if(!empty($id_demande) && !empty($status))
            {

                $forfait->moderate_demande($id_demande,$status);
            }

            $this->data["moderation_list_title"] = "Liste des demandes de changement de forfait";

            //On récupère la liste des utilisateurs concernées par ce type de demande.
            $this->data["demmande_changement_forfait"] = $forfait->get_demmandes_chg_forfait();


            //var_dump($this->data["demmande_changement_forfait"]);


            //On affichea
            $this->_layout("mod_list_forfait");
        }

        private function _layout($layout)
        {
            $toto="12";
            $this->layout->view("_header");
            $this->layout->view("_menu", $this->data);
            $this->layout->view($layout, $this->data);
            $this->layout->view("_footer");

        }

    }


