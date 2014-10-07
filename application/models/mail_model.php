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
	
	
	
	
	public function confirmation_adr_mail()
	{
		$this->subject	=	"Confirmation d'adresse mail - importExport.fr";
		$this->message 	= 	"Bonjour, <br />
			<br />
			
			Merci de confirmer votre adresse mail en cliquant sur le lien suivant.<br />
			<a href=''>CONFIRMATION D'ADRESSE</a><br /><br /><br />";
		
		
		$this->shoot();
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