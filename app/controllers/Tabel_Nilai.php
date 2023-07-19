<?php




class Tabel_Nilai extends Controller {
   
    //method default
    public function index()
    {
         $data['judul'] = 'Nilai';
         $data['skor'] = $this->model('Nilai')->getAll();
         $this->view('template/header',$data);
         $this->view('template/navbar');
         $this->view('tabel_nilai/index',$data);
         $this->view('template/footer');
    }

    
    public function tambah()
    {
        if($this->model('Nilai')->tambahDataNilai($_POST) > 0)
        {
            Flasher::setFlash("nilai berhasil ","ditambahkan <div class='hit'><a href='../public/pengujian'>Lanjut Perhitungan</a> </div>", "success");
            header('Location:'. BASEURL . '/tabel_nilai');
            exit;
        }else
        {
            Flasher::setFlash("nilai berhasil ","dihapus","danger");
            header('Location:'. BASEURL . '/tabel_nilai');
            exit;
        }
        
    }

    public function getUbah()
    {
     
       //echo $_POST['id'];
    // echo $this->model('User_Pegawai')->getKaryawanById($_POST['id']);   
     echo json_encode($this->model('Nilai')->getKaryawanByNoPeg($_POST['no_peg']));    
    }


    public function hapus($no_peg)
    {
        if($this->model('Nilai')->hapusData($no_peg) > 0)
        {
            Flasher::setFlash("nilai berhasil ","dihapus", "success");
            header('Location:'. BASEURL . '/tabel_nilai');
            exit;
        }else
        {
            Flasher::setFlash("nilai gagal ","dihapus","danger");
            header('Location:'. BASEURL . '/tabel_nilai');
            exit;
        }
    }

    public function edit()
    {
        if($this->model('Nilai')->editDataNilai($_POST) > 0)
        {
            Flasher::setFlash("nilai berhasil ","diubah", "success");
            header('Location:'. BASEURL . '/tabel_nilai');
            exit;
        }else
        {
            Flasher::setFlash("data berhasil ","diubah","danger");
            header('Location:'. BASEURL . '/tabel_nilai');
            exit;
        }
    }

    public function cetak()
    {
        require_once('../tcpdf/tcpdf.php');

        $data = $this->model('Nilai')->getAll();

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('Output Data Nilai Karyawan');
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
                    <title>Data Mahasiswa</title>
                </head>
                <body>
                    <h1>Data Nilai Karyawan</h1>
                    <br>
                    <table border="1" cellpadding="5">
                            <tr>     
                                <th>No</th>  
                                <th>No_Pegawai</th>
                                <th> Absensi</th>  
                                <th>Profesionalitas</th>  
                                <th> Kerja Sama</th>  
                                <th> Tata Krama</th>  
                                <th> Kebersihan</th>  
                               
                            </tr>';
                    $i = 1;
                    foreach($data as $row){
                        $html .= '<tr>
                                    <td>'.$i++.'</td>                   
                                    <td>'.$row['no_peg'].'</td>                   
                                    <td>'.$row['ab'].'</td>                   
                                    <td>'.$row['pf'].'</td>                   
                                    <td>'.$row['ks'].'</td>                   
                                    <td>'.$row['tk'].'</td>                   
                                    <td>'.$row['kb'].'</td>                   
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
        $pdf->Output('Data_Nilai_Karyawan.pdf', 'I');

        


    }
 }