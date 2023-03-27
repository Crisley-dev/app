<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

    public function __construct(){
        parent::__construct();
        permission();
        $this->load->model('colab_model');
    }

    public function index(){
        $data['title'] = "Cadastro";
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

        $this->colab_model->salvar($store);
        redirect('cadastro');
        

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


    public function delete($cpf)
    {
        $this->colab_model->destroy($cpf);
        redirect("colaborador");
    }


  
}
