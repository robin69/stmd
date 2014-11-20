<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_functions {


	public function protect()
	{
		$CI =& get_instance();
		if(!$CI->session->userdata("admin"))
		{
			 redirect("admin/login");
		}
	}
}