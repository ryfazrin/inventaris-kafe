<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('login');
		}
		$this->load->model('suplier_model');
		$this->load->model('login_model');
	}

	public function index()
	{	
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);

		$data['supliers'] = $this->suplier_model->getData();
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('suplier/suplierList', $data);
		$this->load->view('footer');
	}

	public function tambahSuplier()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('suplier/suplierForm');
		$this->load->view('footer');
	}

	public function simpanSuplier()
	{
		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);

		if ($this->suplier_model->simpanSuplier()) {
			$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Input Data Suplier Sukses</strong></p></div>';
			$this->load->view('suplier/suplierForm', $data);
		}else{
			$data['error']  = '
					<div class="alert alert-danger"><p><strong>Input Data Suplier Gagal!</strong></p></div>';
			$this->load->view('suplier/suplierForm', $data);
		}

			$this->load->view('footer');
	}

	public function ubah($id)
	{
		$data['suplierId'] = $this->suplier_model->getSuplierUpdate($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('suplier/suplierForm', $data);
		$this->load->view('footer');
	}

	public function update($id)
	{
		$this->suplier_model->update($id);

		$uname = $this->session->userdata('username');
		$data['level'] = $this->login_model->getLevel($uname);
		$data['suplierId'] = $this->suplier_model->getSuplierUpdate($id);
		$data['sukses']  = '
					<div class="alert alert-success"><p><strong>Update id Suplier '.$id.' Berhasil</strong></p></div>';
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('navigasi', $data);
		$this->load->view('suplier/suplierForm', $data);
		$this->load->view('footer');
	}

	public function hapus($id)
	{
		// apabila data suplier digunakan oleh tabel lain, relasi
		// maka tidak bisa delete (database error)
		$this->suplier_model->delete($id);
		redirect(site_url('suplier'));
	}
}