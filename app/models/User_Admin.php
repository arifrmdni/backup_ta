<?php

class User_Admin{

  private $db;


  public function __construct()
  {
    $this->db = new Database;
  }

  
  public function validasiAdmin($username,$password)
  {
    $query = "SELECT * FROM admin WHERE username= :username AND password= :password";
    $this->db->query($query);
    $this->db->bind('username', $username);
    $this->db->bind('password', $password);
    $this->db->execute();

    return $this->db->ResultSet();
  }

  
}