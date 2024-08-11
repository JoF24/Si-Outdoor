<?php

session_start();
class About extends Controller {
    public function index()
    {
        $data['judul'] = 'About';
        $data['css'] = 'about';
        $this->view('template/header',$data);
        $this->view('about/index');
        $this->view('template/footer');
    }

    public function admin()
    {
        $data['judul'] = 'SI - OUTDOOR';
        $data['css'] = 'beranda';
        $this->view('template/header',$data);
        $this->view('beranda/admin');
        $this->view('template/footer');
    }
}