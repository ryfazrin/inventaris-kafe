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

		function suplier_rows()
		{
			$query = $this->db->get('suplier');
			return $query->num_rows();
		}

		function jatuh_tempo_pinjam($username)
		{

			$where = "tgl_pinjam < current_date() AND peminjam = '$username'";

			$this->db->select('*');
			$this->db->from('pinjam_barang');
			$this->db->join('barang', 'pinjam_barang.id_barang = barang.id_barang');
			$this->db->where($where);
			$this->db->order_by('id_pinjam', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}
	}
 ?>
