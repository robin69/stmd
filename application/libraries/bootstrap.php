<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



/**
*
*	Class Boostrap
*	Développée pour faciliter l'utilisation d'éléemnts graphiques par les controllers.
*	Chaque function s'appelle individuellement dans les controllers $this->bootstrap->ma_fonction()
*
*/

class Bootstrap
{
		var $form_error_delimiter = "";

	public function __construct()
	{
		
	}

	/**
	*	Définit le type d'erreur affiché par Bootstrap
	*	gère l'affichage des messages dans les vues
	*
	*
	*/
	public function set_form_error_delimiter($type)
	{
		$CI =& get_instance();
		switch($type)
		{
			case "danger"	:	$alert_class = "alert-danger";	break;
			case "success"	:	$alert_class = "alert-success";	break;
			case "info"		:	$alert_class = "alert-info";	break;
			case "warning"	:	$alert_class = "alert-warning";	break;
			default	:
				$alert_class = "alert-info"; break;
		}
		
		$CI->form_validation->set_error_delimiters('<div class="alert '.$alert_class.'" role="alert">', '</div>');
	}
	

}