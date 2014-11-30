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


$hook['post_controller_constructor'][] = array(
                            'class'    => 'my_hooks',
                            'function' => 'profiler_auto',
                            'filename' => 'my_hooks.php',
                            'filepath' => 'hooks',
                            'params'   => ENVIRONMENT
                           );

$hook['post_controller_constructor'][] = array(
                            'class'    => 'my_hooks',
                            'function' => 'load_theme',
                            'filename' => 'my_hooks.php', //hook_importexport.php
                            'filepath' => 'hooks'
                           );
/* End of file hooks.php */
/* Location: ./application/config/hooks.php */