<?php
    /**
     * Created by PhpStorm.
     * User: Rumeau
     * Date: 30/11/14
     * Time: 10:54
     */

    class Contact extends CI_Controller{


        public $data = array();


        public function __construct(){
            parent::__construct();
        }

        public function index()
        {


            //chargement du captcha
            $this->load->helper("captcha");
            //Génération du captcha
            $vals = array('img_path' => IMG_PATH , 'font_path' => './assets/css/fonts/Lato-Bold.ttf' , 'img_url' => base_url("assets/img/captcha") . "/");

            $this->data["captcha"] = create_captcha($vals);
	        if(!isset($this->data["captcha"]['time'] ) OR empty($this->data["captcha"]['time']))
	        {
		        $this->data["captcha"]['time'] = time();
		        $this->data["captcha"]['word'] = "robin";
	        }

            $data = array('captcha_time' => $this->data["captcha"]['time'] , 'ip_address' => $this->input->ip_address() , 'word' => $this->data["captcha"]['word']);

            $query = $this->db->insert_string('captcha' , $data);
            $this->db->query($query);

            //Si il y a eu un post
            if(!empty($_POST))
            {
                //Controle du captcha
                $expiration = time() - 3600; // Two hour limit
                $this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);

                // Then see if a captcha exists:
                $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
                $binds = array($_POST['captcha'] , $this->input->ip_address() , $expiration);
                $query = $this->db->query($sql , $binds);
                $row = $query->row();

                if($row->count == 0){
                    $captcha_answer = FALSE;
                } else{
                    $captcha_answer = TRUE;
                    $email = $this->input->post("email");
                }

                if($email != "" && $captcha_answer){
                    if(!$this->send_contact_mail()){
                        $this->data["send_mail_status"] = "Il y a eu une erreur lors de l'envois de votre message. Veuillez recommencer plus tard ou non contacter par téléphone. Merci.";
                    } else{
                        $this->data["send_mail_status"] = "Votre message a été envoyé nous prendrons contact avec vous dans les meilleurs délais.";
                    }

                }elseif(!$captcha_answer){
                    $this->data["send_mail_status"] = "Le code de vérification saisie (captcha) n'est pas correcte ou n'est plus valable. Merci de le saisir de nouveau.";
                }
            }



            //Dans tous les cas on revient sur le formulaire
            $this->_layout("contact");
        }

        public function send_contact_mail()
        {


            $this->email->clear();

            $this->email->from($this->input->post("email"), $this->input->post("prenom") . " ". $this->input->post("nom"));
            $this->email->to($this->config->item("app_mail_address"));
            $this->email->subject($this->config->item("app_mail_subject_prefx") . $this->input->post("sujet"));
            $this->email->message($this->input->post("msg"));

            return $this->email->send();

        }


        private function _layout($layout)
        {
            $this->data["body_id"]	=	"";//home
            $this->data["domaine"]  =   "";
            $this->data["no_google_map"]  =   "";

            /* 		$this->data["view_has_slider"] = TRUE; */
            $this->layout->view("_html_head", 	$this->data);
            $this->layout->view("_menu", 	$this->data);
            $this->layout->view("_breadcrumb", $this->data);
            $this->layout->view($layout, 	$this->data);
            $this->layout->view("_html_foot", 	$this->data);

        }


        function rpHash($value) {
            $hash = 5381;
            $value = strtoupper($value);
            for($i = 0; $i < strlen($value); $i++) {
                $hash = (($hash << 5) + $hash) + ord(substr($value, $i));
            }
            return $hash;
        }




        function sendToAFriend()
        {

        }
    }