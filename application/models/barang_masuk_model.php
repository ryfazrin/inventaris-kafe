<?php 
	/**
	 * 
	 */
	class Barang_masuk_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function getData()
		{
			// $this->db->select('barang_masuk.*, barang.*');
			$this->db->select('*');
			$this->db->from('barang_masuk');
			$this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang');
			$this->db->order_by('id_masuk', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

		function getDataById($id)
		{
			$this->db->select('*');
			$this->db->from('barang_masuk');
			$this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang');
			$this->db->where('barang_masuk.id_masuk', $id);
			return $this->db->get()->row();
		}

		function getBarang_masukUpdate($id)
		{
			$this->db->select('*');
			$this->db->from('barang_masuk');
			$this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang');
			$this->db->where('barang_masuk.id_masuk', $id);
			return $this->db->get()->row();
		}

		function simpanBarang_masuk()
		{
			$dateNow = date('Y-m-d');

			$data = array(
				"id_barang"   => $this->input->post('id_barang'),
				"tgl_masuk"   => $dateNow,
				"spesifikasi"   => $this->input->post('spesifikasi'),
				"kondisi"   => $this->input->post('kondisi'),
				"jml_masuk"   => $this->input->post('jml_masuk'),
			);

			$this->db->insert('barang_masuk', $data);
			return true;
		}
		
		function update($id)
		{
			$data = array(
				"id_barang"   => $this->input->post('id_barang'),
				"spesifikasi"   => $this->input->post('spesifikasi'),
				"kondisi"   => $this->input->post('kondisi'),
				"jml_masuk"   => $this->input->post('jml_masuk'),
			);

			$this->db->where('id_masuk', $id);
			$this->db->update('barang_masuk', $data);
		}

		function delete($id)
		{
			$this->db->where('id_masuk', $id);
			$this->db->delete('barang_masuk');
		}
	}
 ?>