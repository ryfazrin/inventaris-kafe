<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		if(!$this->session->userdata('username'))
		{
			$this->load->view('loginForm');
		}
		else
		{
			redirect('Welcome');
		}
	}

	public function cekLogin()
	{
		$uname 	= $this->input->post('username');
		$pass 	= $this->input->post('password');
		$data['session'] = $this->session->all_userdata();

		// jika login berhasil
		if ($this->login_model->validasi($uname, $pass)) {
			$data 	= array(
				'username' => $uname,'logged_in' => TRUE);
			$this->session->set_userdata($data);
			redirect(site_url());
		}else{
			$data['keluar']  = '
							<div class="alert alert-danger alert-dismissible show fade"><strong>Username atau Password Salah!</strong><button class="close" data-dismiss="alert"><span>&times;</span></button></div>';
			$this->load->view('LoginForm', $data);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata(array('username' => '', 'password' => '','logged_in'=>false));
		$this->session->sess_destroy();
		$data['keluar']  = '
							<div class="alert alert-info alert-dismissible show fade">Anda telah keluar<button class="close" data-dismiss="alert"><span>&times;</span></button></div>';
		$this->load->view('LoginForm', $data);
	}

	public function lupaPass()
	{
		$this->load->view('lupaPassword');
	}
}
