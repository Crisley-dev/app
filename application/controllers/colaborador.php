<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador extends CI_Controller {

    public function __construct(){
        parent::__construct();
        permission();
        $this->load->model('colab_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['title'] = "Cadastro de Colaborador";
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header',$data);
        $this->load->view('pages/colaborador-form');
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function salvar()
    {
        $endereco = array('cep' => $_POST['cep'],'estado' => $_POST['estado'],'cidade' => $_POST['cidade'],'bairro' => $_POST['bairro'],'rua' => $_POST['rua'],'numero' => $_POST['numero']);
        $endereco = json_encode($endereco);

        $store = 
        [
            "nome" => $_POST['nome'],
            "sexo" => $_POST['sexo'],
            "data_nascimento" => $_POST['data_nascimento'],
            "email" => $_POST['email'],
            "telefone" => $_POST['telefone'],
            "cpf" => $_POST['cpf'],
            "tipo" => $_POST['tipo'],
            "colab_status" => $_POST['status'],
            "endereco" => $endereco
            
        ];

        $this->form_validation->set_rules('nome', 'Nome','required|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('sexo', 'Sexo', 'required|xss_clean');
        $this->form_validation->set_rules('data_nascimento','Data_Nascimento', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|is_unique[colaborador.cpf]');
        $this->form_validation->set_rules('cep', 'CEP', 'required|xss_clean');
        $this->form_validation->set_rules('estado', 'Estado', 'required|xss_clean');
        $this->form_validation->set_rules('cidade','Cidade','required|xss_clean');
        $this->form_validation->set_rules('bairro','Bairro','required|xss_clean');
        $this->form_validation->set_rules('rua','Rua','required|xss_clean');
        $this->form_validation->set_rules('numero','Numero','required|numeric|xss_clean');


        $this->form_validation->set_message('required', 'O Campo %s e de preenchimento obrigatorio');
        $this->form_validation->set_message('is_unique', 'CPF ja cadastrado');
        $this->form_validation->set_message('valid_email', 'Digite um email valido');
        $this->form_validation->set_message('min_length', 'O campo %s precisa ter pelo menos %s caracteres ');
        $this->form_validation->set_message('max_length', 'O campo %s pode ter no maximo %s caracteres ');
        $this->form_validation->set_message('numeric', 'O campo aceita apenas numeros');


  if ($this->form_validation->run() == FALSE) {
        $erros = array('mensagens' => validation_errors());
        $data['title'] = "Cadastro de Colaborador";
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header',$data);
        $this->load->view('pages/colaborador-form', $erros);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
  } else {
      
      $erros = array('mensagens' => 'Usuario Cadastrado com sucesso');
      $this->colab_model->salvar($store);
      redirect('portal/colaborador',$erros);

  }
        

    }

    
    public function edit($cpf)
    {
        
		$data['colab'] = $this->colab_model->show($cpf);
		$data['title'] = "Editar";
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header', $data);
		$this->load->view('pages/colaborador-form', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);

    }

    public function update($cpf)
    {

        $endereco = array('cep' => $_POST['cep'],'estado' => $_POST['estado'],'cidade' => $_POST['cidade'],'bairro' => $_POST['bairro'],'rua' => $_POST['rua'],'numero' => $_POST['numero']);
        $endereco = json_encode($endereco);

        $store = 
        [
            "nome" => $_POST['nome'],
            "sexo" => $_POST['sexo'],
            "data_nascimento" => $_POST['data_nascimento'],
            "email" => $_POST['email'],
            "telefone" => $_POST['telefone'],
            "cpf" => $_POST['cpf'],
            "tipo" => $_POST['tipo'],
            "colab_status" => $_POST['status'],
            "endereco" => $endereco
            
        ];

        $this->colab_model->update($cpf,$store);
        redirect("portal/colaborador");
    }


    public function inative($cpf)
    {
        $store = ["colab_status" => 'Inativo'];
        $this->colab_model->inative($cpf,$store);
        redirect("portal/colaborador");
    }


  
}
