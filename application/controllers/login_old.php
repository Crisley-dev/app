<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
    }
    
    public function index() {
        $data['title'] = 'Login';
        $this->load->view('pages/login', $data);
    }

    public function store()
    {
      
        $data['title'] = 'Login';
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $user = $this->login_model->store($email,$password);

        $login_attempts = $this->session->userdata('login_attempts');
        $last_attempt_time = $this->session->userdata('last_attempt_time');

        if ($login_attempts >= 5 && time() - $last_attempt_time < 120) { // Bloqueia por 2 minutos
         // A conta está bloqueada
            $tempo = gmdate("H:i:s", time() - $last_attempt_time);
            $data['title'] = 'Login Bloqueado';
            $this->session->set_flashdata('error','Muitas tentativas de login. Acesso liberado em 2 Minutos: <br>'.$tempo.'');
            $this->load->view('templates/header');
            $this->load->view('pages/bloqueio',$data);
            }
        else {
            if($user)
            {
                $this->session->set_userdata("logged_user",$user);
                $this->session->unset_userdata('login_attempts');
                $this->session->unset_userdata('last_attempt_time');
                redirect('portal');
            } else {
                $login_attempts = $this->session->userdata('login_attempts');
                $this->session->set_userdata('login_attempts', $login_attempts + 1);
                $this->session->set_userdata('last_attempt_time', time());
                $this->session->set_flashdata('error','Email e/ou Senha invalidos');
                redirect('login');
            }

        }
     
       
    }

    public function logout()
    {
        $this->session->unset_userdata("logged_user");
        redirect('login');
    }
}