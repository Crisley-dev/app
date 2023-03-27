<?php

class Pedido_model extends CI_Model {
    public function index(){

       return $this->db->get("pedido")->result_array();
    }

    public function salvar($pedido)
    { 
        $this->db->insert("pedido", $pedido);
    }

    public function novoPedido()
    { 
        $this->db->insert("pedido");
    }

    public function show($cod)
    {
        return $this->db->get_where("pedido", array(
            "cod" => $cod
        ))->row_array();
    }

    public function update($cod, $item, $fornecedor, $produto, $preco, $quantidade, $observacao)
    {
        $json_set_query = "JSON_SET(pedido, '$[0]." . $item . "[0].fornecedor', '$fornecedor',
         '$[0]." . $item . "[0].produto', '$produto', 
         '$[0]." . $item . "[0].preco', '$preco',
         '$[0]." . $item . "[0].quantidade', '$quantidade',
         '$[0]." . $item . "[0].observacao', '$observacao')";

        $this->db->set('pedidos', $json_set_query, FALSE);
        $this->db->where('cod', $cod);
        $this->db->update('pedido');
    }

    public function new_item($cod, $new_item)
    {
        
            $this->db->set('pedidos', $new_item);
            $this->db->where('cod', $cod);
            $this->db->update('pedido');

    }



    public function delete_item($cod, $item, $fornecedor, $produto, $preco, $quantidade, $observacao)
    {
        $json_set_query = "JSON_REMOVE(pedidos, '$[0]." . $item . "')";

        $this->db->set('pedidos', $json_set_query, FALSE);
        $this->db->where('cod', $cod);
        $this->db->update('pedido');
    }

    public function showFornecedor()
    {
        $this->db->where("tipo", 'F');
        $this->db->where("colab_status",'Ativo');
        return $this->db->get('colaborador')->result_array();

    }

    public function finalize($cod,$status)
    {
        $this->db->where("cod",$cod);
        return $this->db->update("pedido",$status);
    }

    public function delete($cod)
    {
        $this->db->where("cod",$cod);
        return $this->db->delete("pedido");
    }

    public function getPedidosFinalizados() {
        $this->db->select('*');
        $this->db->from('Pedido');
        $this->db->where('pedido_status', 'Finalizado');
        $query = $this->db->get();
    
        // Retorna os resultados em formato de array
        return $query->result_array();
    }

}