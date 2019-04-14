<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{	

	protected $header = "Dashboard";
	protected $base_url = "login";

	public function __construct() {
        parent:: __construct();

        $this->load->model('dosen_model', 'dosen');
        $this->load->model('login_model', 'login');
        $this->load->model('mahasiswa_model', 'mahasiswa');

    }

	public function logged_in_check() 
	{
		if ($this->session->userdata('logged_in')) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		// if user trying to access login page after login
		// redirect back to main page of user based on role
		$this->logged_in_check();

		//clear error session	
		$this->session->set_flashdata('error', '');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('login_model', 'login');
			
			//check username & password of user
			$status = $this->login->validate();

			if ($status == ERR_INVALID_LOGIN) {
				$this->session->set_flashdata('error', 'Invalid username or password');
			} else {				
				$this->session->set_userdata( $this->login->get_data() );
				$this->session->set_userdata( 'logged_in', true );
				$this->access = '@';

				redirect('dashboard');
			}
		} 

		$this->load->view('login');
	}

	public function register() 
	{	
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'trim|required');
		$this->form_validation->set_rules('jumlah_sks', 'SKS Lulus', 'trim|required');
		$this->form_validation->set_rules('ipk', 'IPK', 'trim|required');
		$this->form_validation->set_rules('dosen_id', 'Pembimbing Akademik', 'trim|required');
		$this->form_validation->set_rules('bukti_pembayaran', 'No. Bukti Pembayaran', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			if (!$this->login->get('username = "'. $this->input->post('username') .'" or password = "'.sha1($this->input->post('password')) .'"')) {
				$id_user = $this->login->add();

				if ($id_user) {
					
					$status = $this->mahasiswa->add($id_user);

					if ($status) {
						$this->set_session_error(SUCCESS_INSERT, SUCCESS);
						redirect($this->base_url);
					} else {
						$this->set_session_error(ERR_INSERT, ERR);
					}
				} else {
					$this->set_session_error(ERR_INSERT, ERR);
				}
			} else {
				$this->set_session_error(ERR_INSERT. ' (Duplicate username or password)', ERR);
			}
			
		}

		$data["dosen"] = $this->dosen->get();

		$this->load->view('register', $data);
	}

	public function logout() 
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		$this->access = '*';

		redirect('login');
	}
}
