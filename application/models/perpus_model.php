<?php 
	class Perpus_model extends CI_model{
		public function get_data($table){
			return $this->db->get($table);
		}

		public function get_buku_keyword($keyword){
			$this->db->select('*');
			$this->db->from('buku');
			$this->db->like('title',$keyword);
			$this->db->or_like('kode_buku',$keyword);
			$this->db->or_like('thn_buku',$keyword);
			return $this->db->get()->result();
		}

		
		public function get_where($where,$table){
			return $this->db->get_where($table,$where);
		}

		public function insert_data($data,$table){
			$this->db->insert($table,$data);
		}

		public function update_data($table,$data,$where){
			$this->db->update($table,$data,$where);
		}

		public function delete_data($where, $table){
			$this->db->where($where);
			$this->db->delete($table);
		}

		public function ambil_id_buku($id){
			$hasil = $this->db->where('id_buku', $id)->get('buku');
			if($hasil->num_rows() > 0){
				return $hasil->result();
			}else{
				return false;
			}
		}

		public function ambil_id_user($id){
			$hasil = $this->db->where('id_user', $id)->get('user');
			if($hasil->num_rows() > 0){
				return $hasil->result();
			}else{
				return false;
			}
		}

		public function ambil_id_laporan($id){
			$hasil = $this->db->where('id_laporan', $id)->get('laporan');
			if($hasil->num_rows() > 0){
				return $hasil->result();
			}else{
				return false;
			}
		}


		public function cek_login()
		{
			$username = set_value('username');
			$password = set_value('password');

			$result = $this->db->where('username',$username)
							   ->where('password',$password)
							   ->limit(1)
							   ->get('user');
			if($result->num_rows() > 0){
				return $result->row();
			}else{
				return FALSE;
			}
		}

		public function update_password($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}

		public function downloadPembayaran($id)
		{
			$query=$this->db->get_where('transaksi',array('id_rental' => $id));
			return $query->row_array();
		}

		public function edit_user($where,$table){
      	return $this->db->get_where($table,$where);
    	}

    	public function edit_data($where,$table){
      	return $this->db->get_where($table,$where);
    	}
    	
      public function get_pengembalian_keyword($keyword){
      $this->db->select('*');
      $this->db->from('laporan');
      $this->db->or_like('id_user',$keyword);
      return $this->db->get()->result();
    }
	}
?>