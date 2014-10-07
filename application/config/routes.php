<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
/* http://dev.solutionstmd.com/annuaire/transporteurs_md/cat-agencedemplois */
/* http://dev.solutionstmd.com/annuaire/transporteurs-md/cat-agencedemplois */
/////Règles spécifiques à l'annuare
$route['annuaire/expediteurs_md/cat-(.*)'] 			= 	"annuaire/show_results_cat/expediteurs_md/$1";
$route['annuaire/transporteurs_md/cat-(.*)'] 		= 	"annuaire/show_results_cat/transporteurs_md/$1";
$route['annuaire/transporteurs_md']					=	"annuaire/cat_prestas_tmd";
$route['annuaire/expediteurs_md']					=	"annuaire/cat_prestas_emd";
$route['rechercher-un-conseiller-a-la-securite']	=	"annuaire/search_cas_form";
$route['recherche/(.*)/(.*)']						=	"search_engine/search/$1/$2";
$route['recherche/(.*)']							=	"search_engine/search/$1";

$route['recherche']									=	"search_engine";

$route['default_controller'] 						= "accueil";
$route['404_override'] 								= 'page';





/* End of file routes.php */
/* Location: ./application/config/routes.php */