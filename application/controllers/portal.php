<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

    public function __construct(){
        parent::__construct();
        permission();
        $this->load->model("colab_model");
        $this->load->model("produto_model");
        $this->load->model("pedido_model");
    }
    public function index(){
        $data['title'] = "Portal";
        $data['link'] = "Portal";
        $data['store'] = $this->colab_model->index();
        $data['produto'] = $this->produto_model->index();
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header',$data);
        $this->load->view('pages/portal',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    public function colaborador(){
        $data['title'] = "Colaborador";
        $data['link'] = "Colaborador";
        $data['store'] = $this->colab_model->index();
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header',$data);
        $this->load->view('pages/colaborador',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    public function produto(){
        $data['title'] = "Produtos";
        $data['link'] = "Produtos";
        $data['produto'] = $this->produto_model->index();
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header',$data);
        $this->load->view('pages/produto',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    public function pedido(){
        $data['title'] = "Pedidos";
        $data['link'] = "Pedidos";
        $data['pedido'] = $this->pedido_model->index();
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header',$data);
        $this->load->view('pages/pedido',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }
}