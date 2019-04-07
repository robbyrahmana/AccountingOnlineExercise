<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_soal extends MY_Controller 
{
	protected $access = array('Admin');
	protected $header = "Kelola Soal";
	protected $base_url = "kelola_soal";

	public function index()
	{
		$this->render_page($this->base_url.'/list');
	}
	
}
