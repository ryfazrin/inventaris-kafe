<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
		// load welcome model
		$this->load->model('welcome_model');
		// load login model
		$this->load->model('login_model');
	}

	public function index()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['users'] = $this->welcome_model->user_rows();
		$data['barangs'] = $this->welcome_model->barang_rows();
		$data['supliers'] = $this->welcome_model->suplier_rows();

		$data['jatuh_tempo'] = $this->welcome_model->jatuh_tempo_pinjam($uname);
		$data['stoks'] = $this->welcome_model->getDataStok();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}
}
