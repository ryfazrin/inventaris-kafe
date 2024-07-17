<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
		$this->load->model('user_model');
		$this->load->model('login_model');
	}

	public function index()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		
		$data['users'] = $this->user_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('user/userList', $data);
		$this->load->view('footer');
	}

	public function tambahUser()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('user/userForm');
		$this->load->view('footer');
	}

	public function simpanUser()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);

		if ($this->user_model->simpanUser()) {
			$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Input Data User Sukses</strong></p></div>';
			$this->load->view('user/userForm', $data);
		}else{
			$data['error']  = '
					<div class="alert alert-danger"><p><strong>Input User Data Gagal!</strong></p></div>';
			$this->load->view('user/userForm', $data);
		}

			$this->load->view('footer');
	}

	public function ubah($id)
	{
		$data['userId'] = $this->user_model->getUserUpdate($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('user/userForm', $data);
		$this->load->view('footer');
	}

	public function update($id)
	{
		$this->user_model->update($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$data['userId'] = $this->user_model->getUserUpdate($id);
		$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Update id user '.$id.' Berhasil</strong></p></div>';
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('user/userForm', $data);
		$this->load->view('footer');
	}

	public function hapus($id)
	{
		$this->user_model->delete($id);
		redirect(site_url('user'));
	}
}
