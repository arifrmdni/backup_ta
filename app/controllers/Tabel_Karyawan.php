<?php




class Tabel_Karyawan extends Controller 
{
   
    //method default
     public function index()
     {
          $data['judul'] = 'Karyawan';
          $data['kryw'] = $this->model('User_Pegawai')->getUser();
          $this->view('template/header',$data);
          $this->view('template/navbar');
          $this->view('tabel_karyawan/index',$data);
          $this->view('template/footer');
     }

    public function tambah()
    {
        if($this->model('User_Pegawai')->tambahData($_POST) > 0)
        {
            Flasher::setFlash("data berhasil ","ditambahkan", "success");
            header('Location:'. BASEURL . '/tabel_karyawan');
            exit;
        }else
        {
            Flasher::setFlash("data berhasil ","dihapus","danger");
            header('Location:'. BASEURL . '/tabel_karyawan');
            exit;
        }
        
    }

    public function getUbah()
    {
     
       //echo $_POST['id'];
    // echo $this->model('User_Pegawai')->getKaryawanById($_POST['id']);   
     echo json_encode($this->model('User_Pegawai')->getKaryawanById($_POST['id']));    
    }

    public function edit()
    {
        if($this->model('User_Pegawai')->editDataKaryawan($_POST) > 0)
        {
            Flasher::setFlash("data berhasil ","diubah", "success");
            header('Location:'. BASEURL . '/tabel_karyawan');
            exit;
        }else
        {
            Flasher::setFlash("data gagal","diubah","danger");
            header('Location:'. BASEURL . '/tabel_karyawan');
            exit;
        }
    }


    public function hapus($id)
    {
        if($this->model('User_Pegawai')->hapusData($id) > 0)
        {
            Flasher::setFlash("data berhasil ","dihapus", "success");
            header('Location:'. BASEURL . '/tabel_karyawan');
            exit;
        }else
        {
            Flasher::setFlash("data gagal ","dihapus","danger");
            header('Location:'. BASEURL . '/tabel_karyawan');
            exit;
        }
    }

    public function cetak(){
       

            require_once('../tcpdf/tcpdf.php');

            $data = $this->model('User_Pegawai')->getUser();

            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->setCreator(PDF_CREATOR);
            $pdf->setAuthor('Nicola Asuni');
            $pdf->setTitle('Output Data Karyawan');
            $pdf->setSubject('TCPDF Tutorial');
            $pdf->setKeywords('TCPDF, PDF, example, test, guide');

            $pdf->setFont('times','','11',true);
            $pdf->AddPage();

            $html=' <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Data Karyawan</title>
                    </head>
                    <body>
                        <h1>Data Karyawan</h1>
                        <br>
                        <table border="1" cellpadding="5">
                                <tr>     
                                    <th><b>No</b></th>  
                                    <th><b>Nama</b></th>
                                    <th><b>No_Pegawai</b></th>
                                    <th><b>Telpon</b></th>  
                                    <th><b>Alamat</b></th>  
                                   
                                </tr>';
                        $i = 1;
                        foreach($data as $row){
                            $html .= '<tr>
                                        <td>'.$i++.'</td>                   
                                        <td>'.$row['nama'].'</td>                   
                                        <td>'.$row['no_peg'].'</td>                   
                                        <td>'.$row['telp'].'</td>                   
                                        <td>'.$row['alamat'].'</td>                   
                                     </tr>';
                        }

                        $html .= '</table>
                    </body>
                    </html>
                  ';

            // Print text using writeHTMLCell()
            // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
            $pdf->writeHTML($html);

            // ---------------------------------------------------------

            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $pdf->Output('Output_Karyawan.pdf', 'I');


    }

    


}

