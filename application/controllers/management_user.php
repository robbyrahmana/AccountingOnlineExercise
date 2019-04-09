<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_user extends MY_Controller 
{
	protected $access = array('Admin');
	protected $header = "Management User";
	protected $base_url = "management_user";

	public function __construct() {
        parent:: __construct();

        $this->load->model('management_user_model', 'management_user');

    }

	public function index()
	{
		$config = $this->get_page_config($this->base_url.'/index', $this->management_user->record_count());

        $data["results"] = $this->management_user->fetch_data($config["per_page"], $this->get_page());

        $data["links"] = $this->pagination->create_links();	

        $this->render_page($this->base_url.'/list', $data);
	}

	public function add()
	{	
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Dosen', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$status = $this->management_user->add();

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
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Dosen', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$status = $this->management_user->update();

			if ($status) {
				$this->set_session_error(SUCCESS_UPDATE, SUCCESS);
				redirect($this->base_url);
			} else {
				$this->set_session_error(ERR_UPDATE, ERR);
			}
		}

		$data["results"] = $this->management_user->get('id='.$id);
		$this->render_page($this->base_url.'/update', $data);
	}

	public function delete($id)
	{	
		$status = $this->management_user->delete($id);

		if (!$status) {
			$this->set_session_error(ERR_DELETE, ERR);
		} else {
			$this->set_session_error(SUCCESS_DELETE, SUCCESS);
		}

		redirect($this->base_url);
	}
	
}
