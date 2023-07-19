


 <div class="container">
    <div class="row">
                <div class="m-box">
                    <?php Flasher::flash(); ?>
                </div>
                <h1>Tabel Data Nilai</h1>
                <div class="alrt">
                    <p><b>Himbauan Admin :</b></p>
                    <ul>
                         <li><p>Apabila ingin menambahkan no_pegawai pastikan anda sudah menambahkan data baru di Tabel Karyawan</p></li>
                         <li><p>Jika ingin menambahkan nilai pastikan sesuaikan dengan nomor pegawai yang ingin ditambahkan</p></li>
                         <li><p>Hindari Menambahkan Nilai dengan no_pegawai yang sudah ada pada tabel</p></li>
                    </ul>
                </div>
               <button id="myBtn">Tambah Nilai</button> 
               <div class="cetak" ><a href="<?= BASEURL;?>/tabel_nilai/cetak"  target="_blank">Cetak</a></div>
               <table>
                     <tr>       
                           <th>No_Pegawai</th>
                           <th>Absensi</th>
                           <th>Profesional</th>  
                           <th>Kerja Sama</th>  
                           <th>Tata Krama</th>  
                           <th>Kebersihan</th>  
                           <th>Aksi</th>  
                     </tr>
                     <?php foreach($data['skor'] as $nil) : ?>
                           <tr>         
                              <td><?= $nil['no_peg'] ?></td>
                              <td><?= $nil['ab'] ?></td>
                              <td><?= $nil['pf'] ?></td>
                              <td><?= $nil['ks'] ?></td>
                              <td><?= $nil['tk'] ?></td>
                              <td><?= $nil['kb'] ?></td>
                              <td>
                                 <a href="#" id="editbtn" onClick=" 
                                    modal.style.display='flex';
                                    modal.children[0].style.height='500px';
                                    modal.children[0].style.margin='5% auto';
                                    modal.children[0].children[1].innerHTML ='Edit Data Nilai'; 
                                    modal.children[0].children[2].children[1].children[0].innerHTML = 'Edit Data';


                                    modal.children[0].children[2].children[0].children[0].innerHTML='';
                                    var no = document.getElementById('no_peg');
                                    no.setAttribute('type','hidden');
                                    
                                    var no_peg = this.getAttribute('data-no_peg');



                                    var xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'http://localhost/app-demo/public/Tabel_Nilai/getUbah', true);
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

                                        
                                        
                                    }
                                    };

                                    var params = 'no_peg=' + encodeURIComponent(no_peg);
                                    xhr.send(params);

                                    var contForm = document.querySelector('.modal-content');
                                    var formModal = contForm.querySelector('form');
                                    formModal.setAttribute('action','<?= BASEURL;?>/tabel_nilai/edit');



                                 
                                 " data-no_peg="<?= $nil['no_peg'] ?>">Edit Data</a>
                                  <a href="<?= BASEURL; ?> /tabel_nilai/hapus/<?= $nil['no_peg'] ?>" id="hapusbtn" onClick="return alert('Yakin ingin menhapus data?')"> Hapus</a>
                              </td>
                           </tr>
                  <?php endforeach; ?>
               </table>
            </div>
    </div>

    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>                
            <h2 id="title-form">Form Tambah Nilai</h2>
            <form action="<?= BASEURL; ?>/tabel_nilai/tambah" method="post">
             
                <div class="container-form">
                    <label for="no_peg"><b>No_Pegawai</b></label>
                    <input type="text" placeholder="Masukan No Pegawai" id="no_peg" name="no_peg" required autocomplete="off">
                    <label for="ab"><b>Absensi</b></label>
                    <input type="text" placeholder="Masukan Nilai Absensi" id="ab" name="ab" required autocomplete="off">
                    <label for="pf"><b>Profesional</b></label>
                    <input type="text" placeholder="Masukan Nilai Profesional" id="pf" name="pf" required autocomplete="off">
                    <label for="ks"><b>Kerja Sama</b></label>
                    <input type="text" placeholder="Masukan Nilai Kerja Sama" id="ks" name="ks" required autocomplete="off">
                    <label for="tk"><b>Tata Krama</b></label>
                    <input type="text" placeholder="Masukan Nilai Tata Krama" id="tk" name="tk" required autocomplete="off">
                    <label for="kb"><b>Kebersihan</b></label>
                    <input type="text" placeholder="Masukan Nilai Kebersihan" id="kb" name="kb" required autocomplete="off">
                    
                  
                </div>
                <div class="sub_container_form" id="sub_button" style="background-color:#f1f1f1">
                    <button type="submit">Tambah </button>
                    <button type="button" id="cancelbtn"  >Cancel</button>
                </div>
            </form>        
        </div>
    </div>

   

 </div>
