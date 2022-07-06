<?php 

class Data_pinjam extends CI_Controller{
	public function index()
	{
		//memanggil data
		$data['laporan'] = $this->perpus_model->get_data('laporan')->result();
		$data['buku'] = $this->perpus_model->get_data('buku')->result();
		$data['tgl_pinjam'] = date('Y-m-d');
		$data['tgl_kembali'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tgl_pinjam'])));
		$this->load->view('templates_user/header');
		$this->load->view('templates_user/sidebar');
		$this->load->view('user/data_pinjam',$data);
		$this->load->view('templates_user/footer');
	}
	public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['laporan']=$this->perpus_model->get_pengembalian_keyword($keyword);

        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/pengembalian_data',$data);
        $this->load->view('templates_user/footer');
    }

	//tambah pinjam
	public function tambah_pinjam() 
	{
		$data['buku'] = $this->perpus_model->get_data('buku')->result();
		$this->load->view('templates_user/header');
		$this->load->view('templates_user/sidebar');
		$this->load->view('user/data_pinjam',$data);
		$this->load->view('templates_user/footer');
	}

	//aksi
	public function tambah_pinjam_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambah_pinjam();
		}else{
		$id_user	= $this->input->post('id_user');
		$id_buku = $this->input->post('id_buku');
		$tgl_pinjam	= $this->input->post('tgl_pinjam');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$status = $this->input->post('status');
		

		$data = array (
			'id_user' => $id_user,
			'id_buku' => $id_buku,
			'status' => $status,
			'tgl_pinjam' => $tgl_pinjam,
			'tgl_kembali' => $tgl_kembali,
			'status' => $status
		);

			$this->perpus_model->insert_data($data,'laporan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data Berhasil Ditambahkan.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>');
			redirect('user/data_pinjam');
		}
	}

	public function update_pinjam($id)
	{
		$where = array('id_laporan' =>$id);
		$data['laporan'] = $this->perpus_model->edit_data($where, 'laporan')->result();

		$this->load->view('templates_user/header');
		$this->load->view('templates_user/sidebar');
		$this->load->view('user/edit_pinjam',$data);
		$this->load->view('templates_user/footer');

	}

	public function update_pinjam_aksi()
	{


		$id_laporan	= $this->input->post('id_laporan');
		$id_user	= $this->input->post('id_user');
		$id_buku = $this->input->post('id_buku');
		$tgl_pinjam	= $this->input->post('tgl_pinjam');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$pengembalian = $this->input->post('pengembalian');
		$status = $this->input->post('status');
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
			redirect('user/alert');	
	}

	public function _rules()
	{

		$this->form_validation->set_rules('id_user', 'ID User', 'required');
		$this->form_validation->set_rules('id_buku', 'ID Buku', 'required');
		$this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
		$this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
	}

}
?>