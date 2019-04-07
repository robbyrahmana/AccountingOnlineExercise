<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_user extends MY_Controller 
{
	protected $access = array('Admin');
	protected $header = "Management User";
	protected $base_url = "management_user";

	public function index()
	{
		$this->render_page($this->base_url.'/list');
	}
	
}
