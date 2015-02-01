<?php




/*** EMAIL CONFIGATION **/
$config["protocol"]					= "sendmail";
$config["mailpath"]					= "/usr/sbin/sendmail";
$config["mailtype"]					= "html";
$config['app_mail_address']			= 'team@importexport.fr';
$config['app_mail_from']			= 'Equipe Importexport.fr';
$config['app_mail_subject_prefx']	= '[SolutionsTMD] ';


/**PAGINATION ADMIN**/
$config["elem_per_page"]			= 	'20';

/** FICHES A LA UNE **/
$config["nbr_fiche_alaune"]			=	'6';

/** FICHES **/
$config["nbr_carr_max_excerpt"]		=	'253';

/** SITE NAME **/
$config["site_name"]				=	"SolutionsTMD";

/** THEME IN USED **/
$config["theme"]                    =   "stmd2014";

$config["warning_periode"]          =   30;//30jours


/** ID de l'utilisateur par défaut lorsqu'on crée une nouvelle Fiche **/
$config["default_account_for_new_fiche"] = 1; //Correspond à l'utilisateur Guillaume Lecoz.


/********************
 * Réseaux Sociaux
 ****************/
$config['gplus']    =   "https://plus.google.com/+Gmjphoenix";
$config['twitter']    =   "https://twitter.com/gmjphoenix";
$config['facebook']    =   "https://www.facebook.com/gmjphoenix";
$config['linkedin']    =   "http://fr.linkedin.com/pub/le-coz-guillaume";
$config['viadeo']    =   "http://fr.viadeo.com/fr/company/gmj-phoenix";

