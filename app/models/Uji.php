<?php 

class Uji{
  private $db;



  public function __construct()
  {
    $this->db = new Database;
  }


  public function getUserMix()
  {
    $this->db->query("SELECT karyawan.nama,
                             karyawan.no_peg,
                             nilai.ab,
                             nilai.pf,
                             nilai.ks,
                             nilai.tk,
                             nilai.kb
                      FROM karyawan INNER JOIN nilai ON karyawan.no_peg = nilai.no_peg");
    return $this->db->ResultSet();
  }

  public function getUserMixById($no_peg)
{
    $this->db->query("SELECT karyawan.nama,
                             karyawan.no_peg,
                             nilai.ab,
                             nilai.pf,
                             nilai.ks,
                             nilai.tk,
                             nilai.kb
                      FROM karyawan INNER JOIN nilai ON karyawan.no_peg = nilai.no_peg
                      WHERE karyawan.no_peg = :no_peg");
    $this->db->bind(':no_peg', $no_peg);
    return $this->db->single();
}




    public function editDataUji($data)
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
      $this->db->bind('no_peg', $data['no']);
    
  
      $this->db->execute();
      return $this->db->rowCount();
      
    }
}



?>