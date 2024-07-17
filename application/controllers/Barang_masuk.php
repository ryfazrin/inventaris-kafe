<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
		// load barang_masuk_model
		$this->load->model('barang_masuk_model');
		// load barang_model
		$this->load->model('barang_model');
		// load suplier_model
		$this->load->model('suplier_model');
		// load login_model
		$this->load->model('login_model');
	}

	public function index()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['barang_masuk'] = $this->barang_masuk_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang_masuk/barang_masukList', $data);
		$this->load->view('footer');
	}

	public function detail($id)
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['barang_masuk'] = $this->barang_masuk_model->getDataById($id);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang_masuk/barang_masukDetail', $data);
		$this->load->view('footer');
	}

	public function tambahBarang_masuk()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['nama_barang'] = $this->barang_model->getData();
		$data['nama_suplier'] = $this->suplier_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang_masuk/barang_masukForm', $data);
		$this->load->view('footer');
	}

	public function simpanBarang_masuk()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['nama_barang'] = $this->barang_model->getData();
		$data['nama_suplier'] = $this->suplier_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);

		if ($this->barang_masuk_model->simpanBarang_masuk()) {
			$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Input Barang Masuk Sukses</strong></p></div>';
			$this->load->view('barang_masuk/barang_masukForm', $data);
		}else{
			$data['error']  = '
					<div class="alert alert-danger"><p><strong>Input Barang Masuk Gagal!</strong></p></div>';
			$this->load->view('barang_masuk/barang_masukForm', $data);
		}

			$this->load->view('footer');
	}

	public function ubah($id)
	{
		$data['barang_masukId'] = $this->barang_masuk_model->getBarang_masukUpdate($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$data['nama_barang'] = $this->barang_model->getData();
		$data['nama_suplier'] = $this->suplier_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang_masuk/barang_masukForm', $data);
		$this->load->view('footer');
	}

	public function update($id)
	{
		$this->barang_masuk_model->update($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$data['barang_masukId'] = $this->barang_masuk_model->getBarang_masukUpdate($id);
		$data['barang'] = $this->barang_model->getData();
		$data['suplier'] = $this->suplier_model->getData();
		$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Update id Barang masuk '.$id.' Berhasil</strong></p></div>';
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang_masuk/barang_masukForm', $data);
		$this->load->view('footer');
	}

	public function hapus($id)
	{
		$this->barang_masuk_model->delete($id);

		redirect(site_url('barang_masuk'));
	}
}
