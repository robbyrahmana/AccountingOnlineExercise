<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_soal extends MY_Controller 
{
	protected $access = array('Admin');
	protected $header = "Kelola Soal";
	protected $base_url = "kelola_soal";

	public function __construct() {
        parent:: __construct();

        $this->load->model('kelola_soal_model', 'kelola_soal');
        $this->load->model('mata_kuliah_model', 'mata_kuliah');

    }

	public function index()
	{
		$config = $this->get_page_config($this->base_url.'/index', $this->kelola_soal->record_count());

        $data["results"] = $this->kelola_soal->fetch_data($config["per_page"], $this->get_page());

        $data["links"] = $this->pagination->create_links();	

        $this->render_page($this->base_url.'/list', $data);
	}

	public function add()
	{	
		$this->form_validation->set_rules('mata_kuliah_id', 'Mata Kuliah', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Ujian', 'trim|required');
		$this->form_validation->set_rules('jumlah_soal', 'Jumlah Soal', 'trim|required');
		$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$status = $this->kelola_soal->add();

			if ($status) {
				$this->set_session_error(SUCCESS_INSERT, SUCCESS);
				redirect($this->base_url);
			} else {
				$this->set_session_error(ERR_INSERT, ERR);
			}
		}

		$data["mata_kuliah"] = $this->mata_kuliah->get_join();

		$this->render_page($this->base_url.'/add', $data);
	}

	public function update($id)
	{	
		$this->form_validation->set_rules('mata_kuliah_id', 'Mata Kuliah', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Ujian', 'trim|required');
		$this->form_validation->set_rules('jumlah_soal', 'Jumlah Soal', 'trim|required');
		$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$status = $this->kelola_soal->update();

			if ($status) {
				$this->set_session_error(SUCCESS_UPDATE, SUCCESS);
				redirect($this->base_url);
			} else {
				$this->set_session_error(ERR_UPDATE, ERR);
			}
		}

		$data["mata_kuliah"] = $this->mata_kuliah->get_join();
		$data["results"] = $this->kelola_soal->get('id='.$id);
		
		$this->render_page($this->base_url.'/update', $data);
	}

	public function delete($id)
	{	
		$status = $this->kelola_soal->delete($id);

		if (!$status) {
			$this->set_session_error(ERR_DELETE, ERR);
		} else {
			$this->set_session_error(SUCCESS_DELETE, SUCCESS);
		}

		redirect($this->base_url);
	}
	
}
