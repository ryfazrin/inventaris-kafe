<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
		// load barang model
		$this->load->model('welcome_model');
		// load suplier model
		$this->load->model('suplier_model');
		// load barang_masuk model
		$this->load->model('barang_masuk_model');
		// load barang_masuk model
		$this->load->model('barang_keluar_model');
		// load barang_masuk model
		$this->load->model('pinjam_barang_model');
		// load login model
		$this->load->model('login_model');
	}

	public function index()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('laporan/laporan');
		$this->load->view('footer');
	}

	public function barang()
	{
		$data['barang'] = $this->welcome_model->getDataStok();
		$this->load->view('laporan/template_laporan', $data);
	}

	public function suplier()
	{
		$data['suplier'] = $this->suplier_model->getData();
		$this->load->view('laporan/template_laporan', $data);
	}

	public function barang_masuk()
	{
		$data['barang_masuk'] = $this->barang_masuk_model->getData();
		$this->load->view('laporan/template_laporan', $data);
	}

	public function barang_keluar()
	{
		$data['barang_keluar'] = $this->barang_keluar_model->getData();
		$this->load->view('laporan/template_laporan', $data);
	}

	public function pinjam_barang()
	{
		$data['pinjam_barang'] = $this->pinjam_barang_model->getData();
		$this->load->view('laporan/template_laporan', $data);
	}
}
