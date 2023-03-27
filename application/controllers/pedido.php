<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {

    public function __construct(){
        parent::__construct();
        permission();
        $this->load->model('pedido_model');
        $this->load->model("produto_model");
        $this->load->library('form_validation');
        
    }

    public function new($cod = null, $item = null)
    {
        if($cod === null && $item === null):
        $data['fornecedor'] = $this->pedido_model->showFornecedor();
        $data['produto'] = $this->produto_model->index();
        $data['title'] = "Novos Pedidos";
        $data['link'] = "Pedidos";
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header',$data);
        $this->load->view('pages/pedido-form',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        else:
            $data['fornecedor'] = $this->pedido_model->showFornecedor();
            $data['produto'] = $this->produto_model->index();
            $data['pedido_item'] = $this->pedido_model->show($cod);
            $data['title'] = "Novo Item";
            $data['link'] = "Pedidos";
            $data['add_item'] = $item;
            $this->load->view('templates/nav-menu',$data);
            $this->load->view('templates/header',$data);
            $this->load->view('pages/pedido-form',$data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        endif;
    }

    public function salvar()
    {
        $pedido = 
        [
            'pedidos' => $_POST['pedidoFinal'],
            'pedido_status' => 'Ativo'
        ];
    


        $this->pedido_model->salvar($pedido);

        $data['title'] = 'Pedidos de Compra';

       redirect('portal/pedido');
    }

    
    public function edit($cod,$item)
    {
        $data['fornecedor'] = $this->pedido_model->showFornecedor();
        $data['produto'] = $this->produto_model->index();
		$data['pedido'] = $this->pedido_model->show($cod);
        $data['link'] = "Pedidos";
        $data['item'] = $item;
		$data['title'] = "Editar Pedidos";
        $this->load->view('templates/nav-menu',$data);
        $this->load->view('templates/header', $data);
		$this->load->view('pages/edit-pedido', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);

    }

    public function update($cod,$item)
    {
        $fornecedor = $this->input->post('fornecedor');
        $produto = $this->input->post('produto');
        $preco = $this->input->post('preco');
        $quantidade = $this->input->post('quantidade');
        $observacao = $this->input->post('observacao');
        
        $this->pedido_model->update($cod,$item,$fornecedor, $produto, $preco, $quantidade, $observacao);
        redirect('portal/pedido');
    }


    public function attPedido()
    {

      
        $pedidoFinal = $this->input->post('pedido');
        $numpedidos = count($pedidoFinal[0]);
        $data['pedidoFinal'] = $pedidoFinal[0];
        $data['numpedidos'] = $numpedidos;
        

        $this->load->view('pages/lista-pedidos',$data);
            

    }

    public function add_item($cod,$item)
    {
        $fornecedor = $this->input->post('fornecedor');
        $produto = $this->input->post('produto');
        $preco = $this->input->post('preco');
        $quantidade = $this->input->post('quantidade');
        $observacao = $this->input->post('observacao');

        $item_arr = [
        "fornecedor" => $fornecedor,
        "produto" => $produto,
        "preco" => $preco,
        "quantidade" => $quantidade,
        "observacao" => $observacao
        ];

        $new_item = new stdClass();
        $new_item->fornecedor = $fornecedor;
        $new_item->produto = $produto;
        $new_item->preco = $preco;
        $new_item->quantidade = $quantidade;
        $new_item->observacao = $observacao;

        $bla = $this->pedido_model->show($cod);
        $arr = json_decode($bla['pedidos']);
        

        $objeto = $arr[0];
        $objeto->{$item} = $new_item;
        $arr[0] = $objeto;

        $json = json_encode($arr);

        $this->pedido_model->new_item($cod,$json);
 
       redirect('portal/pedido');

    }



    public function finalize($cod)
    {
    
        $status = ["pedido_status" => 'Finalizado'];
        $this->pedido_model->finalize($cod,$status);
        redirect("portal/pedido");
    }




    public function delete($cod)
    {

        $this->pedido_model->delete($cod);
        redirect("portal/pedido");
    }

    public function delete_item($cod,$item)
    {
        $fornecedor = $this->input->post('fornecedor');
        $produto = $this->input->post('produto');
        $preco = $this->input->post('preco');
        $quantidade = $this->input->post('quantidade');
        $observacao = $this->input->post('observacao');

        
        $this->pedido_model->delete_item($cod,$item,$fornecedor, $produto, $preco, $quantidade, $observacao);
        redirect('portal/pedido');
    }

    public function getPedidosFinalizados() {
    
        // Realiza a consulta no banco de dados filtrando pelos pedidos finalizados
        $pedidos = $this->pedido_model->getPedidosFinalizados();
    
        // Retorna os resultados em formato JSON
        echo json_encode($pedidos);
    }
    
    
  
    }




