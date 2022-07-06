<?php 


	class Data_user extends CI_Controller
	{
		public function index()
		{
			//memanggil data
			$data['user'] = $this->perpus_model->get_data('user')->result();

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_user',$data);
			$this->load->view('templates_admin/footer');
		}

		//tambah mobil
		public function tambah_user() 
		{

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/tambah_user');
			$this->load->view('templates_admin/footer');
		}

		public function tambah_user_aksi()
		{
			$this->_rules();

			if($this->form_validation->run() == FALSE){
				$this->tambah_user();
			}else{
				$nrp			=$this->input->post('nrp');
				$username		=$this->input->post('username');
				$password		=$this->input->post('password');
				$nama 			=$this->input->post('nama');
				$level 			=$this->input->post('level');
				$tempat_lahir	=$this->input->post('tempat_lahir');
				$tanggal_lahir	=$this->input->post('tanggal_lahir');
				$jk				=$this->input->post('jk');
				$alamat	 		=$this->input->post('alamat');
				$telp 			=$this->input->post('telp');
				$foto			= $_FILES['foto']['name'];
					if($foto=''){}else{
						$config ['upload_path']		= './uploads';
						$config ['allowed_types']	= 'jpg|jpeg|png|tiff';

						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('foto')){
							echo "Pas Foto Gagal DiUpload!";
						}else{
							$foto=$this->upload->data('file_name');
						}
					}

				$data = array(

					'nrp'  	  		=> $nrp,
					'username' 		=> $username,
					'password'		=> $password,
					'level' 		=> $level,
					'nama' 			=> $nama,
					'tempat_lahir'  => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'jk'			=> $jk,
					'alamat' 		=> $alamat,
					'telp'  		=> $telp,
					'foto' 			=> $foto
				);

				$this->perpus_model->insert_data($data,'user');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data user Berhasil Ditambahkan.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
				redirect('admin/data_user');
			}
		}

		public function update_user($id)
		{
			$where = array('id_user' =>$id);
			$data['user'] = $this->perpus_model->edit_user($where, '
			user')->result();

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/edit_user', $data);
			$this->load->view('templates_admin/footer');

		}

		public function update_user_aksi()
		{
			
				$id_user		=$this->input->post('id_user');
				$nrp			=$this->input->post('nrp');
				$username		=$this->input->post('username');
				$password		=$this->input->post('password');
				$level 			=$this->input->post('level');
				$nama 			=$this->input->post('nama');
				$tempat_lahir	=$this->input->post('tempat_lahir');
				$tanggal_lahir	=$this->input->post('tanggal_lahir');
				$jk				=$this->input->post('jk');
				$alamat	 		=$this->input->post('alamat');
				$telp 			=$this->input->post('telp');
				$foto			= $_FILES['foto']['name'];
				if($foto){
				$config ['upload_path']		= './uploads';
				$config ['allowed_types']	= 'jpg|jpeg|png|tiff';

				$this->load->library('upload',$config);

				if ($this->upload->do_upload('foto')){
					$foto=$this->upload->data('file_name');
					$this->db->set('foto',$foto);
				}else{
					echo $this->upload->display_errors();
				}
		}

				$data = array(

					'nrp'  	  		=> $nrp,
					'username' 		=> $username,
					'password'		=> $password,
					'level' 		=> $level,
					'nama' 			=> $nama,
					'tempat_lahir'  => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'jk'			=> $jk,
					'alamat' 		=> $alamat,
					'telp'  		=> $telp
				);

				$where = array (
				'id_user' =>$id_user
				);

				$this->perpus_model->update_data('user', $data, $where);
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data user Berhasil Diupdate!.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
				redirect('admin/data_user');
		}

		public function detail_user($id)
		{
			$data['detail'] = $this->perpus_model->ambil_id_user($id);

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/detail_user',$data);
			$this->load->view('templates_admin/footer');
		}

		public function delete_user($id)
		{
			$where = array('id_user' => $id);
			$this->perpus_model->delete_data($where, 'user');
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Berhasil Dihapus!.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>');
				redirect('admin/data_user');	
		} 

		public function _rules()
		{
			$this->form_validation->set_rules('nrp', 'NRP', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('telp', 'Telepon', 'required');
		}

	}



?>