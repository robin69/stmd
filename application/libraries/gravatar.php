<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*****************************************************************
*
*
*	Class Gravatar
*
*	v1.0
*	Créé par Robin Rumeau - robin.rumeau@gmail.com
*
*	Object : Get a gravatar profil to use it simply in a Website.
*	HOW TO USE :
*		Library load in the controller :
*			$string = "";
*			$this->load->library("gravatar",$string);
*		Call in a view :
*			$profile = new Gravatar("toto@tata.com");
*			echo $profile->displayName;
*
*
******************************************************************/
class Gravatar {

	
	
	public $email = "";
	public $profile = array();
	public $ci_use = TRUE;
	
	
	public function __construct($string="")
	{
		if($this->ci_use)
		{//On instancie la super variable CodeIgniter pour pouvoir utiliser les fonctionnalités de CI dans la library
			$CI =& get_instance();
		}
		
		if($string!="")
		{
			$this->email = $string;
			$this->get();		
		}
		
		
	}


	/**
	 * Get either a Gravatar URL or complete image tag for a specified email address.
	 *
	 * @param string $email The email address
	 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
	 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
	 * @param boole $img True to return a complete IMG tag False for just the URL
	 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
	 * @return String containing either just a URL or a complete image tag
	 * @source http://gravatar.com/site/implement/images/php/
	 */
	public function get_gravatar( $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
	    $url = 'http://www.gravatar.com/avatar/';
	    $url .= md5( strtolower( trim( $this->email ) ) );
	    $url .= "?s=$s&d=$d&r=$r";
	    if ( $img ) {
	        $url = '<img src="' . $url . '"';
	        foreach ( $atts as $key => $val )
	            $url .= ' ' . $key . '="' . $val . '"';
	        $url .= ' />';
	    }
	    return $url;
	}
	
	public function get()
	{
		$email = md5( strtolower( trim( $this->email ) ) );
		$str = @file_get_contents( 'https://www.gravatar.com/'.$email.'.php' );
		if($str)
		{

			$profile = unserialize( $str );
			$this->profile = $profile["entry"][0];
		}else{
			$this->profile = FALSE;
		}
	}
}