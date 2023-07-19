<?php

class Nilai{

  private $db;
  private $table = 'nilai';


  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAll()
  {
    $this->db->query('SELECT * FROM nilai' );
    return $this->db->ResultSet();
  }


  public function tambahDataNilai($data)
  {
    $query =  "INSERT into nilai
                VALUES
                (:no_peg,:ab,:pf,:ks,:tk,:kb)";

    $this->db->query($query);
    $this->db->bind('no_peg', $data['no_peg']);
    $this->db->bind('ab', $data['ab']);
    $this->db->bind('pf', $data['pf']);
    $this->db->bind('ks', $data['ks']);
    $this->db->bind('tk', $data['tk']);
    $this->db->bind('kb', $data['kb']);
  

    $this->db->execute();
    return $this->db->rowCount();
    
  }

  public function getKaryawanByNoPeg($no_peg)
  {
      $this->db->query('SELECT * FROM nilai WHERE no_peg=:no_peg' );
      $this->db->bind('no_peg', $no_peg);
      return $this->db->single();
  }


  public function hapusData($no_peg)
  {
    $query = "DELETE FROM karyawan WHERE no_peg = :no_peg";
    $this->db->query($query);
    $this->db->bind('no_peg', $no_peg);
    $this->db->execute();

    return $this->db->rowCount();

  }

  public function editDataNilai($data)
  {
    $query =  "UPDATE `nilai` SET 
                      `ab` = :ab,
                      `pf` = :pf,
                      `ks` = :ks,
                      `tk` = :tk,
                      `kb` = :kb
               WHERE `nilai`.`no_peg` = :no_peg";

    $this->db->query($query);
    $this->db->bind('ab', $data['ab']);
    $this->db->bind('pf', $data['pf']);
    $this->db->bind('ks', $data['ks']);
    $this->db->bind('tk', $data['tk']);
    $this->db->bind('kb', $data['kb']);
    $this->db->bind('no_peg', $data['no_peg']);
  

    $this->db->execute();
    return $this->db->rowCount();
    
  }
 

  
}