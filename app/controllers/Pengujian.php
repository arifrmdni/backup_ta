<?php

class Pengujian extends Controller {
    
    public function index()
    {
         $data['judul'] = 'Pengujian';
         $data['kryw'] = $this->model('Uji')->getUserMix();
         $this->view('template/header',$data);
         $this->view('template/navbar');
         $this->view('pengujian/index',$data);
         $this->view('template/footer');
    }


    public function tambah()
    {
        if($this->model('User_Pegawai')->tambahData($_POST) > 0)
        {
            Flasher::setFlash("data berhasil ","ditambahkan silahkan lanjutkan mengisi data nilai sesuai no_peg", "success");
            header('Location:'. BASEURL . '/tabel_nilai');
            exit;
        }else
        {
            Flasher::setFlash("data gagal ","dihapus","danger");
            header('Location:'. BASEURL . '/pengujian');
            exit;
        }
        
    }

    public function getUbah()
    {
     
       //echo $_POST['id'];
    // echo $this->model('User_Pegawai')->getKaryawanById($_POST['id']);   
     echo json_encode($this->model('Uji')->getUserMixById($_POST['no_peg']));    
    }

    public function edit()
    {
        if($this->model('uji')->editDataUji($_POST) > 0)
        {
            Flasher::setFlash("nilai berhasil ","diubah", "success");
            header('Location:'. BASEURL . '/pengujian');
            exit;
        }else
        {
            Flasher::setFlash("data gagal ","diubah","danger");
            header('Location:'. BASEURL . '/pengujian');
            exit;
        }

        // var_dump($_POST);
    }



    public function hapus($no_peg)
    {
        if($this->model('Nilai')->hapusData($no_peg) > 0)
        {
            Flasher::setFlash("Data berhasil ","dihapus", "success");
            header('Location:'. BASEURL . '/pengujian');
            exit;
        }else
        {
            Flasher::setFlash("Data gagal ","dihapus","danger");
            header('Location:'. BASEURL . '/pengujian');
            exit;
        }
    }

    public function cetak()
    {

        require_once('../tcpdf/tcpdf.php');
        //ambil data sample
        $ds = $this->model('Uji')->getUserMix();
        $hasil= array();

        foreach($ds as $peg){
            //absensi
            if($peg['ab'] >= 85)
            {
               $bobot_ab=5;
               
            }else if($peg['ab'] >=80)
            {
               $bobot_ab=4;

            }else
            {
               $bobot_ab=3;
              
            }

            //profesional
            if($peg['pf'] >= 90)
            {
               $bobot_pf=4;
               
            }else if($peg['pf'] >=80)
            {
               $bobot_pf=3;

            }else
            {
               $bobot_pf=2;
              
            }

            //kerja sama
            if($peg['ks'] >= 85)
            {
               $bobot_ks=3;
               
            }else if($peg['ks'] >= 80)
            {
               $bobot_ks=2;

            }else
            {
               $bobot_ks=1;
              
            }

            //tatakrama
            if($peg['tk'] >= 85)
            {
               $bobot_tk=2;
               
            }else
            {
               $bobot_tk=1;
              
            }

            //kebersihan
            if($peg['kb'] >= 85)
            {
               $bobot_kb=2;
               
            }else 
            {
               $bobot_kb=1;

            }

            //memasukan jml_bobot
            //karena jumlah bobot dari sample 16 maka nilai const jml_bobot= 16
                 $jml_bobot = 16;

            
            //mendapatkan hasil perbaikan masing2 sample dengan membagi bobot dengan jml_bobot
            $final_ab = number_format($bobot_ab/$jml_bobot,3);
            $final_pf = number_format($bobot_pf/$jml_bobot,3);
            $final_ks = number_format($bobot_ks/$jml_bobot,3);
            $final_tk = number_format($bobot_tk/$jml_bobot,3);
            $final_kb = number_format($bobot_kb/$jml_bobot,3);

            //menghitung jumlah nilai perbaikan bobot
             $pb = $final_ab + $final_pf + $final_ks + $final_tk + $final_kb;

            //mennghitung nilai vektor tiap sample dengan pangkatkan hasil perbaikan bobot

            $vs= pow($peg['ab'],$final_ab) * pow($peg['pf'],$final_pf)*pow($peg['ks'],$final_ks) * pow($peg['tk'],$final_tk) * pow($peg['kb'],$final_kb);

            $isi = array(
               'nama' => $peg['nama'],
               'ab'=>$peg['ab'],
               'pf'=>$peg['pf'],
               'ks'=>$peg['ks'],
               'tk'=>$peg['tk'],
               'kb'=>$peg['kb'],
               'f_ab'=> $final_ab,
               'f_pf'=> $final_pf,
               'f_ks'=> $final_ks,
               'f_tk'=> $final_tk,
               'f_kb'=> $final_kb,
               'vs'=> $vs
            );


            array_push($hasil,$isi);

            $dataVector = array(
                                 'total_vs'=> 0,
                                );

            foreach($hasil as $items){
                $dataVector['total_vs'] += $items['vs'];
                $isi = array(  'dname' => $items['nama'],
                                'd_ab' => $items['ab'],
                                'd_pf' => $items['pf'],
                                'd_ks' => $items['ks'],
                                'd_tk' => $items['tk'],
                                'd_kb' => $items['kb'],
                               'dsv' => $items['vs']
                              
                            );

                array_push($dataVector,$isi); 
            }

            $dataRank = array();

            foreach($dataVector as $key=>$value){
                if($key === "total_vs")
                          {
                           continue;
                          }
                           $dataRank[] = array(
                                                "dname" => $value['dname'],
                                                "d_ab" => $value['d_ab'],
                                                "d_pf" => $value['d_pf'],
                                                "d_ks" => $value['d_ks'],
                                                "d_tk" => $value['d_tk'],
                                                "d_kb" => $value['d_kb'],
                                                "dsv" => $value['dsv'],
                                                "hasil" => $value["dsv"]/$dataVector["total_vs"]
                                              );

                             // Mengurutkan array secara menurun berdasarkan hasil
                             usort($dataRank, function($a, $b) 
                             {
                                return $b["hasil"] <=> $a["hasil"];
                             });

                             $peringkat = 1;
                             foreach ($dataRank as $key => &$elemen) {
                                 $elemen["peringkat"] = $peringkat;
                                 $peringkat++;
                           }

            }

        }
        

           // create new PDF document
           $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

           // set document information
           $pdf->setCreator(PDF_CREATOR);
           $pdf->setAuthor('Nicola Asuni');
           $pdf->setTitle('Output Data Perangkingan Karyawan');
           $pdf->setSubject('TCPDF Tutorial');
           $pdf->setKeywords('TCPDF, PDF, example, test, guide');

           $pdf->setFont('times','','8',true);
           $pdf->AddPage();

           $html=' <!DOCTYPE html>
           <html lang="en">
           <head>
               <meta charset="UTF-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <title>Data  Ranking Karyawan</title>
           </head>
           <body>
               <h1>Data Karyawan</h1>
               <br>
               <table border="1" cellpadding="5">
                       <tr>     
                           <th><b>No</b></th>  
                           <th><b>Nama</b></th>
                           <th><b>Absensi</b></th>
                           <th><b>Profesional</b></th>  
                           <th><b>Kerja Sama</b></th>  
                           <th><b>Tata Krama</b></th>  
                           <th><b>Kebersihan</b></th>  
                          
                       </tr>';
               $i = 1;
               foreach($ds as $data){
                   $html .= '<tr>
                               <td>'.$i++.'</td>                   
                               <td>'.$data['nama'].'</td>                   
                               <td>'.$data['ab'].'</td>                   
                               <td>'.$data['pf'].'</td>                   
                               <td>'.$data['ks'].'</td>                   
                               <td>'.$data['tk'].'</td>                   
                               <td>'.$data['kb'].'</td>                   

                            </tr>';
               }

               $html .= '</table>
                         <br>';

               $html .= ' 
               <br>
               <h1> Data Hasil Perangkingan</h1>
               <table border="1" cellpadding="5">
               <tr>      
                   <th><b>Nama</b></th>
                   <th><b>Absensi</b></th>
                   <th><b>Profesional</b></th>  
                   <th><b>Kerja Sama</b></th>  
                   <th><b>Tata Krama</b></th>  
                   <th><b>Kebersihan</b></th>  
                   <th><b>Nilai Vector</b></th>  
                   <th><b>Hasil Perangkingan Nilai Vector</b></th>
                   <th><b>Hasil Ranking</b></th>

               </tr>';

               
               foreach($dataRank as $row){
                   $html .= '<tr>
                                                  
                               <td>'.$row['dname'].'</td>                   
                               <td>'.$row['d_ab'].'</td>                   
                               <td>'.$row['d_pf'].'</td>                   
                               <td>'.$row['d_ks'].'</td>                   
                               <td>'.$row['d_tk'].'</td>                   
                               <td>'.$row['d_kb'].'</td>                   
                               <td>'.$row['dsv'].'</td>                   
                               <td>'.$row['hasil'].'</td> 
                               <td>'.$row['peringkat'].'</td> 

                            </tr>';
               }

               $html .= '</table>';

           $html .=' </body>
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