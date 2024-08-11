<?php
session_start();
class Beranda extends Controller {
    public function index()
    {
        $data['judul'] = 'SI - OUTDOOR';
        $data['css'] = 'beranda';
        $this->view('template/header',$data);
        $this->view('beranda/index');
        $this->view('template/footer');
    }

    public function login()
    {
        $data['judul'] = 'SI - OUTDOOR';
        $data['css'] = 'beranda';
        $this->view('template/header',$data);
        $this->view('beranda/login');
        $this->view('template/footer');
    }
}