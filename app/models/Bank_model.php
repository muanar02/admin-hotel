<?php

class Bank_model {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAllBank() {
        $query = 'SELECT * FROM bank ORDER BY id_bank DESC';
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getBankById($id) {
        $query = 'SELECT * FROM bank WHERE id_bank = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataBank($data) {
        $query = "INSERT INTO bank 
                    VALUES 
                    ('', :bank, :norek, :nama_nas)";
        $this->db->query($query);
        $this->db->bind('bank', $data['bank']);
        $this->db->bind('norek', $data['norek']);
        $this->db->bind('nama_nas', $data['nama']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataBank($id) {
        $query = "DELETE FROM bank WHERE id_bank = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataBank($data) {
        $query = "UPDATE bank 
                    SET bank = :bank,
                        norek = :norek,
                        nama_nas = :nama
                    WHERE id_bank = :id_bank";
        $this->db->query($query);
        $this->db->bind('id_bank', $data['id']);
        $this->db->bind('bank', $data['bank']);
        $this->db->bind('norek', $data['norek']);
        $this->db->bind('nama', $data['nama']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}