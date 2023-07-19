<?php


class App {
    //membuat property untuk controller
    protected $controller = "Login";
    protected $method = "index";
    protected $params = [];

    //coba app
    public function __construct()
    {
       $url = $this->parseUrl();


        //menset data url untuk controller
       if(file_exists('../app/controllers/' . $url[0] . '.php') )
       {
            $this->controller = $url[0];
            unset($url[0]);
       }
       
       //jika controlller kosong maka akan ke controller default
       

       require_once '../app/controllers/' . $this->controller . '.php';
       $this->controller = new $this->controller;


       //menset url untuk method 
       if(isset($url[1]) )
       {
        if(method_exists($this->controller, $url[1]) )
        {
            $this->method = $url[1];
            unset($url[1]);
            
        }

       }

       //menset url untuk params
       if(!empty($url) )
       {
         $this->params = array_values($url);
        
       }

       //jalankan controller dan method , params jika ada 
         call_user_func_array([$this->controller,$this->method], $this->params);

    }

    public function parseUrl()
    {
        if(isset( $_GET['url']) )
        {
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
           
            return $url;
        }
    }
}