<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller 
{
	protected $access = array('Mahasiswa');
	protected $header = "Test";

	public function __construct() {
        parent:: __construct();

        $this->load->model('test_model', 'test');
        $this->load->model('kelola_soal_model', 'kelola_soal');
    }

	public function soal($id)
	{
		foreach($_SESSION as $key => $value)
	    {
	        if (strpos($key, 'soal-') === 0)
	        {
	          unset($_SESSION[$key]); //add this line
	        }
	    }
	    
	    if (!in_array($id, $this->kelola_soal->get_existing_kelola_mahasiswa())) {
	    	$this->test->get_soal($id);
			$this->test->get_time($id);
			$data['kelola_soal_id'] = $id; 
			$this->load->view('test/soal', $data);
	    } else {
	    	$this->load->view('test/complete');
	    }
		
	}

	public function navigate($seq)
	{	
		$this->session->unset_userdata('soal_display');

		$data['data_soal'] = $this->session->userdata('soal')[$seq];

		if ($data['data_soal']->tipe_soal) {
			$this->load->view('test/pilihan_ganda', $data);
		} else {
			$this->load->view('test/essai', $data);
		}
	}

	public function jawaban() {
		$soal_id = $this->input->post('soal_id');
		$seq_id = $this->input->post('seq_id');
		$jawaban_benar = $this->session->userdata('soal')[$seq_id]->jawaban;

		$data = array(
			'mahasiswa_id' => $this->input->post('mahasiswa_id'),
			'kelola_soal_id' => $this->input->post('kelola_soal_id'),
			'soal_id' => $this->input->post('soal_id'),
			'jawaban' => $this->input->post('jawaban'),
			'tipe_soal' => $this->input->post('tipe_soal'),
			'jawaban_benar' => $jawaban_benar
		);

		if ($soal_id) {
			$this->session->set_userdata('soal-'.$soal_id, $data);
		}
	}

	public function submit($id)
	{	
		$kelola_soal_mahasiswa_id = $this->test->kelola_soal_mahasiswa($id);

		foreach($_SESSION as $key => $value)
	    {
	        if (strpos($key, 'soal-') === 0)
	        {
	          $id_jawaban = $this->test->add($kelola_soal_mahasiswa_id, $this->session->userdata($key));
	          $this->test->update_nilai_kelola_soal_mahasiswa($kelola_soal_mahasiswa_id, $id_jawaban);
	        }
	    }
	    
		$this->load->view('test/complete');
	}
	
}
