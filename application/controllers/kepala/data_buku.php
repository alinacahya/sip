 <?php 

	class Data_buku extends CI_Controller{
		public function index()
		{
			$data['buku'] = $this->perpus_model->get_data('buku')->result();
			$this->load->view('templates_kepala/header');
			$this->load->view('templates_kepala/sidebar');
			$this->load->view('kepala/data_buku',$data);
			$this->load->view('templates_kepala/footer');
		}

		public function detail_buku($id)
		{
			$data['detail'] = $this->perpus_model->ambil_id_buku($id);
			$this->load->view('templates_kepala/header');
			$this->load->view('templates_kepala/sidebar');
			$this->load->view('kepala/detail_buku',$data);
			$this->load->view('templates_kepala/footer');
		}

		public function search()
		{
		$keyword = $this->input->post('keyword');
		$data['buku']=$this->perpus_model->get_buku_keyword($keyword);

		$this->load->view('templates_kepala/header');
		$this->load->view('templates_kepala/sidebar');
		$this->load->view('kepala/data_buku',$data);
		$this->load->view('templates_kepala/footer');
		}
	}
?>