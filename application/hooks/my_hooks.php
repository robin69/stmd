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



}