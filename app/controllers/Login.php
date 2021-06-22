<?php

class Login extends Controller {
    public function index() {
        $this->view('login/index');
    }

    public function cek() {
        $data = $this->model('Login_model')->cekLogin($_POST);
        if($data) {
            $_SESSION['username'] = $data['username']; 
            if($data['level'] == 'Administrator') {
                $_SESSION['level'] = 'Administrator'; 
                header('Location: ' . BASEURL . '/');
                exit();
            } else {
                $_SESSION['level'] = 'Petugas'; 
                header('Location: ' . BASEURL . '/');
                exit();
            }
        } else {
            Flasher::setFlashLogin('Maaf login gagal, Username atau Password salah!!', 'danger');
            header('Location: ' . BASEURL . '/login');
            exit();
        }       
    }
    public function logout() {
        unset($_SESSION['username']);
        unset($_SESSION['level']);
        header('Location: ' . BASEURL . '/login');
    }
}