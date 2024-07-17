<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_keluar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
		// load barang_keluar_model
		$this->load->model('barang_keluar_model');
		// load barang_model
		$this->load->model('barang_model');
		// load login_model
		$this->load->model('login_model');
	}

	public function index()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['barang_keluar'] = $this->barang_keluar_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang_keluar/barang_keluarList', $data);
		$this->load->view('footer');
	}

	public function tambahBarang_keluar()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['nama_barang'] = $this->barang_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang_keluar/barang_keluarForm', $data);
		$this->load->view('footer');
	}

	public function simpanBarang_keluar()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['nama_barang'] = $this->barang_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);

		if ($this->barang_keluar_model->simpanBarang_keluar()) {
			$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Input Barang Keluar Sukses</strong></p></div>';
			$this->load->view('barang_keluar/barang_keluarForm', $data);
		}else{
			$data['error']  = '
					<div class="alert alert-danger"><p><strong>Input Barang Keluar Gagal!</strong></p></div>';
			$this->load->view('barang_keluar/barang_keluarForm', $data);
		}

			$this->load->view('footer');
	}

	public function ubah($id)
	{
		$data['barang_keluarId'] = $this->barang_keluar_model->getBarang_keluarUpdate($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$data['nama_barang'] = $this->barang_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang_keluar/barang_keluarForm', $data);
		$this->load->view('footer');
	}

	public function update($id)
	{
		$this->barang_keluar_model->update($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$data['barang_keluarId'] = $this->barang_keluar_model->getBarang_keluarUpdate($id);
		$data['nama_barang'] = $this->barang_model->getData();
		$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Update id Barang keluar '.$id.' Berhasil</strong></p></div>';
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('barang_keluar/barang_keluarForm', $data);
		$this->load->view('footer');
	}

	public function hapus($id)
	{
		$this->barang_keluar_model->delete($id);
		redirect(site_url('barang_keluar'));
	}
}