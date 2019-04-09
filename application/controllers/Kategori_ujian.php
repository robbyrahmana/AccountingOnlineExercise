<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_ujian extends MY_Controller 
{
	protected $access = array('Admin', 'Dosen');
	protected $header = "Kategori Ujian";
	protected $base_url = "kategori_ujian";

	public function __construct() {
        parent:: __construct();

        $this->load->model('kategori_ujian_model', 'kategori_ujian');

    }

	public function index()
	{
		$config = $this->get_page_config($this->base_url.'/index', $this->kategori_ujian->record_count());

        $data["results"] = $this->kategori_ujian->fetch_data($config["per_page"], $this->get_page());

        $data["links"] = $this->pagination->create_links();	

        $this->render_page($this->base_url.'/list', $data);
	}

	public function add()
	{	
		$this->form_validation->set_rules('kategori_ujian', 'Kategori ujian', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$status = $this->kategori_ujian->add();

			if ($status) {
				$this->set_session_error(SUCCESS_INSERT, SUCCESS);
				redirect($this->base_url);
			} else {
				$this->set_session_error(ERR_INSERT, ERR);
			}
		}

		$this->render_page($this->base_url.'/add');
	}

	public function update($id)
	{	
		$this->form_validation->set_rules('kategori_ujian', 'Kategori ujian', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$status = $this->kategori_ujian->update();

			if ($status) {
				$this->set_session_error(SUCCESS_UPDATE, SUCCESS);
				redirect($this->base_url);
			} else {
				$this->set_session_error(ERR_UPDATE, ERR);
			}
		}

		$data["results"] = $this->kategori_ujian->get('id='.$id);
		$this->render_page($this->base_url.'/update', $data);
	}

	public function delete($id)
	{	
		$status = $this->kategori_ujian->delete($id);

		if (!$status) {
			$this->set_session_error(ERR_DELETE, ERR);
		} else {
			$this->set_session_error(SUCCESS_DELETE, SUCCESS);
		}

		redirect($this->base_url);
	}
	
}
