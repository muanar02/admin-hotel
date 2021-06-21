<?php
class Login_model {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function cekLogin($data) {
        $query = 'SELECT * FROM user WHERE username=:username AND password=:password';
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        return $this->db->single();
    }
}