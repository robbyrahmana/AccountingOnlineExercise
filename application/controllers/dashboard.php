<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{
	protected $access = array('Admin', 'Dosen', 'Mahasiswa');
	protected $header = "Dashboard";

	public function index()
	{
		$this->render_page('dashboard/dashboard');
	}
	
}
