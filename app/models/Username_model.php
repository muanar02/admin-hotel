<?php

class Username_model {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }

    public function cekUsernameById($data) {
        $query = 'SELECT * FROM user WHERE username = :username';
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        return $this->db->single();
    }
}