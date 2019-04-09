<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends MY_Controller 
{
	protected $base_url = "errors";
	protected $header = "ERROR";

	public function error_401()
	{
		$this->render_page($this->base_url.'/error_401');
	}
	
}
