<?php 

class Pengembalian extends CI_Controller {

    
   public function index()
    {

       $data['laporan'] = $this->perpus_model->get_data('laporan')->result();
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/pengembalian_pencarian',$data);
        $this->load->view('templates_user/footer');
        
    }
    
    public function _rules()
    {
        $this->form_validation->set_rules('id_user','ID User','required');
        $this->form_validation->set_rules('sampai','Sampai Tanggal','required');
    }

}

/* End of file Pengembalian.php */








