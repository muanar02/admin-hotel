<?php

class Home extends Controller {
    public function index() {
        // $data['judul'] = 'Daftar Mahasiswa';
        // $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        if($_SESSION['username']) {
            $this->view('templates/header');
            if($_SESSION['level'] == 'Administrator') {
                $this->view('templates/nav-admin');
            } else {
                $this->view('templates/nav-petugas');
            }
            $this->view('home/index');
            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/login');
        }
    }
}