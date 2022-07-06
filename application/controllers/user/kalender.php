<?php 

	class Kalender extends CI_Controller{

		public function index($year = NULL, $mont = NULL)
		{
			$kalender = array (
				'start_day' =>'monday',
				'show_next_prev' => TRUE,
				'next_prev_url' => base_url()."user/kalender/index",
				'month_type' => 'long',
				'day_type' => 'short'
			);

			$this->load->library('calendar',$kalender);

			$data['kalender'] = $this->calendar->generate($year, $mont);

			$this->load->view('templates_user/header');
			$this->load->view('templates_user/sidebar');
			$this->load->view('user/kalender_view',$data);
			$this->load->view('templates_user/footer');
		}
	}
?>