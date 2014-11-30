<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



/**
*	Class qui permet l'utilisation de thème de CI
*	
*
*
**/
class Layout
{
	private $theme;

    function __construct()
    {
        $CI =& get_instance();
        $this->theme = $CI->config->item("theme");
    }
	
	function set_theme($theme)
	{
		$this->theme = $theme;
		
	}
	
	function view($name, $data = array(), $as_data = FALSE)
	{
        $CI =& get_instance();
		$params["content_for_layout"] = $CI->load->view($this->theme . "/content/" . $name, $data, true);
		if(!$as_data)
		{
			$CI->load->view($this->theme . "/template", $params);	
		}
		else
		{
			$CI->load->view($this->theme . "/template", $params, TRUE);		
		}
		
	}
}