<?php 
	class Data_rak extends CI_Controller{
		public function index()
		{

			//memanggil data
			$data['rak'] = $this->perpus_model->get_data('rak')->result();

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_rak',$data);
			$this->load->view('templates_admin/footer');
		}

		public function tambah_rak() 
		{
			$data['rak'] = $this->perpus_model->get_data('rak')->result();

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_rak',$data);
			$this->load->view('templates_admin/footer');
		}

		public function tambah_rak_aksi()
		{
			$this->_rules();

			if($this->form_validation->run() == FALSE){
				$this->tambah_rak();
			}else{
				$id 				= $this->input->post('id_rak');
				$kode_rak			= $this->input->post('kode_rak');
				$nama_rak			= $this->input->post('nama_rak');
			

				$data = array(
					'kode_rak'		=> $kode_rak,
					'nama_rak'		=> $nama_rak
				);

				$this->perpus_model->insert_data($data,'rak');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Type Berhasil Ditambahkan.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
				redirect('admin/data_rak');
			}
		}

		public function update_rak($id)
		{
			$where = array('id_rak' =>$id);
			$data['rak'] = $this->perpus_model->edit_data($where, 'rak')->result();

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/edit_rak',$data);
			$this->load->view('templates_admin/footer');

		}

		public function update_rak_aksi()
		{
				$id_rak             = $this->input->post('id_rak');
				$kode_rak			= $this->input->post('kode_rak');
				$nama_rak			= $this->input->post('nama_rak');
		
			$data = array(
						'id_rak'		=> $id_rak,
						'kode_rak'		=> $kode_rak,
						'nama_rak'		=> $nama_rak
					);

			$where = array (
				'id_rak' =>$id_rak
			);

				$this->perpus_model->update_data('rak', $data, $where);
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Berhasil Diupdate.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
				redirect('admin/data_rak');	
		}

		public function _rules()
		{
			$this->form_validation->set_rules('kode_rak', 'Kode rak', 'required');
			$this->form_validation->set_rules('nama_rak', 'nama_rak', 'required');
		}

		public function delete_rak($id)
		{
			$where = array('id_rak' => $id);
			$this->perpus_model->delete_data($where, 'rak');
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Berhasil Dihapus.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
				redirect('admin/data_rak');	
		} 


	}
?>