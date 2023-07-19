

 <div class="container">
    <div class="row">
                <div class="m-box">
                    <?php Flasher::flash(); ?>
                </div>
                <h1>Tabel Karyawan</h1> 
               <button id="myBtn">Tambah Data</button>  
               <div class="cetak" ><a href="<?= BASEURL;?>/tabel_karyawan/cetak"  target="_blank">Cetak</a></div>
               <table>
                     <tr>       
                           <th>Nama</th>
                           <th>No_Pegawai</th>
                           <th>Telpon</th>  
                           <th>Alamat</th>  
                           <th>Aksi</th>  
                     </tr>
                     <?php foreach($data['kryw'] as $peg) : ?>
                           <tr>         
                              <td><?= $peg['nama'] ?></td>
                              <td><?= $peg['no_peg'] ?></td>
                              <td><?= $peg['telp'] ?></td>
                              <td><?= $peg['alamat'] ?></td>
                              <td>
                                 <a href="#" id="editbtn" onClick=" 
                                    modal.style.display='block';
                                    modal.children[0].style.height='500px';
                                    modal.children[0].style.margin='5% auto';
                                    modal.children[0].children[1].innerHTML ='Edit Data Karyawan'; 
                                    
                                    modal.children[0].children[2].children[2].children[0].innerHTML = 'Edit';
                                    


                                    var id = this.getAttribute('data-id');

                                    var xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'http://localhost/app-demo/public/tabel_karyawan/getUbah', true);
                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                    xhr.onreadystatechange = function() {
                                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                        var data = JSON.parse(xhr.responseText);
                                        var nama = document.getElementById('nama');
                                        nama.value = data.nama;
                                        var no_peg = document.getElementById('no_peg');
                                        no_peg.value = data.no_peg;
                                        var telp = document.getElementById('telp');
                                        telp.value = data.telp;
                                        var alamat = document.getElementById('almt');
                                        alamat.value = data.alamat;
                                        var id = document.getElementById('id');
                                        id.value = data.id;
                                        
                                    }
                                    };

                                    var params = 'id=' + encodeURIComponent(id);
                                    xhr.send(params);

                                    var contForm = document.querySelector('.modal-content');
                                    var formModal = contForm.querySelector('form');
                                    formModal.setAttribute('action','<?= BASEURL;?>/tabel_karyawan/edit');



                                 
                                 " data-id="<?= $peg['id'] ?>">Edit Data</a>
                                  <a href="<?= BASEURL; ?> /tabel_karyawan/hapus/<?= $peg['id'] ?>" id="hapusbtn" onClick="return alert('Yakin ingin menhapus data?')"> Hapus</a>
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
            <h2 id="title-form">Form Register Karyawan</h2>
            <form action="<?= BASEURL; ?>/tabel_karyawan/tambah" method="post">
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
                    <button type="submit">Tambah </button>
                    <button type="button" id="cancelbtn"  >Cancel</button>
                </div>
            </form>        
        </div>
    </div>

   

 </div>
