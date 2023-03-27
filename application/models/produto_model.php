<?php

class Produto_model extends CI_Model {
    public function index(){

       return $this->db->get("produto")->result_array();
    }

    public function salvar($produto)
    { 
        $this->db->insert("produto", $produto);
    }

    public function show($cod)
    {
        return $this->db->get_where("produto", array(
            "cod" => $cod
        ))->row_array();
    }

    public function update($cod,$produto)
    {
        $this->db->where("cod",$cod);
        return $this->db->update("produto",$produto);
    }

    public function inative($cod,$produto)
    {
        $this->db->where("cod",$cod);
        return $this->db->update("produto",$produto);
    }
}