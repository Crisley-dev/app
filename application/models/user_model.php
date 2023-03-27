<?php
class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_user_by_email($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row();
    }
    
    public function get_user_by_ip($ip) {
        $query = $this->db->get_where('users', array('ip' => $ip));
        return $query->row();
    }
    
    public function create_user($data) {
        $this->db->insert('users', $data);
    }
    
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function block_ip($ip) {
        $data = array(
            'bloqueado' => 1,
            'data_bloqueio' => date('Y-m-d H:i:s')
        );
        $this->db->where('ip', $ip);
        $this->db->update('users', $data);
    }
    
    public function increment_attempts($ip) {
        $user = $this->get_user_by_ip($ip);
        if ($user) {
            $data = array(
                'tentativas' => $user->tentativas + 1
            );
            $this->update_user($user->id, $data);
        }
    }
    
    public function reset_attempts($ip) {
        $user = $this->get_user_by_ip($ip);
        if ($user) {
            $data = array(
                'tentativas' => 0,
                'bloqueado' => 0,
                'data_bloqueio' => NULL
            );
            $this->update_user($user->id, $data);
        }
    }

    
  
}