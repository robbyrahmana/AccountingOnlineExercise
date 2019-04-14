<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{

	/**
	* '*' all user
	* '@' logged in user
	* 'Admin' for admin role
	* 'Dosen' for dosen role
	* 'Mahasiswa' for mahasiswa role
	* @var string
	*/
	protected $access = "*";

	protected $header = "*";

	protected $base_url = "*";

	public function __construct() 
	{
		parent::__construct();

		//enable profiler to display benchmark results, queries you have run, and $_POST
		$this->output->enable_profiler(TRUE);

		$this->login_check();
	}

	public function login_check()
	{
		if ($this->access != "*") {
			// if user try to access logged in page
			// check does she/he has logged in
			// if not, redirect to login page
			if (! $this->session->userdata('logged_in')) {
				redirect('login');
			}

			// here we check the role of the user
			if (! $this->permission_check()) {
				redirect('errors/error_401');
			}

			if (in_array($this->session->userdata('role'), array('Admin', 'Dosen'))) {
				redirect('../');
			}
		}
	}

	public function permission_check() 
	{
		if ($this->access == '@') {
			return false;
		} else {
			$access = is_array($this->access) ? $this->access : explode(',', $this->access);

			if (in_array($this->uri->segment(2), array('add', 'update', 'delete')) && !get_session_action()) {
				return false;
			} else if (in_array($this->session->userdata('role'), array_map('trim', $access))) {
				return true;
			}

			return false;
		}
	}

	public function render_page($content, $data = null)
	{
		$data['title'] = $this->header;
		$data['base_url'] = $this->base_url;
		
		// set header, sidebar, content and footer and send to views/template/index.php
		$data['header']		= $this->load->view('template/header', $data, TRUE);
		$data['sidebar']	= $this->load->view('template/sidebar', $data, TRUE);
		$data['content']	= $this->load->view($content, $data, TRUE);
		$data['footer']		= $this->load->view('template/footer', $data, TRUE);

		$this->load->view('template/index', $data);
	}

	public function get_page_config($url ='' , $total_rows = '', $per_page = '5', $uri_segment = '3')
	{
		$config = array();
        $config["base_url"] = base_url($url);
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $per_page;
        $config["uri_segment"] = $uri_segment;
        $choice = $config["total_rows"] / $config["per_page"];
    	$config["num_links"] = round($choice);

    	// design
    	$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
    	$config['full_tag_close'] = '</ul>';

    	$config['prev_link'] = '«';
    	$config['prev_tag_open'] = '<li>';
    	$config['prev_tag_close'] = '</li>';

    	$config['next_link'] = '»';
    	$config['next_tag_open'] = '<li>';
    	$config['next_tag_close'] = '</li>';

    	$config['cur_tag_open'] = '<li class="active"><a>';
    	$config['cur_tag_close'] = '</a></li>';

    	$config['num_tag_open'] = '<li>';
    	$config['num_tag_close'] = '</li>';

    	$this->pagination->initialize($config);

    	return $config;
	}

	public function get_page($uri_segment = '3') {
		return ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
	}

	public function get_session_action() {
		if (in_array($this->session->userdata('role') , array('Admin'))) {
			return true;
		}
		return 	false;
	}

	public function set_session_error($error, $error_code) {
		$this->session->set_flashdata('error', $error);
		$this->session->set_flashdata('error_code', $error_code);
	}
	
}
