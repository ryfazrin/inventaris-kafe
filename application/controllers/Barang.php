<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
		// load barang model
		$this->load->model('barang_model');
		// load suplier_model
		$this->load->model('suplier_model');
		// load login model
		$this->load->model('login_model');
	}

	public function index()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['barang'] = $this->barang_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang/barangList', $data);
		$this->load->view('footer');
	}

	public function tambahBarang()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang/barangForm');
		$this->load->view('footer');
	}

	public function simpanBarang()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$this->barang_model->simpanBarang();
		$data['barangId'] = $this->barang_model->getBarangByName($this->input->post('nama_barang'));
		$data['nama_barang'] = $this->barang_model->getData();
		$data['nama_suplier'] = $this->suplier_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang_masuk/barang_masukForm', $data);
		$this->load->view('footer');
	}

	public function ubah($id)
	{
		$data['barangId'] = $this->barang_model->getBarangUpdate($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang/barangForm', $data);
		$this->load->view('footer');
	}

	public function update($id)
	{
		$this->barang_model->update($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$data['barangId'] = $this->barang_model->getBarangUpdate($id);
		$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Update id Barang '.$id.' Berhasil</strong></p></div>';
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang/barangForm', $data);
		$this->load->view('footer');
	}

	// public function konfirmasi_hapus($id)
	// {
	// 	$data['id'] = $id;
	//
	// 	$uname = $this->session->userdata('username');
	// 	$data['level'] = $this->login_model->getLevel($uname);
	// 	$this->load->view('head');
	// 	$this->load->view('header');
	// 	$this->load->view('navigasi', $data);
	// 	$this->load->view('barang/konfirmasi_hapus', $data);
	// 	$this->load->view('footer');
	// }
	//
	// public function hapus($id)
	// {
	// 	$this->barang_model->delete($id);
	// 	redirect(site_url('barang'));
	// }
}
