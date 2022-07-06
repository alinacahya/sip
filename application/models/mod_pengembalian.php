<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_pengembalian extends CI_Model {

    public function get_data($table){
      return $this->db->get($table);
    }

    public function get_pengembalian_keyword($keyword){
      $this->db->select('*');
      $this->db->from('laporan');
      $this->db->like('id_laporan',$keyword);
      $this->db->or_like('id_user',$keyword);
      $this->db->or_like('id_buku',$keyword);
      return $this->db->get()->result();
    }


}

/* End of file Mod_pengembalian.php */
