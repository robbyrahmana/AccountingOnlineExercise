<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_ujian extends MY_Controller 
{
	protected $access = array('Dosen');
	protected $header = "Nilai Ujian";
	protected $base_url = "nilai_ujian";

	public function index()
	{
		$this->render_page($this->base_url.'/list');
	}
	
}
