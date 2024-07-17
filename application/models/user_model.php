<?php
	class User_model extends CI_model
	{

		function __construct()
		{
			parent::__construct();
		}

		function getData()
		{
			$query=$this->db->query("SELECT * FROM user");
			foreach ($query->result_array() as $row) {$array[] = $row;}
			if (!isset($array)) { $array='';}
			$query->free_result();
			return $array;
		}

		function getUserUpdate($id)
		{
			$this->db->where('id_user', $id);
			return $this->db->get('user')->row();
		}

		function simpanUser()
		{
			$data = array(
				"nama"   => $this->input->post('nama'),
				"username" => $this->input->post('username'),
				"password"   => md5($this->input->post('password')),
				"level" => $this->input->post('level'),
			);

			$this->db->insert('user', $data);
			return true;
		}

		function update($id)
		{
			if ($this->input->post('password') == "") {
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'level'=> $this->input->post('level')
				);
			}else {
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					"password"   => md5($this->input->post('password')),
					'level'=> $this->input->post('level')

				);
			}

			$this->db->where('id_user', $id);
			$this->db->update('user', $data);
		}

		function delete($id)
		{
			$this->db->where('id_user', $id);
			$this->db->delete('user');
		}
	}

 ?>
