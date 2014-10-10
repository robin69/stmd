<?php


class Mail_model extends CI_Model
{

	public $theme			=	"mail";
	public $from_adresse	=	"system@importexport.local";
	public $from_name		=	"NE PAS REPONDRE";	
	public $to				=	"";
	public $cc				=	"robin@studio-http.com";
	public $subject			=	"";
	public $message			= 	"";


	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('email');
		

	}
	
	
	
	
	public function account_activation()
	{
		//On prépare les informations du Token
		$token_array	=	array(
			"action"	=>	"mail_confirm",
			"email"		=>	$this->to
			);
			
		//On encode le token
		$token = $this->tokenize($token_array);
		
		//On prépare le contenu du mail
		$this->subject	=	"Activation de votre compte - ".$this->config->item("site_name");
		$this->message 	= 	"Bonjour, <br />
			<br />
			
			Vous venez de vous inscrire dans l'annuaire ".$this->config->item("site_name").". Pour finaliser votre inscription et activer votre compte merci de cliquer sur ce lien :<br />
			<a href='".base_url("login")."/token/".$token."'>Je confirme mon adresse email.</a><br /><br /><br />";
		
		
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
		$string = serialize($array);	//On sérialise la chaine au cas où il s'agisse d'un tableau
		$string = $this->encrypt->encode($string);
		return $string;
	}
	
	/************************************
	*
	*	Fonction qui décrypt un token
	*
	*
	*	Réceptionne une chaine, décode la chaine, 
	*	puis désérialize la chaine pour récupérer
	*	un tableau qu'elle peut retourner
	*
	*************************************/
	public function tokenread($string)
	{
		$string = $this->encrypt->decode($string);
		$array = unserialize($string);
		return $array;
	}
	

	private function shoot()
	{
		$this->email->to($this->to);
		$this->email->cc($this->cc);
		$this->email->subject($this->subject);
		
		$msg = $this->_header();
		$msg .= $this->message;
		$msg .= $this->_footer();
		
		$this->email->message($msg);
		
		if($this->email->send())
		{
			echo $this->email->print_debugger();
			return TRUE;
		}else{
			echo $this->email->print_debugger();
		}
	}
	
	

	
	private function _header()
	{
		
		$header = '<head>
					</head>
					<body>
						<header>
							ImportExport.fr
						</header>
						<section>';
		return $header;
	}
	
	private function _footer()
	{
		
		$footer = '<br />
				<br />
				<strong>L\'équipe Import Export</strong>
			</section>
			<footer>
				Vous recevez cet email parce que vous êtes inscrits sur notre site ou parce que vous l\'avez sollicité.<br/>
				Pour vous désinscrire, en vous rendeant <a href="#">ici</a><br/>
				importexport.fr | Annuaire | Contact | mentions légales | crédits
			</footer>
		</body>
		';
		return $footer;
	}
	
	
}