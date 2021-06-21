<?php

class Petugas_model {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAllPetugas() {
        $level = 'Petugas';
        $query = 'SELECT * FROM user WHERE level=:level ORDER BY id_user DESC';
        $this->db->query($query);
        $this->db->bind('level', $level);
        return $this->db->resultSet();
    }

    public function getPetugasById($id) {
        $query = 'SELECT * FROM user WHERE id_user = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataPetugas($data) {
        $query = "INSERT INTO user 
                    VALUES 
                    ('', :username, :password, :email, :nama, :no_telp, :alamat, :level, '')";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('no_telp', $data['telp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('level', 'Petugas');
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataPetugas($id) {
        $query = "DELETE FROM user WHERE id_user = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataPetugas($data) {
        $query = "UPDATE user 
                    SET username = :username,
                        password = :password,
                        email = :email,
                        nama = :nama,
                        no_telp = :no_telp,
                        alamat = :alamat
                    WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $data['id']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['konfirmPass']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('no_telp', $data['telp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}