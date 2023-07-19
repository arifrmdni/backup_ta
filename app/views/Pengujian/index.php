


      
      <div class="container">

         <div id="row_uji">
            <span class="close_about" >&times;</span>  
            <div class="about">
               <h2>Penjelasan Skema Perhitungan WP <i>(Weight Product)</i> </h2>
               <p>Skala Penilaian Karyawan diambil dari beberapa Kriteria sebagai berikut:</p>
               <table cellpadding="10" style="text-align:center">
                  <tr>
                     <td><b>Kriteria</b></td>
                     <td><b>Nilai Bobot</b></td>
                     <td><b>Total Nilai Bobot</b></td>
                  </tr>
                  <tr>
                     <td>Absensi</td>
                     <td>5</td>
                     <td rowspan="5"><b>16</b></td>
                  </tr>
                  <tr>
                     <td>Profesional</td>
                     <td>4</td>
                  </tr>
                  <tr>
                     <td>Kerja Sama</td>
                     <td>3</td>
              
                  </tr>
                  <tr>
                     <td>Tata Krama</td>
                     <td>2</td>
                  </tr>
                  <tr>
                     <td>Kebersihan</td>
                     <td>2</td>
                  </tr>
                  
               </table>
               <p>Detail  Nilai Pembobotan  tiap Data Sample</p>
               <div class="table-about">
                     <table>
                        <tr>
                           <th>Kriteria Penilaian</th>
                           <th>Nilai Bobot</th>
                           <th>Keterangan</th>
                        </tr>
                        <tr>
                           <td rowspan="3">Absensi</td>
                           <td>5</td>
                           <td><b> Sangat baik , jika nilai  >= 90</b></td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td><b>Baik, jika nilai >= 80</b></td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td><b>Cukup, jika nilai >= 70</b></td>
                        </tr>
                        <tr>
                           <td rowspan="3">Profesional</td>
                           <td>4</td>
                           <td><b>Sangat Baik, jika nilai  >= 90</b></td>
                        </tr>
                        <tr>
                    
                           <td>3</td>
                           <td><b> Baik, jika nilai >= 80</b></td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td><b>Cukup, jika nilai >= 70</b></td>
                        </tr>
                        <tr>
                           <td rowspan="3">Kerja Sama</td>
                           <td>4</td>
                           <td><b>Sangat Baik, jika nilai  >= 90</b></td>
                        </tr>
                        <tr>
                    
                           <td>3</td>
                           <td><b>Baik, jika nilai >= 80</b></td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td><b>Cukup, jika nilai >= 70</b></td>
                        </tr>
                        <tr>
                           <td rowspan="2">Tata Krama</td>
                           <td>2</td>
                           <td><b>Sangat baik, jika nilai  >= 90</b></td>
                        </tr>
                        <tr>
                    
                           <td>1</td>
                           <td><b>Baik, jika nilai < 80</b></td>
                        </tr>
                        <tr>
                           <td rowspan="3">Kebersihan</td>
                           <td>2</td>
                           <td><b>Sangat baik, jika nilai  >= 90</b></td>
                        </tr>
                        <tr>
                    
                           <td>1</td>
                           <td><b> Baik, jika nilai >= 75</b></td>
                        </tr>
                     </table>
               </div>
            </div>
         </div>

         <div class="row2_uji">
            <?php Flasher::flash(); ?>
            <div class="col-uji">
               <h2>Data Sample Uji</h2>
               <button id="myBtn">
                                   Tambah Data
               </button>
               
               <table>
                     <tr>       
                           <th>Nama</th>
                           <th>Absensi</th>
                           <th>Profesional</th>  
                           <th>Kerja Sama</th>  
                           <th>Tata Krama</th>  
                           <th>Kebersihan</th>
                           <th>Aksi</th>  
                     </tr>
                     <?php foreach($data['kryw'] as $peg) : ?>
                           <tr>         
                              <td><?= $peg['nama'] ?></td>
                              <td><?= $peg['ab'] ?></td>
                              <td><?= $peg['pf'] ?></td>
                              <td><?= $peg['ks'] ?></td>
                              <td><?= $peg['tk'] ?></td>
                              <td><?= $peg['kb'] ?></td>
                              <td>
                              <a href="#" id="editbtn" onClick=" 
                                    modal.style.display='block';
                                    modal.children[0].style.height='500px';
                                    modal.children[0].style.margin='5% auto';
                                    modal.children[0].children[1].innerHTML ='Edit Nilai';
                                   
                                    var no = document.getElementById('id');
                                    no.setAttribute('id','no');
                                    no.setAttribute('name','no');
                                    no.setAttribute('type','hidden');
                                    
                                    
                                   
                              

                                    modal.children[0].children[2].children[1].children[0].innerHTML = '<b>Absensi</b>';
                                    modal.children[0].children[2].children[1].children[0].setAttribute('for','ab');
                                    var ab = document.getElementById('nama');
                                    ab.setAttribute('name', 'ab');
                                    ab.setAttribute('id','ab');


                                    modal.children[0].children[2].children[1].children[2].innerHTML = '<b>Profesional</b>';
                                    modal.children[0].children[2].children[1].children[2].setAttribute('for','pf');
                                    var pf = document.getElementById('no_peg');
                                    pf.setAttribute('name', 'pf');
                                    pf.setAttribute('id','pf');
                                    
                                    modal.children[0].children[2].children[1].children[4].innerHTML = '<b>Kerja Sama</b>';
                                    modal.children[0].children[2].children[1].children[4].setAttribute('for','ks');
                                    var ks = document.getElementById('telp');
                                    ks.setAttribute('name', 'ks');
                                    ks.setAttribute('id','ks');

                                    modal.children[0].children[2].children[1].children[6].innerHTML = '<b>Tata Krama</b>';
                                    modal.children[0].children[2].children[1].children[6].setAttribute('for','tk');
                                    var tk = document.getElementById('almt');
                                    tk.setAttribute('name', 'tk');
                                    tk.setAttribute('id','tk');
                                    
                                 
                                 
                                    var a = modal.children[0].children[2].children[1];

                                    // Membuat elemen baru
                                    var newElement = document.createElement('label');
                                    newElement.textContent = 'kb';
                                    newElement.setAttribute('for','kb');
                                    newElement.innerHTML= '<b>kb</b>';

                                    // Menambahkan elemen baru ke dalam elemen induk
                                    a.appendChild(newElement);

                                    // Membuat elemen input
                                    var newElement2 = document.createElement('input');
                                    newElement2.setAttribute('type','text');
                                    newElement2.setAttribute('name','kb');
                                    newElement2.setAttribute('id','kb');

                                    // Menambahkan elemen baru ke dalam elemen induk
                                    a.appendChild(newElement2);

                                   

                                    modal.children[0].children[2].children[2].children[0].innerHTML = 'Edit'; 

                                    var no_peg = this.getAttribute('data-no');

                                    var xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'http://localhost/app-demo/public/pengujian/getUbah', true);
                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                    xhr.onreadystatechange = function() {
                                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                        var data = JSON.parse(xhr.responseText);
                                        
                                        var ab =  document.getElementById('ab');
                                        ab.value= data.ab;
                                        var pf =  document.getElementById('pf');
                                        pf.value= data.pf;
                                        var ks =  document.getElementById('ks');
                                        ks.value= data.ks;
                                        var tk =  document.getElementById('tk');
                                        tk.value= data.tk;
                                        var kb =  document.getElementById('kb');
                                        kb.value= data.kb;
                                        no.value= data.no_peg;

                                   ;
                                        
                                        
                                        
                                    }
                                    };

                                    var params = 'no_peg=' + encodeURIComponent(no_peg);
                                    xhr.send(params);

                                    var contForm = document.querySelector('.modal-content');
                                    var formModal = contForm.querySelector('form');
                                    formModal.setAttribute('action','<?= BASEURL;?>/pengujian/edit');

                                 " data-no=<?= $peg['no_peg'] ?>>Edit Data</a>
                                 <a href="<?= BASEURL; ?> /pengujian/hapus/<?= $peg['no_peg'] ?>" id="hapusbtn" onClick="return alert('Yakin ingin menhapus data?')"> Hapus</a>
                              </td>
                           </tr>
                  <?php endforeach; ?>
               </table>
               <div class="sub_button_pengujian">
                  <button  id="btn_uji">Mulai Uji</button>
               </div>
            </div>

                           

            <div id="col2_uji">
               <hr>  
               <h3>Langkah 1. Pembobotan Data & Menghitung Vektor Sample</h3>
               <table>
                     <tr>       
                           <th>Nama</th>
                           <th>Absensi</th>
                           <th>Profesional</th>  
                           <th>Kerja Sama</th>  
                           <th>Tata Krama</th>  
                           <th>Kebersihan</th>  
                        
                     </tr>
                     <?php 
                           $hasil=array();
                           foreach($data['kryw'] as $peg) : ?>
                        <?php 

                           

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
                              'ab'=> $final_ab,
                              'pf'=> $final_pf,
                              'ks'=> $final_ks,
                              'tk'=> $final_tk,
                              'kb'=> $final_kb,
                              'pb' => $pb,
                              'vs'=> $vs
                           );
                           array_push($hasil,$isi);
                          
                           
                           
                           ?>
                            <tr>
                              <td><?= $peg['nama'] ?></td>
                              <td><?= $bobot_ab ?></td>
                              <td><?= $bobot_pf ?></td>
                              <td><?= $bobot_ks ?></td>
                              <td><?= $bobot_tk ?></td>
                              <td><?= $bobot_kb ?></td>
                            </tr>
                  <?php endforeach; ?>
                  
               </table>
               <button id="lanjut"> Lanjut </button>
               
               
               <?php 
                     function convertToThreeDecimals(&$item, $key) {
                        if (is_array($item)) {
                            array_walk_recursive($item, 'convertToThreeDecimals');
                        } else if (is_float($item)) {
                            $item = number_format($item, 3);
                        }
                    }
                    
                    array_walk_recursive($hasil, 'convertToThreeDecimals');
                    
                  
                  ?>
               <div id="p_bt">
                                 <br>
                                 <h2>Perbaikan Pembobotan & Pengambilan Nilai Vector</h2>
                                 <table>
                                       <tr>
                                             <th>Nama</th>
                                             <th>Absensi</th>
                                             <th>Profesional</th>  
                                             <th>Kerja Sama</th>  
                                             <th>Tata Krama</th>  
                                             <th>Kebersihan</th>  
                                             <th>Nilai Vector S </th>  
                                       
                                       </tr>
                                       <?php foreach($hasil as $isi):?>
                                          <tr>
                                                <td><?= $isi['nama'] ?></td>
                                                <td><?= $isi['ab'] ?></td>
                                                <td><?= $isi['pf'] ?></td>
                                                <td><?= $isi['ks'] ?></td>
                                                <td><?= $isi['tk'] ?></td>
                                                <td><?= $isi['kb'] ?></td>
                                                <td><?= $isi['vs'] ?></td>
                                                
                                          </tr>
                                          <?php endforeach; ?>
                                 </table>
                                 <button id="lanjut_2"> Lanjut </button>
               </div>
            </div>
           


            
            <div id="col3_uji">
            <hr>
               <h2>Langkah 2. Total Nilai Vector  </h2>
            <table>
                     <tr>       
                           <th>Nama</th>
                           <th>Hasil Setiap Vector</th> 
                     </tr>
                     <?php 
                        $dataVector = array(
                                            'total_vs'=> 0,
                                          );
                        foreach($hasil as $items) : ?>
                        <?php  
                           $dataVector['total_vs'] += $items['vs'];

                           $isi = array(  'dname' => $items['nama'],
                                          'dsv' => $items['vs']
                                         
                                       );

                           array_push($dataVector,$isi); 
                        ?>

                           <tr>         
                              <td><?= $items['nama'] ?></td>
                              <td><?= $items['vs'] ?></td>
                              </td>
                           </tr>
                  <?php endforeach; ?>
                        
                           <tr>
                              <td colspan="2" style="text-align:center"><?= "<b>Total Vector</b> =   " . $dataVector['total_vs']?></td>
                           </tr>
               </table>
               <button id="lanjut_3"> Lanjut</button>
            </div>

            <div id="col4_uji">
               <hr>
               <h2>Langkah 3. Perangkingan </h2>
            <table>
                     <tr>       
                           <th>Nama</th>
                           <th>Hasil Perhitungan</th>
                           <th>Hasil Rangking</th> 
                     </tr>
                     <?php 
                       $dataRank = array();
                        foreach($dataVector as $key=>$value) : ?>
                        <?php
                          if($key === "total_vs")
                          {
                           continue;
                          }
                           $dataRank[] = array(
                                                "dname" => $value['dname'],
                                                "hasil" => $value["dsv"]/$dataVector["total_vs"]
                                              );

                     ?>
                        <?php endforeach; 
                          // Mengurutkan array secara menurun berdasarkan hasil
                              usort($dataRank, function($a, $b) {
                                 return $b["hasil"] <=> $a["hasil"];
                           });
                           
                           // Menambahkan peringkat pada setiap elemen array
                           $peringkat = 1;
                           foreach ($dataRank as $key => &$elemen) {
                                 $elemen["peringkat"] = $peringkat;
                                 $peringkat++;
                           }
                                                  
                        ?>
                        <?php foreach($dataRank as $data): ?>
                           <tr>       
                              <td><?= $data['dname']?></td>
                              <td><?= $data['hasil']?></td>
                              <td><?= $data['peringkat']?></td>
                           </tr>
                        <?php endforeach; ?>
               </table>
               <div class="cetak" ><a href="<?= BASEURL;?>/pengujian/cetak"  target="_blank">Cetak</a></div>
            </div>
         </div>


         <div id="myModal" class="modal">
        <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>                
            <h2 id="title-form">Form Tambah Karyawan</h2>
            <form action="<?= BASEURL; ?>/pengujian/tambah" method="post">
             <input type="hidden" name="id" id="id">
                <div class="container-form">
                    <label for="nama"><b>Nama</b></label>
                    <input type="text" placeholder="Masukan Nama" id="nama" name="nama" required autocomplete="off">
                    <label for="no_peg"><b>No_Pegawai</b></label>
                    <input type="text" placeholder="Masukan Nomor Pegawai" id="no_peg" name="no_peg" required autocomplete="off">
                    <label for="tlp"><b>Telpon</b></label>
                    <input type="text" placeholder="Masukan Nomor Telepon" id="telp" name="telp" required autocomplete="off">
                    <label for="almt"><b>Alamat</b></label>
                    <input type="text" placeholder="Masukan Alamat anda" id="almt" name="almt" required autocomplete="off">

                </div>
                <div class="sub_container_form" id="sub_button" style="background-color:#f1f1f1">
                    <button type="submit" onClick="modal.style.display='block';">Tambah </button>
                    <button type="button" id="cancelbtn"  >Cancel</button>
                </div>
            </form>        
          </div>
         </div>
      </div>
     
         

