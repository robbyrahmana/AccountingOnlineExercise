<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{

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

	public function logout() 
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		$this->access = '*';

		redirect('login');
	}
}
