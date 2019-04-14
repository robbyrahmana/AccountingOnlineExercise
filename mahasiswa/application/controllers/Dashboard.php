<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{
	protected $access = array('Admin', 'Dosen', 'Mahasiswa');
	protected $header = "Ujian";

	public function __construct() {
        parent:: __construct();

        $this->load->model('kelola_soal_model', 'kelola_soal');
        $this->load->model('mahasiswa_model', 'mahasiswa');
    }

	public function index()
	{	
		if ($this->session->userdata('role') == 'Mahasiswa') {
			$this->mahasiswa->get_for_session('user_id = '.$this->session->userdata('id'));
		}

        $config = $this->get_page_config($this->base_url.'/index', $this->kelola_soal->record_count());

        $data["results"] = $this->kelola_soal->fetch_data($config["per_page"], $this->get_page());

        $data["links"] = $this->pagination->create_links();	

		$this->render_page('dashboard/dashboard', $data);
	}
	
}
