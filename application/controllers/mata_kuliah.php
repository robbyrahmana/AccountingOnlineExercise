<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_kuliah extends MY_Controller 
{
	protected $access = array('Admin', 'Dosen');
	protected $header = "Mata Kuliah";
	protected $base_url = "mata_kuliah";

	public function index()
	{
		$this->render_page($this->base_url.'/list');
	}

	public function add()
	{
		$this->render_page($this->base_url.'/add');
	}
	
}
