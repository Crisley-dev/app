<?php

class Login_model extends CI_Model {

    public function store($email,$password)
    {
        $this->db->where("email",$email);
        $this->db->where("senha",$password);
        $user = $this->db->get("users")->row_array();
        return $user;

    }
}