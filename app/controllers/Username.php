<?php

class Username extends Controller {
    public function index() {
        $data = $this->model('Username_model')->cekUsernameById($_POST);
        echo json_encode($data);
    }
}