<?php
class Register extends CI_Controller
{
    
    public function index()
    {
         $this->form_validation->set_rules('nrp', 'NRP', 'required', [
            'required' => 'NRP wajib diisi!'
        ]);

         $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password wajib diisi!'

        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama wajib diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates_kepala/header');
            $this->load->view('register');
            $this->load->view('templates_kepala/footer');
        }else{
            $data = array(
                'id_user'   => '', 
                'nrp'      => $this->input->post('nrp'), 
                'username'  => $this->input->post('username'), 
                'password'  => $this->input->post('password'),
                'nama'  => $this->input->post('nama'),
                'level'   => 2

            );

            $this->db->insert('user',$data);
            redirect('auth/login');
        }
        
    }
}
?>