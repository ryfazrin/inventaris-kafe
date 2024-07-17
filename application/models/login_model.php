<?php 
	class Login_model extends CI_model
	{
		private $error = array();

		function validasi($uname, $pass)
		{
			$this->db->from('user');
			$this->db->where('username', $uname);
			$this->db->where('password', md5($pass));
			$login = $this->db->get()->result();

			if (is_array($login) && count($login) == 1) {
				$this->details = $login[0];
				return true;
			}
			$this->error = array('login' => 'login failed');
			return false;
		}

		function getLevel($uname)
		{
			$this->db->where('username', $uname);
			return $this->db->get('user')->row();
		}

		
	}