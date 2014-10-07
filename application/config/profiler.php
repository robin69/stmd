<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Profiler Sections
| -------------------------------------------------------------------------
| This file lets you determine whether or not various sections of Profiler
| data are displayed when the Profiler is enabled.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/profiling.html
|
*/
$config['post']         		= TRUE;
$config['controller_info']  	= TRUE;
$config['get']        			= TRUE;
$config['config']          		= TRUE;
$config['queries']         		= TRUE;
$config['benchmarks']         	= FALSE;
$config['http_headers']         = FALSE;
$config['memory_usage']         = FALSE;
$config['query_toggle_count']   = FALSE;

/* End of file profiler.php */
/* Location: ./application/config/profiler.php */