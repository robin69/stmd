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

    public function index(){
        $email = $this->input->post("email");
        if($email !=""){
            if(!$this->send_contact_mail()){
                $this->data["send_mail_status"] =   "Il y a eu une erreur lors de l'envois de votre message. Veuillez recommencer plus tard ou non contacter par téléphone. Merci.";
            }else{
                $this->data["send_mail_status"] =   "Cotre message a été envoyé nous prendrons contact avec vous dans les meilleurs délais.";
            }
            $this->_layout("contact");
        }else{
            $this->_layout("contact");
        }

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


    function rpHash($value) {
        $hash = 5381;
        $value = strtoupper($value);
        for($i = 0; $i < strlen($value); $i++) {
            $hash = (($hash << 5) + $hash) + ord(substr($value, $i));
        }
        return $hash;
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
} 