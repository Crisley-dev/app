<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

    public function __construct(){
        parent::__construct();
        permission();
        $this->load->model('produto_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['title'] = "Cadastro de Produto";
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header',$data);
        $this->load->view('pages/produto-form');
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
    }

    public function salvar()
    {

        $produto = 
        [
            "nome" => $this->input->post("nome"),
            "preco" => $this->input->post("preco"),
            "descricao" => $this->input->post("descricao"),
            "quantidade" => $this->input->post("quantidade"),
            "produto_status" => "Ativo"

        ];


        $this->form_validation->set_rules('nome', 'Nome','required|min_length[2]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('preco', 'Preco', 'required|xss_clean|numeric');
        $this->form_validation->set_rules('descricao','Descricao', 'required');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required|numeric|xss_clean');



        $this->form_validation->set_message('required', 'O Campo %s e de preenchimento obrigatorio');
        $this->form_validation->set_message('numeric', 'O campo aceita apenas numeros');


  if ($this->form_validation->run() == FALSE) {
        $erros = array('mensagens' => validation_errors());
        $data['title'] = "Cadastro de Produto";
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header',$data);
        $this->load->view('pages/produto-form', $erros);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        
  } else {
      $erros = array('mensagens' => 'Produto Cadastrado com sucesso');
      $this->produto_model->salvar($produto);
      $data['title'] = "Produtos";
      $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header',$data);
        $this->load->view('pages/produto', $erros);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

  }
        

    }

    
    public function edit($cod)
    {
        
		$data['produto'] = $this->produto_model->show($cod);
		$data['title'] = "Editar Produto";
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header', $data);
		$this->load->view('pages/produto-form', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);

    }

    public function update($cod)
    {


        $produto = $_POST;
        $this->produto_model->update($cod,$produto);
        redirect("portal/produto");
    }


    public function inative($cod)
    {
        $produto = ["produto_status" => 'Inativo'];
        $this->produto_model->inative($cod,$produto);
        redirect("portal/produto");
    }


  
}
