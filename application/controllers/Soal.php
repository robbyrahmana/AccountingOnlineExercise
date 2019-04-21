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
        $data["count_essai"] = $this->soal->count_essai($id);
        $data["count_pilihan_ganda"] = $this->soal->count_pilihan_ganda($id);
 
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
		$this->form_validation->set_rules('jawaban_e', 'Jawaban E', 'trim|required');
		$this->form_validation->set_rules('jawaban', 'Jawaban Benar', 'trim|required');
		$this->form_validation->set_rules('bobot_nilai', 'Bobot Nilai', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$id_pilihan = $this->soal_jawaban->add_pilihan_ganda(
				$this->input->post('jawaban_a'),
				$this->input->post('jawaban_b'),
				$this->input->post('jawaban_c'),
				$this->input->post('jawaban_d'),
				$this->input->post('jawaban_e')
			);

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
		$this->form_validation->set_rules('bobot_nilai', 'Bobot Nilai', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$id_pilihan = $this->soal_jawaban->add_essai($this->input->post('jawaban'));

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

	public function update($kelola_soal_soal_id, $soal_id, $kelola_soal_id)
	{	
		$data["results"] = $this->soal->get_soal($soal_id);

		$data['kelola_soal_id'] = $kelola_soal_id;

		$type = 0;
		foreach($data["results"] as $d) {
			$type = $d->tipe_soal;
		}

		if ($type) {
			$this->render_page($this->base_url.'/pilihan_ganda_update', $data);
		} else {
			$this->render_page($this->base_url.'/essai_update', $data);
		}
	}

	public function pilihan_ganda_update()
	{
		$this->form_validation->set_rules('soal', 'Soal', 'trim|required');
		$this->form_validation->set_rules('jawaban_a', 'Jawaban A', 'trim|required');
		$this->form_validation->set_rules('jawaban_b', 'Jawaban B', 'trim|required');
		$this->form_validation->set_rules('jawaban_c', 'Jawaban C', 'trim|required');
		$this->form_validation->set_rules('jawaban_d', 'Jawaban D', 'trim|required');
		$this->form_validation->set_rules('jawaban_e', 'Jawaban E', 'trim|required');
		$this->form_validation->set_rules('jawaban', 'Jawaban Benar', 'trim|required');
		$this->form_validation->set_rules('bobot_nilai', 'Bobot Nilai', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$this->soal_jawaban->update_pilihan_ganda();
			$status = $this->soal->update();

			if ($status) {
				$this->set_session_error(SUCCESS_UPDATE, SUCCESS);
				redirect($this->base_url.'/list_soal/'. $this->input->post('kelola_soal_id'));
			} else {
				$this->set_session_error(ERR_UPDATE, ERR);
			}
			
		}

		$data['kelola_soal_id'] = $this->input->post('kelola_soal_id');
		$this->render_page($this->base_url.'/pilihan_ganda', $data);
	}

	public function essai_update()
	{
		$this->form_validation->set_rules('soal', 'Soal', 'trim|required');
		$this->form_validation->set_rules('jawaban', 'Jawaban Benar', 'trim|required');
		$this->form_validation->set_rules('bobot_nilai', 'Bobot Nilai', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$this->soal_jawaban->update_essai();

			$status = $this->soal->update();

			if ($status) {
				$this->set_session_error(SUCCESS_UPDATE, SUCCESS);
				redirect($this->base_url.'/list_soal/'. $this->input->post('kelola_soal_id'));
			} else {
				$this->set_session_error(ERR_UPDATE, ERR);
			}
			
		}

		$data['kelola_soal_id'] = $this->input->post('kelola_soal_id');
		$this->render_page($this->base_url.'/essai', $data);
	}

	public function delete($kelola_soal_soal_id, $soal_id, $kelola_soal_id)
	{	
		$this->kelola_soal_soal->delete($kelola_soal_soal_id);

		$soal = $this->soal->get('id = '.$soal_id);
		$jawaban_id = 0;
		foreach($soal as $data) {
			$jawaban_id = $data->id;
		}
		$this->soal_jawaban->delete($jawaban_id);

		$status = $this->soal->delete($soal_id);


		if (!$status) {
			$this->set_session_error(ERR_DELETE, ERR);
		} else {
			$this->set_session_error(SUCCESS_DELETE, SUCCESS);
		}

		redirect($this->base_url.'/list_soal/'.$kelola_soal_id);
	}

	public function upload($kelola_soal_id = '')
	{
		$data['kelola_soal_id'] = $kelola_soal_id;
		$this->render_page($this->base_url.'/upload', $data);
	}

	public function uploadFile()
	{	
		$this->load->helper('file');
		$config = array(
			'upload_path' => "./assets/",
			'allowed_types' => "docx",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload('file')) {
			$uploadData = $this->upload->data();
			$uploadedFile = $uploadData['file_name'];

			$content = $this->read_file_docx($uploadedFile);
			if($content !== false) {
				$this->handle_insert_database($content, $this->input->post('kelola_soal_id'));
				$this->set_session_error("Berhasil diupload " . $uploadedFile, SUCCESS);
				redirect($this->base_url.'/list_soal/'. $this->input->post('kelola_soal_id'));
			} else {
				$this->set_session_error("Bermasalah dalam menginputkan ke database" . $uploadedFile, ERR);
			}
		} else {
			$this->set_session_error("Tipe data tidak diizinkan atau melibihi maksimum size (2MB)", ERR);
		}

		$data['kelola_soal_id'] =  $this->input->post('kelola_soal_id');
		$this->render_page($this->base_url.'/upload', $data);
	}

	public function read_doc()
	{
		$this->render_page($this->base_url.'/read_doc');
	}

	function handle_insert_database($content, $kelola_soal_id) {
		$soal = explode("[soal]", $content);
		array_shift($soal);
		foreach ($soal as $data) {
			$soal_val = '';
			$tipe_soal = 0;
			$jawaban_a = '';
			$jawaban_b = '';
			$jawaban_c = '';
			$jawaban_d = '';
			$jawaban_e = '';
			$jawaban_val = '';
			$bobot_val = '';

			$bobot = explode("[bobot]", $data);
			$bobot_val = $bobot[1];

			$jawaban = explode("[jawaban]", $bobot[0]);
			$jawaban_val = $jawaban[1];

			if (strpos($jawaban[0], '[==]') !== false) {
				$pilihan = explode("[==]", $jawaban[0]);

				$soal_val = $pilihan[0];
				$jawaban_a = $pilihan[1];
				$jawaban_b = $pilihan[2];
				$jawaban_c = $pilihan[3];
				$jawaban_d = $pilihan[4];
				$jawaban_e = $pilihan[5];
				$tipe_soal = 1;
			} else {
				$soal_val = $jawaban[0];
				$tipe_soal = 0;
			}

			//insert pilihan ganda $id, $soal, $jawaban, $tipe_soal, $bobot_nilai
			if ($tipe_soal == 1) {
				$id_pilihan = $this->soal_jawaban->add_pilihan_ganda(
					$jawaban_a,
					$jawaban_b,
					$jawaban_c,
					$jawaban_d,
					$jawaban_e
				);

				if ($id_pilihan) {

					$id_soal = $this->soal->add_upload($id_pilihan, $soal_val, $jawaban_val, $tipe_soal, $bobot_val);
					if ($id_soal) {

						$this->kelola_soal_soal->add($kelola_soal_id, $id_soal);
					} 
				}
			} 
			//insert esai
			else {
				$id_pilihan = $this->soal_jawaban->add_essai($jawaban_val);

				if ($id_pilihan) {

					$id_soal = $this->soal->add_upload($id_pilihan, $soal_val, $jawaban_val, $tipe_soal, $bobot_val);
					if ($id_soal) {

						$this->kelola_soal_soal->add($kelola_soal_id, $id_soal);
					} 
				}
			}
		}
	}

	public function read_file_docx($filename){
		$filename = 'assets/' . $filename;

		$striped_content = '';
		$content = '';

		if(!$filename || !file_exists($filename)) {
			echo "fail read file<br/>"; 
			return false;
		}

		$zip = zip_open($filename);

		if (!$zip || is_numeric($zip)) {
			echo "fail open<br/>"; 
			return false;
		}

		while ($zip_entry = zip_read($zip)) {

			if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

			if (zip_entry_name($zip_entry) != "word/document.xml") continue;

			$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

			zip_entry_close($zip_entry);

		}// end while

		zip_close($zip);

		// $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);

		// $content = str_replace('</w:r></w:p>', "\r\n", $content);

		$striped_content = strip_tags($content);

		return $striped_content;
	}
	
}
