<?php

class Flasher {

    public static function setFlashLogin($pesan, $tipe) {
        $_SESSION['login'] = [
            "pesan" => $pesan,
            "tipe" => $tipe
        ]; 
    }

    public static function flashLogin() {
        if(isset($_SESSION['login'])) {
            echo '<p class="text-'.$_SESSION['login']['tipe'].' text-lg">'.$_SESSION['login']['pesan'].'</p>';
            unset($_SESSION['login']);
        }
    }
    public static function setFlash($pesan, $data, $aksi, $tipe) {
        $_SESSION['flash'] = [
            "pesan" => $pesan,
            "data" => $data,
            "aksi" => $aksi,
            "tipe" => $tipe
        ];
    }

    public static function flash() {
        if(isset($_SESSION['flash'])) {
            echo '<div class="alert alert-'.$_SESSION['flash']['tipe'].' alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Data '.$_SESSION['flash']['data'].' <strong>'.$_SESSION['flash']['pesan'].'</strong> '.$_SESSION['flash']['aksi'].'.
                </div>';
            unset($_SESSION['flash']);
        }
    }
    
   
}