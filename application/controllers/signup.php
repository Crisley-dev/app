<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
      
    }

    public function index() {
        $data['title'] = 'Sign-Up';
        $this->load->view('templates/header',$data);
        $this->load->view('pages/signup', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function store()
    {
        $pass = $this->input->post("password");
        $passhash = password_hash($pass, PASSWORD_DEFAULT);
        $user = array(
            "nome" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "senha" => $passhash,
            "ip" => $this->input->ip_address()
        ); 

        $data['title'] = 'Sign-Up';
        $this->load->view('templates/header',$data);
      
            $this->form_validation->set_rules('name', 'Name',
                  'required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('password', 'Senha', 'required|min_length[6]',
                   array('required' => 'Você deve preencher a %s.'));
            $this->form_validation->set_rules('passwordmatch', 'Confirmação de Senha',
                   'required|matches[password]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_message('require', 'O Campo %s e de preenchimento obrigatorio');
            $this->form_validation->set_message('is_unique', 'Email ja cadastrado');
            $this->form_validation->set_message('matches', 'Os campo de Senha precisam ser iguais');
            $this->form_validation->set_message('valid_email', 'Digite um email valido');
            $this->form_validation->set_message('min_length', 'O campo %s precisa ter pelo menos %s caracteres ');
            $this->form_validation->set_message('max_length', 'O campo %s pode ter no maximo %s caracteres ');

            if ($this->form_validation->run() == FALSE) {
                  $erros = array('mensagens' => validation_errors());
                  $this->load->view('pages/signup', $erros);
            } else {
                $erros = array('mensagens' => 'Usuario Cadastrado com sucesso');
                $this->user_model->create_user($user);
                $this->load->view('pages/login',$erros);

            }
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
            
        }
        
    }
