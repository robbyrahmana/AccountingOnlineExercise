<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('get_session'))
{
	function get_session_action() {
		if (in_array($_SESSION['role'] , array('Admin'))) {
			return true;
		}
		return 	false;
	}
}