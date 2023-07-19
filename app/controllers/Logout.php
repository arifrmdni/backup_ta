<?php




class Logout {

    public function index()
    {
        session_start();
        session_destroy();
        header('Location:' . BASEURL.'/login');
    }
}