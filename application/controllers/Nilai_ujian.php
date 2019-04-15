<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_ujian extends MY_Controller 
{
	protected $access = array('Dosen');
	protected $header = "Nilai Ujian";
	protected $base_url = "nilai_ujian";

	public function __construct() {
        parent:: __construct();

        $this->load->model('kelola_soal_model', 'kelola_soal');
        $this->load->model('kelola_soal_mahasiswa_model', 'kelola_soal_mahasiswa');

    }

	public function index()
	{
		$config = $this->get_page_config($this->base_url.'/index', $this->kelola_soal->record_count());

        $data["results"] = $this->kelola_soal->fetch_data_dosen($config["per_page"], $this->get_page(), $this->session->userdata('userdata')['id']);

        $data["links"] = $this->pagination->create_links();	

        $this->render_page($this->base_url.'/list', $data);
	}

	public function list_mahasiswa($id_kelola_soal)
	{
		$data["results"] = $this->kelola_soal_mahasiswa->get_siswa_by_kelola_soal_id($id_kelola_soal);
        $this->render_page($this->base_url.'/list_mahasiswa', $data);
	}

}
