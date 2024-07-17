<?php 
	/**
	 * 
	 */
	class Suplier_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function getData()
		{
			// $query=$this->db->query("SELECT * FROM suplier");
			// foreach ($query->result_array() as $row) {$array[] = $row;}
			// if (!isset($array)) { $array='';}
			// $query->free_result();
			// return $array;
			$query = $this->db->get('suplier');
			return $query->result();
		}

		function getSuplierUpdate($id)
		{
			$this->db->where('id_suplier', $id);
			return $this->db->get('suplier')->row();
		}

		function simpanSuplier()
		{
			$data = array(
				"nama_suplier"   => $this->input->post('nama_suplier'),
				"alamat_suplier" => $this->input->post('alamat_suplier'),
				"telp_suplier"   => $this->input->post('telp_suplier'),
			);

			$this->db->insert('suplier', $data);
			return true;
		}

		function update($id)
		{
			$data = array(
				"nama_suplier"   => $this->input->post('nama_suplier'),
				"alamat_suplier" => $this->input->post('alamat_suplier'),
				"telp_suplier"   => $this->input->post('telp_suplier'),
			);

			$this->db->where('id_suplier', $id);
			$this->db->update('suplier', $data);
		}

		function delete($id)
		{
			$this->db->where('id_suplier', $id);
			$this->db->delete('suplier');
		}
	}
 ?>