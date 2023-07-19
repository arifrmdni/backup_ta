<?php

class Home extends Controller {
   
   //method default
    public function index()
    {
         $data['judul'] = 'Home';
         $data['kryw'] = $this->model('User_Pegawai')->getUserMix();
         $this->view('template/header',$data);
         $this->view('template/navbar');
         $this->view('Home/index',$data);
         $this->view('template/footer');
    }
    public function detail($id)
    {
         $data['judul'] = 'Home';
         $data['kryw'] = $this->model('User_Pegawai')->getKaryawanById($id);
         $this->view('template/header',$data);
         $this->view('template/navbar');
         $this->view('Home/detail',$data);
         $this->view('template/footer');
    }
}