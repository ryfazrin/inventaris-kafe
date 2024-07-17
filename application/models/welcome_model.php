<?php
	class Welcome_model extends CI_model
	{

		function __construct()
		{
			parent::__construct();
		}

		function getDataStok()
		{
			$query = $this->db->get('stok');
			return $query->result();
		}

		function user_rows()
		{
			$query = $this->db->get('user');
			return $query->num_rows();
		}

		function barang_rows()
		{
			$query = $this->db->get('barang');
			return $query->num_rows();
		}
	}
 ?>
