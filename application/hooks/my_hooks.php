<?php

/**************************************
*
*
*	Prépare un certain nombre de variable 
*	au moment du démarrage de l'application
*
*
*
*
**********/
class My_Hooks
{
	
	public function __construct()
	{
		
	}
	
	/******************************************
	*
	*	Lance le profiler dès qu'on est en 
	*	environnement de développement
	*
	******************************************/
	public function profiler_auto($environment)
	{

		if($environment == "dev")
		{
			$CI =& get_instance();
			$CI->output->enable_profiler(TRUE);
		}
	}


    /*****************************
     * HOOK qui assure le chargement du
     * thème dans tous les controllers.
     *
     * Le thème utilisé est dans /config/specific_config.php > $config["theme"];
     */
    public function load_theme()
    {
        $CI =& get_instance();
        $theme = $CI->config->item("theme");
        $CI->layout->set_theme($theme);

    }
}