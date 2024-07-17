<?php 
	/**
	 * 
	 */
	class Barang_keluar_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function getData()
		{
			$this->db->select('*');
			$this->db->from('barang_keluar');
			$this->db->join('barang', 'barang_keluar.id_barang = barang.id_barang');
			$this->db->order_by('id_keluar', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

		function getBarang_keluarUpdate($id)
		{
			$this->db->select('*');
			$this->db->from('barang_keluar');
			$this->db->join('barang', 'barang_keluar.id_barang = barang.id_barang');
			$this->db->where('id_keluar', $id);
			return $this->db->get()->row();
		}

		function simpanBarang_keluar()
		{
			$dateNow = date('Y-m-d');

			$data = array(
				'id_barang'  => $this->input->post('id_barang'), 
				'tgl_keluar' => $dateNow, 
				'jml_keluar' => $this->input->post('jml_keluar'), 
				'lokasi'     => $this->input->post('lokasi'), 
				'penerima'   => $this->input->post('penerima'), 
			);

			$this->db->insert('barang_keluar', $data);
			return true;
		}

		function update($id)
		{
			$data = array(
				'id_barang'  => $this->input->post('id_barang'),  
				'jml_keluar' => $this->input->post('jml_keluar'), 
				'lokasi'     => $this->input->post('lokasi'), 
				'penerima'   => $this->input->post('penerima'), 
			);

			$this->db->where('id_keluar', $id);
			$this->db->update('barang_keluar', $data);
		}

		function delete($id)
		{
			$this->db->where('id_keluar', $id);
			$this->db->delete('barang_keluar');
		}
	}
 ?>