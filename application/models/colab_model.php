<?php

class Colab_model extends CI_Model {
    public function index(){

       return $this->db->get("colaborador")->result_array();
    }

    public function salvar($store)
    { 
        $this->db->insert("colaborador", $store);
    }

    public function show($cpf)
    {
        return $this->db->get_where("colaborador", array(
            "cpf" => $cpf
        ))->row_array();
    }

    public function update($cpf,$store)
    {
        $this->db->where("cpf",$cpf);
        return $this->db->update("colaborador",$store);
    }

    public function inative($cpf,$store)
    {
        $this->db->where("cpf",$cpf);
        return $this->db->update("colaborador",$store);
    }
}