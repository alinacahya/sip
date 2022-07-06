<?php 

/**
 * 
 */
class Laporan extends CI_Controller
{
	
	public function index()
	{

		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');

		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->load->view('templates_kepala/header');
			$this->load->view('templates_kepala/sidebar');
			$this->load->view('kepala/filter_laporan');
			$this->load->view('templates_kepala/footer');
		}else{

		$data['laporan'] = $this->db->query("SELECT * FROM laporan tr, user mb, buku cs WHERE tr.id_user=mb.id_user AND tr.id_buku=cs.id_buku AND date(tgl_pinjam) >= '$dari' AND date(tgl_kembali) <='$sampai' ")->result();
			$this->load->view('templates_kepala/header');
			$this->load->view('templates_kepala/sidebar');
			$this->load->view('kepala/tampilkan_laporan',$data);
			$this->load->view('templates_kepala/footer');
		}
		
	}

	public function print_laporan()
	{
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');
		$data['title'] = "Print Laporan Transaksi";

		$data['laporan'] = $this->db->query("SELECT * FROM laporan tr, user mb, buku cs WHERE tr.id_user=mb.id_user AND tr.id_buku=cs.id_buku AND date(tgl_pinjam) >= '$dari' AND date(tgl_kembali) <='$sampai' ")->result();

		$this->load->view('templates_kepala/header',$data);
		$this->load->view('kepala/print_laporan',$data);
	}
	

	public function _rules()
	{
		$this->form_validation->set_rules('dari','Dari Tanggal','required');
		$this->form_validation->set_rules('sampai','Sampai Tanggal','required');
	}
}

?>