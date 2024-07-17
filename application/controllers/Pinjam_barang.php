<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// load barang_masuk_model
		$this->load->model('pinjam_barang_model');
		// load barang_model
		$this->load->model('barang_model');
		// load login_model
		$this->load->model('login_model');
	}

	public function index()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['pinjam_barang'] = $this->pinjam_barang_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('pinjam_barang/pinjam_barangList', $data);
		$this->load->view('footer');
	}

	public function by_user()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['pinjam_barang'] = $this->pinjam_barang_model->getDataByUser($uname);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('pinjam_barang/pinjam_barangList', $data);
		$this->load->view('footer');
	}


	public function tambahPinjam_barang()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['nama_barang'] = $this->barang_model->getData();
		$data['peminjam_user'] = $this->pinjam_barang_model->getPeminjam();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('pinjam_barang/pinjam_barangForm', $data);
		$this->load->view('footer');
	}

	public function simpanPinjam_barang()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['nama_barang'] = $this->barang_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);

		if ($this->pinjam_barang_model->simpanPinjam_barang()) {
			$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Input Pinjam Barang Sukses</strong></p></div>';
			$this->load->view('pinjam_barang/pinjam_barangForm', $data);
		}else{
			$data['error']  = '
					<div class="alert alert-danger"><p><strong>Input Pinjam Barang Gagal!</strong></p></div>';
			$this->load->view('pinjam_barang/pinjam_barangForm', $data);
		}

			$this->load->view('footer');
	}

	public function ubah($id)
	{
		$data['pinjam_barangId'] = $this->pinjam_barang_model->getPinjam_barangUpdate($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$data['nama_barang'] = $this->barang_model->getData();
		$data['peminjam_user'] = $this->pinjam_barang_model->getPeminjam();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('pinjam_barang/pinjam_barangForm', $data);
		$this->load->view('footer');
	}

	public function update($id)
	{
		$this->pinjam_barang_model->update($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$data['pinjam_barangId'] = $this->pinjam_barang_model->getPinjam_barangUpdate($id);
		$data['peminjam_user'] = $this->pinjam_barang_model->getPeminjam();
		$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Update id pinjam barang '.$id.' Berhasil</strong></p></div>';
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('pinjam_barang/pinjam_barangForm', $data);
		$this->load->view('footer');
	}

	// public function hapus($id)
	// {
	// 	$this->pinjam_barang_model->delete($id);
	// 	redirect(site_url('pinjam_barang'));
	// }
}
