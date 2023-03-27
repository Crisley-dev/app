<?php

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        
    }
    
    public function index() {
        if($this->session->userdata('logged_in')) {
            redirect('portal');
        }
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
            $data['title'] = 'Login';
            $this->load->view('pages/login', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->User_model->get_user_by_email($email);
            
            if(!$user) {
                $this->increase_attempt();
                $data['title'] = 'Login';
                $data['error'] = "Email ou senha inválidos.";
                $this->load->view('pages/login', $data);
            } elseif(password_verify($password, $user->senha)) {
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('email',$email);
                redirect('portal');
            } else {
                $this->increase_attempt();
                $data['title'] = 'Login';
                $data['error'] = "Email ou senha inválidos.";
                $this->load->view('pages/login', $data);
            }
        }
    }
    
    private function increase_attempt() {
        $ip = $this->input->ip_address();
        $user = $this->User_model->get_user_by_ip($ip);
        
        if($user) {
            $attempt = $user->tentativas + 1;
            $data = array('tentativas' => $attempt);
            $this->User_model->update_user($user->id, $data);
            
            if($attempt >= 5) {
                $this->block_ip($ip);
            }
        } else {
            $data = array(
                'ip' => $ip,
                'tentativas' => 1
            );
            $this->User_model->create_user($data);
        }
    }
    
    private function block_ip($ip) {
        $this->User_model->block_ip($ip);
        $this->session->set_flashdata('error', 'O seu IP foi bloqueado por 3 minutos. ');
        redirect('login');
    }

    public function logout()
    {
        $this->session->unset_userdata("logged_in");
        redirect('login');
    }

  
    
}
