<?php


class Login extends Controller{

  private $model;

  public function __construct()
  {
    $this->model = $this->model('User_Admin');
  }

  public function index()
  {
    $data['judul'] = 'Login Page';
    $this->view('template/header',$data);
    $this->view('login/index');
    $this->view('template/footer');
    
  }



  public function cek()
  {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];

       $user = $this->model->validasiAdmin($username, $password);
        
        if($user){
          session_start();
          $_SESSION['user'] = $user;
          Flasher::setFlash("<b>Selamat Datang</b>", "<b>Admin</>", "success");
          header('Location:' . BASEURL . '/home');
          exit();
        }else{
         Flasher::setFlash("Invalid Username or Password ", " ", "danger");
        }
    }
    $this->index();
  }
}

$controller = new Login();
$controller->cek();