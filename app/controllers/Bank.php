<?php

class Bank extends Controller {
    public function index() {
        $data['judul'] = 'Data Bank';
        $data['bank'] = $this->model('Bank_model')->getAllBank();
        $this->view('templates/header');
        if($_SESSION['level'] == 'Administrator') {
            $this->view('templates/nav-admin');
        } else {
            $this->view('templates/nav-petugas');
        }
        $this->view('bank/index', $data);
        $this->view('templates/footer');
    }

    public function tampilFormTambah() {
        $data['judul'] = 'Tambah Data Bank';
        $data['link'] = 'tambah';
        $data['id'] = 'formTambahBank';
        $data['bank'] = '';
        $this->view('templates/header');
        if($_SESSION['level'] == 'Administrator') {
            $this->view('templates/nav-admin');
        } else {
            $this->view('templates/nav-petugas');
        }
        $this->view('bank/tambah', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if($this->model('Bank_model')->tambahDataBank($_POST) > 0) {
            Flasher::setFlash('berhasil', 'bank', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/bank');
            exit();
        } else {
            Flasher::setFlash('gagal', 'bank', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/bank');
            exit();
        }
    }

    public function hapus($id) {
        $data = $this->model('Bank_model')->hapusDataBank($id);
        echo $data;
    }

    public function tampilFormUbah($id) {
        $data['judul'] = 'Ubah Data Bank';
        $data['link'] = 'ubah';
        $data['id'] = 'formUbahBank';
        $data['bank'] = $this->model('Bank_model')->getBankById($id);

        $this->view('templates/header');
        if($_SESSION['level'] == 'Administrator') {
            $this->view('templates/nav-admin');
        } else {
            $this->view('templates/nav-petugas');
        }
        $this->view('bank/tambah', $data);
        $this->view('templates/footer');
    }

    public function ubah() {
        
        if($this->model('Bank_model')->ubahDataBank($_POST) > 0) {
            Flasher::setFlash('berhasil', 'bank', 'diubah', 'success');
            header('Location: ' . BASEURL . '/bank');
            exit();
        } else {
            Flasher::setFlash('gagal', 'bank', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/bank');
            exit();
        }
    }
}