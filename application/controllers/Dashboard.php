<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{
	protected $access = array('Admin', 'Dosen', 'Mahasiswa');
	protected $header = "Dashboard";

	public function __construct() {
        parent:: __construct();

        $this->load->model('kelola_soal_model', 'kelola_soal');
        $this->load->model('management_user_model', 'management_user');
    }

	public function index()
	{	
		if ($this->session->userdata('role') == 'Dosen') {
			$this->session->set_userdata( $this->management_user->get('user_id = '.$this->session->userdata('id')) );
		}

        $data["results"] = $this->kelola_soal->fetch_calendar();

		$this->render_page('dashboard/dashboard', $data);
	}
	
}
