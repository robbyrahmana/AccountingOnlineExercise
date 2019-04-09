<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_kuliah extends MY_Controller 
{
	protected $access = array('Admin', 'Dosen');
	protected $header = "Mata Kuliah";
	protected $base_url = "mata_kuliah";

	public function __construct() {
        parent:: __construct();

        $this->load->model('mata_kuliah_model', 'mata_kuliah');
        $this->load->model('kategori_ujian_model', 'kategori_ujian');
        $this->load->model('management_user_model', 'management_user');

    }

	public function index()
	{
		$config = $this->get_page_config($this->base_url.'/index', $this->mata_kuliah->record_count());

        $data["results"] = $this->mata_kuliah->fetch_data($config["per_page"], $this->get_page());

        $data["links"] = $this->pagination->create_links();	

        $this->render_page($this->base_url.'/list', $data);
	}

	public function add()
	{	
		$this->form_validation->set_rules('mata_kuliah_cd', 'Kode Mata Kuliah', 'trim|required');
		$this->form_validation->set_rules('mata_kuliah', 'Mata Kuliah', 'trim|required');
		$this->form_validation->set_rules('kategori_ujian_id', 'Kategori Ujian', 'trim|required');
		$this->form_validation->set_rules('dosen_id', 'Dosen', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$status = $this->mata_kuliah->add();

			if ($status) {
				$this->set_session_error(SUCCESS_INSERT, SUCCESS);
				redirect($this->base_url);
			} else {
				$this->set_session_error(ERR_INSERT, ERR);
			}
		}

		$data["kategori"] = $this->kategori_ujian->get();
		$data["dosen"] = $this->management_user->get();

		$this->render_page($this->base_url.'/add', $data);
	}

	public function update($id)
	{	
		$this->form_validation->set_rules('mata_kuliah_cd', 'Kode Mata Kuliah', 'trim|required');
		$this->form_validation->set_rules('mata_kuliah', 'Mata Kuliah', 'trim|required');
		$this->form_validation->set_rules('kategori_ujian_id', 'Kategori Ujian', 'trim|required');
		$this->form_validation->set_rules('dosen_id', 'Dosen', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$status = $this->mata_kuliah->update();

			if ($status) {
				$this->set_session_error(SUCCESS_UPDATE, SUCCESS);
				redirect($this->base_url);
			} else {
				$this->set_session_error(ERR_UPDATE, ERR);
			}
		}

		$data["kategori"] = $this->kategori_ujian->get();
		$data["dosen"] = $this->management_user->get();
		
		$data["results"] = $this->mata_kuliah->get('id='.$id);
		$this->render_page($this->base_url.'/update', $data);
	}

	public function delete($id)
	{	
		$status = $this->mata_kuliah->delete($id);

		if (!$status) {
			$this->set_session_error(ERR_DELETE, ERR);
		} else {
			$this->set_session_error(SUCCESS_DELETE, SUCCESS);
		}

		redirect($this->base_url);
	}
	
}
