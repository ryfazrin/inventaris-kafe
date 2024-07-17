<?php 
	/**
	 * 
	 */
	class Barang_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function getData()
		{
			$query = $this->db->get('masuk');
			return $query->result();
		}

		function getBarangByName($nama)
		{
			$this->db->where('nama_barang', $nama);
			return $this->db->get('barang')->row();
		}

		function getBarangUpdate($id)
		{
			$this->db->where('id_barang', $id);
			return $this->db->get('barang')->row();
		}

		function simpanBarang()
		{
			$data = array(
				"nama_barang"   => $this->input->post('nama_barang'),
			);

			$this->db->insert('barang', $data);
			return true;
		}

		function update($id)
		{
			$data = array(
				"nama_barang" => $this->input->post('nama_barang'),
			);

			$this->db->where('id_barang', $id);
			$this->db->update('barang', $data);
		}

		function delete($id)
		{
			$this->db->where('id_barang', $id);
			$this->db->delete('barang');
		}
	}
 ?>