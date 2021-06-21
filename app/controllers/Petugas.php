<?php

class Petugas extends Controller {
    public function index() {
        $data['judul'] = 'Data Petugas';
        $data['petugas'] = $this->model('Petugas_model')->getAllPetugas();
        $this->view('templates/header');
        if($_SESSION['level'] == 'Administrator') {
            $this->view('templates/nav-admin');
        } else {
            $this->view('templates/nav-petugas');
        }
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }

    public function tampilFormTambah() {
        $data['judul'] = 'Tambah Data Petugas';
        $data['link'] = 'tambah';
        $data['petugas'] = '';
        $this->view('templates/header');
        if($_SESSION['level'] == 'Administrator') {
            $this->view('templates/nav-admin');
        } else {
            $this->view('templates/nav-petugas');
        }
        $this->view('petugas/tambah', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if($this->model('Petugas_model')->tambahDataPetugas($_POST) > 0) {
            Flasher::setFlash('berhasil', 'petugas', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/petugas');
            exit();
        } else {
            Flasher::setFlash('gagal', 'petugas', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/petugas');
            exit();
        }
    }

    public function hapus($id) {
        $data = $this->model('Petugas_model')->hapusDataPetugas($id);
        echo $data;
    }
    public function tampilFormUbah($id) {
        $data['judul'] = 'Ubah Data Petugas';
        $data['link'] = 'ubah';
        $data['petugas'] = $this->model('Petugas_model')->getPetugasById($id);

        $this->view('templates/header');
        if($_SESSION['level'] == 'Administrator') {
            $this->view('templates/nav-admin');
        } else {
            $this->view('templates/nav-petugas');
        }
        $this->view('petugas/tambah', $data);
        $this->view('templates/footer');
    }

    public function ubah() {
        
        if($this->model('Petugas_model')->ubahDataPetugas($_POST) > 0) {
            Flasher::setFlash('berhasil', 'petugas', 'diubah', 'success');
            header('Location: ' . BASEURL . '/petugas');
            exit();
        } else {
            Flasher::setFlash('gagal', 'petugas', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/petugas');
            exit();
        }
    }

}