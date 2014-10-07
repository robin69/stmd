<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/


$hook['post_controller_constructor'] = array(
                            'class'    => 'hook_ie',
                            'function' => 'profiler_auto',
                            'filename' => 'hook_importexport.php',
                            'filepath' => 'hooks',
                            'params'   => ENVIRONMENT
                           );
/* End of file hooks.php */
/* Location: ./application/config/hooks.php */