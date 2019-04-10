<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends MY_Controller 
{
	protected $access = array('Admin');
	protected $header = "Soal";
	protected $base_url = "soal";

	public function __construct() {
        parent:: __construct();

        $this->load->model('soal_model', 'soal');
        $this->load->model('kelola_soal_model', 'kelola_soal');
        $this->load->model('soal_jawaban_model', 'soal_jawaban');
        $this->load->model('kelola_soal_soal_model', 'kelola_soal_soal');

    }

	public function list_soal($id)
	{
        $data["results"] = $this->soal->fetch_data($id);

        $data["kelola_soal"] = $this->kelola_soal->get_join($id);
        $data["id"] = $id;
        $this->render_page($this->base_url.'/list', $data);
	}

	public function add()
	{	
		$this->form_validation->set_rules('tipe_soal', 'Tipe Soal', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$data['kelola_soal_id'] = $this->input->post('kelola_soal_id');

			if ($this->input->post('tipe_soal') == 1) {
				$this->render_page($this->base_url.'/pilihan_ganda', $data);
			} else {
				$this->render_page($this->base_url.'/essai', $data);
			}
			
		}

		$this->list_soal($this->input->post('kelola_soal_id'));
	}

	public function pilihan_ganda()
	{
		$this->form_validation->set_rules('soal', 'Soal', 'trim|required');
		$this->form_validation->set_rules('jawaban_a', 'Jawaban A', 'trim|required');
		$this->form_validation->set_rules('jawaban_b', 'Jawaban B', 'trim|required');
		$this->form_validation->set_rules('jawaban_c', 'Jawaban C', 'trim|required');
		$this->form_validation->set_rules('jawaban_d', 'Jawaban D', 'trim|required');
		$this->form_validation->set_rules('jawaban', 'Jawaban Benar', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$id_pilihan = $this->soal_jawaban->add_pilihan_ganda();

			if ($id_pilihan) {

				$id_soal = $this->soal->add($id_pilihan);
				if ($id_soal) {

					$this->kelola_soal_soal->add($this->input->post('kelola_soal_id'), $id_soal);

					$this->set_session_error(SUCCESS_INSERT, SUCCESS);
					redirect($this->base_url.'/list_soal/'. $this->input->post('kelola_soal_id'));
				} else {
					$this->set_session_error(ERR_INSERT, ERR);
				}
			} else {
				$this->set_session_error(ERR_INSERT, ERR);
			}
			
		}

		$data['kelola_soal_id'] = $this->input->post('kelola_soal_id');
		$this->render_page($this->base_url.'/pilihan_ganda', $data);
	}

	public function essai()
	{
		$this->form_validation->set_rules('soal', 'Soal', 'trim|required');
		$this->form_validation->set_rules('jawaban', 'Jawaban Benar', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$id_pilihan = $this->soal_jawaban->add_essai();

			if ($id_pilihan) {

				$id_soal = $this->soal->add($id_pilihan);
				if ($id_soal) {

					$this->kelola_soal_soal->add($this->input->post('kelola_soal_id'), $id_soal);

					$this->set_session_error(SUCCESS_INSERT, SUCCESS);
					redirect($this->base_url.'/list_soal/'. $this->input->post('kelola_soal_id'));
				} else {
					$this->set_session_error(ERR_INSERT, ERR);
				}
			} else {
				$this->set_session_error(ERR_INSERT, ERR);
			}
			
		}

		$data['kelola_soal_id'] = $this->input->post('kelola_soal_id');
		$this->render_page($this->base_url.'/essai', $data);
	}

	public function update($id, $id_kelola)
	{	
		$this->form_validation->set_rules('kategori_ujian', 'Kategori ujian', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$status = $this->soal->update();

			if ($status) {
				$this->set_session_error(SUCCESS_UPDATE, SUCCESS);
				redirect($this->base_url);
			} else {
				$this->set_session_error(ERR_UPDATE, ERR);
			}
		}

		$data["results"] = $this->soal->get('id='.$id);

		$data['kelola_soal_id'] = $id_kelola;
		
		$this->render_page($this->base_url.'/update', $data);
	}

	public function delete($id, $id_kelola)
	{	
		$status = $this->kelola_soal_soal->delete($id);

		if (!$status) {
			$this->set_session_error(ERR_DELETE, ERR);
		} else {
			$this->set_session_error(SUCCESS_DELETE, SUCCESS);
		}

		redirect($this->base_url.'/list_soal/'.$id_kelola);
	}
	
}
