<?php 
	/**
	 * 
	 */
	class Pinjam_barang_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function getData()
		{
			$this->db->select('*');
			$this->db->from('pinjam_barang');
			$this->db->join('barang', 'pinjam_barang.id_barang = barang.id_barang');
			$this->db->order_by('id_pinjam', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

		function getDataByUser($uname)
		{
			$this->db->select('*');
			$this->db->from('pinjam_barang');
			$this->db->join('barang', 'pinjam_barang.id_barang = barang.id_barang');
			$this->db->where('peminjam', $uname);
			$this->db->order_by('id_pinjam', 'DESC');
			$query = $this->db->get();
			return $query->result();
		}

		function getPeminjam()
		{
			$this->db->where('level', 'peminjam');
			return $this->db->get('user')->result();
		}

		function getPinjam_barangUpdate($id)
		{
			$this->db->select('*');
			$this->db->from('pinjam_barang');
			$this->db->join('barang', 'pinjam_barang.id_barang = barang.id_barang');
			$this->db->where('id_pinjam', $id);
			return $this->db->get()->row();
		}

		function simpanPinjam_barang()
		{
			$dateNow = date('Y-m-d');

			$data = array(
				'peminjam'   => $this->input->post('peminjam'), 
				'tgl_pinjam' => $dateNow, 
				'id_barang'  => $this->input->post('id_barang'), 
				'jml_barang' => $this->input->post('jml_barang'), 
				'tgl_kembali'=>  $this->input->post('tgl_kembali'), 
				'kondisi'    => $this->input->post('kondisi'), 
			);

			$this->db->insert('pinjam_barang', $data);
			return true;
		}

		function update($id)
		{
			$data = array(
				'peminjam'   => $this->input->post('peminjam'), 
				'id_barang'  => $this->input->post('id_barang'), 
				'jml_barang' => $this->input->post('jml_barang'), 
				'tgl_kembali'=>  $this->input->post('tgl_kembali'), 
				'kondisi'    => $this->input->post('kondisi'), 
			);

			$this->db->where('id_pinjam', $id);
			$this->db->update('pinjam_barang', $data);
		}

		function delete($id)
		{
			$this->db->where('id_pinjam', $id);
			$this->db->delete('pinjam_barang');
		}

	}
 ?>