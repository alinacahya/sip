<?php 

class Data_buku extends CI_Controller{
	public function index()
	{
		//memanggil data
		$data['buku'] = $this->perpus_model->get_data('buku')->result();
		$data['rak'] = $this->perpus_model->get_data('rak')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_buku',$data);
		$this->load->view('templates_admin/footer');
	}
	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['buku']=$this->perpus_model->get_buku_keyword($keyword);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_buku',$data);
		$this->load->view('templates_admin/footer');
	}

	//tambah buku
	public function tambah_buku() 
	{
		$data['rak'] = $this->perpus_model->get_data('rak')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_buku',$data);
		$this->load->view('templates_admin/footer');
	}

	//aksi
	public function tambah_buku_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambah_buku();
		}else{
			$kode_buku 	 	 = $this->input->post('kode_buku');
			$kode_rak 		 = $this->input->post('kode_rak');
			$isbn		 	 = $this->input->post('isbn');
			$title 		 	 = $this->input->post('title');
			$penerbit	  	 = $this->input->post('penerbit');
			$pengarang 	 	 = $this->input->post('pengarang');
			$thn_buku	 	 = $this->input->post('thn_buku');
			$jml 		 	 = $this->input->post('jml');
			$tgl_masuk	 	 = $this->input->post('tgl_masuk');
			$sampul		 	 = $_FILES['sampul']['name'];
				if($sampul=''){}else{
					$config ['upload_path']		= './uploads';
					$config ['allowed_types']	= 'jpg|jpeg|png|tiff';

					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('sampul')){
						echo "Pas Sampul Gagal DiUpload!";
					}else{
						$sampul=$this->upload->data('file_name');
					}
				}

			$data = array (
				'kode_buku' 		=> $kode_buku,
				'kode_rak'			=> $kode_rak,
				'isbn' 				=> $isbn,
				'title'				=> $title,
				'penerbit' 			=> $penerbit,
				'pengarang' 		=> $pengarang,
				'thn_buku'			=> $thn_buku,
				'jml'				=> $jml,
				'tgl_masuk' 		=> $tgl_masuk,
				'sampul' 			=> $sampul
				
		 );


			$this->perpus_model->insert_data($data,'buku');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data Berhasil Ditambahkan.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>');
			redirect('admin/data_buku');
		}
	}

	public function update_buku($id){
		$where = array('id_buku' => $id);

		$data['buku'] = $this->db->query("SELECT * FROM buku bk, rak rk WHERE bk.kode_rak=rk.kode_rak AND bk.id_buku='$id'")->result();
		$data['rak'] = $this->perpus_model->get_data('rak')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_buku',$data);
		$this->load->view('templates_admin/footer');

	}

	public function update_buku_aksi(){
		$this->_rules();

		if ($this->form_validation->run() == FALSE){

			$this->update_buku();
		}else{
			$id 	 	 	 = $this->input->post('id_buku');
			$kode_buku 	 	 = $this->input->post('kode_buku');
			$kode_rak 		 = $this->input->post('kode_rak');
			$isbn		 	 = $this->input->post('isbn');
			$title 		 	 = $this->input->post('title');
			$penerbit	  	 = $this->input->post('penerbit');
			$pengarang 	 	 = $this->input->post('pengarang');
			$thn_buku	 	 = $this->input->post('thn_buku');
			$jml 		 	 = $this->input->post('jml');
			$tgl_masuk	 	 = $this->input->post('tgl_masuk');
			$sampul		 	 = $_FILES['sampul']['name'];
				if($sampul=''){}else{
					$config ['upload_path']		= './uploads';
					$config ['allowed_types']	= 'jpg|jpeg|png|tiff';

					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('sampul')){
						echo "Pas Sampul Gagal DiUpload!";
					}else{
						$sampul=$this->upload->data('file_name');
					}
				}

			$data = array (
				'kode_buku' 		=> $kode_buku,
				'kode_rak'			=> $kode_rak,
				'isbn' 				=> $isbn,
				'title'				=> $title,
				'penerbit' 			=> $penerbit,
				'pengarang' 		=> $pengarang,
				'thn_buku'			=> $thn_buku,
				'jml'				=> $jml,
				'tgl_masuk' 		=> $tgl_masuk,
				'sampul' 			=> $sampul
				
		 );

		$where = array (
			'id_buku' =>$id
		);

			$this->perpus_model->update_data('buku', $data, $where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data Berhasil Diupdate.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>');
			redirect('admin/data_buku');	
		}
	}

	public function _rules()
	{

		$this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required');
		$this->form_validation->set_rules('kode_rak', 'Kode Rak', 'required');
		$this->form_validation->set_rules('isbn', 'ISBN', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
		$this->form_validation->set_rules('thn_buku', 'Tahun Buku', 'required');
		$this->form_validation->set_rules('jml', 'Stok Buku', 'required');
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
	}

	public function detail_buku($id)
	{
		$data['detail'] = $this->perpus_model->ambil_id_buku($id);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_buku',$data);
		$this->load->view('templates_admin/footer');
	} 

	public function delete_buku($id)
	{
		$where = array('id_buku' => $id);
		$this->perpus_model->delete_data($where, 'buku');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  Data Berhasil Dihapus.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>');
			redirect('admin/data_buku');	
	} 
}
?>