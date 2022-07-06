<?php 

class Data_pengembalian extends CI_Controller{
	public function index()
	{
		//memanggil data
		$data['laporan'] = $this->perpus_model->get_data('laporan')->result();
		$data['buku'] = $this->perpus_model->get_data('buku')->result();
		$data['tgl_pinjam'] = date('Y-m-d');
		$data['tgl_kembali'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tgl_pinjam'])));
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_pengembalian',$data);
		$this->load->view('templates_admin/footer');
	}
	
	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['laporan']=$this->perpus_model->get_pengembalian_keyword($keyword);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_pengembalian',$data);
		$this->load->view('templates_admin/footer');
	}

	//tambah pengembalian
	public function tambah_pengembalian() 
	{
		$data['laporan'] = $this->perpus_model->get_data('laporan')->result();
		$data['buku'] = $this->perpus_model->get_data('buku')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_pengembalian',$data);
		$this->load->view('templates_admin/footer');
	}

	//aksi
	public function tambah_pengembalian_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambah_pengembalian();
		}else{
		$id_user			= $this->input->post('id_user');
		$id_buku 			= $this->input->post('id_buku');
		$tgl_pinjam			= $this->input->post('tgl_pinjam');
		$tgl_kembali 		= $this->input->post('tgl_kembali');
		$pengembalian 		= $this->input->post('pengembalian');
		$status 			= $this->input->post('status');
		$denda 				= $this->input->post('denda');

		

		$data = array (
			'id_user' => $id_user,
			'id_buku' => $id_buku,
			'status' => $status,
			'tgl_pinjam' => $tgl_pinjam,
			'tgl_kembali' => $tgl_kembali,
			'pengembalian' => $pengembalian,
			'status' => $status,
			'denda' => $denda
		);

			$this->perpus_model->insert_data($data,'laporan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data Berhasil Ditambahkan.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>');
			redirect('admin/data_pengembalian');
		}
	}

	public function update_pengembalian($id){
		$where = array('id_laporan' =>$id);
		$data['laporan'] = $this->perpus_model->edit_data($where, 'laporan')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_pengembalian',$data);
		$this->load->view('templates_admin/footer');

	}

	public function update_pengembalian_aksi(){
		$this->_rules();

			if ($this->form_validation->run() == FALSE){

				$this->update_customer();
			}else{

		$id_laporan			= $this->input->post('id_laporan');
		$id_user			= $this->input->post('id_user');
		$id_buku 			= $this->input->post('id_buku');
		$tgl_pinjam			= $this->input->post('tgl_pinjam');
		$tgl_kembali 		= $this->input->post('tgl_kembali');
		$pengembalian 		= $this->input->post('pengembalian');
		$status 			= $this->input->post('status');
		$denda 				= $this->input->post('denda');

		$x				    = strtotime($pengembalian);
		$y					= strtotime($tgl_kembali);
		$selisih			= ((abs($x - $y))/(60*60*24));
		$total_denda		= $selisih * $denda;
		$data = array (
			'id_laporan' => $id_laporan,
			'id_user' => $id_user,
			'id_buku' => $id_buku,
			'status' => $status,
			'tgl_pinjam' => $tgl_pinjam,
			'tgl_kembali' => $tgl_kembali,
			'pengembalian' => $pengembalian,
			'status' => $status,
			'denda' => $denda,
			'total_denda' => $total_denda,
		);

		$where = array(

			'id_laporan' => $id_laporan
		);
			$this->perpus_model->update_data('laporan', $data, $where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data Berhasil Diupdate.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>');
			redirect('admin/data_pengembalian');
			}	
	}

	public function _rules()
	{

		$this->form_validation->set_rules('id_user', 'ID User', 'required');
		$this->form_validation->set_rules('id_buku', 'ID Buku', 'required');
		$this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
		$this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
		$this->form_validation->set_rules('pengembalian', 'Tanggal Pengembalian', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('denda', 'Denda', 'required');
		
	}

	public function detail_pengembalian($id)
	{
		$data['detail'] = $this->perpus_model->ambil_id_laporan($id);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_pengembalian',$data);
		$this->load->view('templates_admin/footer');
	} 

	public function delete_pengembalian($id)
	{
		$where = array('id_laporan' => $id);
		$this->perpus_model->delete_data($where, 'laporan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  Data Berhasil Dihapus.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>');
			redirect('admin/data_pengembalian');	
	}

	public function print_pengembalian(){

		$data['laporan'] = $this->perpus_model->get_data('laporan')->result();
		$data['laporan'] = $this->db->query("SELECT * FROM laporan tr, user mb, buku cs WHERE tr.id_user=mb.id_user AND tr.id_buku=cs.id_buku AND date(tgl_pinjam) ")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('admin/print_pengembalian', $data);
	}
}
?>