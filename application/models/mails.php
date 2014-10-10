<?php


class Mails extends CI_Model
{

	public $theme			=	"mail";
	public $from_adresse	=	"test@en-production.netl";
	public $from_name		=	"NE PAS REPONDRE";	
	public $to				=	"";
	public $cc				=	"robin@studio-http.com";
	public $subject			=	"";
	public $message			= 	"";
	public $userpass		=	"";


	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('email');
		

	}
	
	
	
	
	public function account_activation()
	{
		//On prépare les informations du Token
		$token_array	=	array(
			"action"	=>	"account_confirm",
			"email"		=>	$this->to,
			"userpass"	=>	$this->userpass
			);
			
		//On encode le token
		$token = $this->tokenize($token_array);
		
		//On prépare le contenu du mail
		$this->subject	=	"Activation de votre compte - ".$this->config->item("site_name");
		$this->message 	= 	"Bonjour, <br />
			<br />
			
			Vous venez de vous inscrire dans l'annuaire ".$this->config->item("site_name").". Pour finaliser votre inscription et activer votre compte merci de cliquer sur ce lien :<br />
			<a href='".base_url("login")."/token/?token=".$token."'>Je confirme mon adresse email.</a><br /><br /><br />";
		
		
		$this->shoot();
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
		$string = serialize($array);				//On sérialise la chaine au cas où il s'agisse d'un tableau
		$string = $this->encrypt->encode($string);	//On décrypte le token
		$string = urlencode($string);
		return $string;
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
	public function tokenread($string)
	{
		$string = $this->encrypt->decode($string);	//On décode le cryptage
		$array = unserialize($string);				//On désérialize pour récupérer notre tableau
		return $array;
	}
	
	/**
	*
	*	Fonction qui assure l'envois des emails
	*
	*	ATTENTION : si on renseing from, on n'a plus les erreurs au moment de l'envois
	*	mais le mail ne part pas. 
	********/
	private function shoot()
	{
		$this->email->to($this->to);
		$this->email->cc($this->cc);
		$this->email->subject($this->subject);
		
		$msg 	= $this->_header();
		$msg 	.= $this->message;
		$msg 	.= $this->_footer();
		
		$this->email->message($msg);
		
		if(@$this->email->send())
		{
			//echo $this->email->print_debugger();
			return TRUE;
		}else{
			return FALSE;
			echo $this->email->print_debugger();
		}
	}
	
	

	
	private function _header()
	{
		
		$header = '<head>
					</head>
					<body>
						<header>
							'.$this->config->item("site_name").'
						</header>
						<section>';
		return $header;
	}
	
	private function _footer()
	{
		
		$footer = "<br />
				<br />
				<strong>L'équipe ".$this->config->item("site_name")."</strong>
			</section>
			<footer>
				Vous recevez cet email parce que vous êtes inscrits sur notre site ou parce que vous l'avez sollicité.<br/>
				Pour vous désinscrire, en vous rendeant <a href='#'>ici</a><br/>
				".$this->config->item("site_name")." | Annuaire | Contact | mentions légales | crédits
			</footer>
		</body>
		";
		return $footer;
	}
	
	
}