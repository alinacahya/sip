<?php 

	class Detail_user extends CI_Controller{
	public function index()
	{
		$user = $this->session->userdata('id_user');
		$data['user'] = $this->db->query("SELECT * FROM user WHERE id_user='$user' ORDER BY id_user DESC")->result();;

		$this->load->view('templates_user/header');
		$this->load->view('templates_user/sidebar');
		$this->load->view('user/detail_user',$data);
		$this->load->view('templates_user/footer');
	}

	public function update_user($id)
		{
			$where = array('id_user' => $id);

			$data['user'] = $this->db->query("SELECT * FROM user cs WHERE id_user='$id'")->result();

			$this->load->view('templates_user/header');
			$this->load->view('templates_user/sidebar');
			$this->load->view('user/edit_user', $data);
			$this->load->view('templates_user/footer');

		}

		public function update_user_aksi()
		{
			$this->_rules();

			if ($this->form_validation->run() == FALSE){

				$this->update_user();
			}else{
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
				redirect('user/detail_user');
			}
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