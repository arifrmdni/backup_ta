
<div class="container-login">
        <h1>Sistem Pendukung Keputusan</h1>
        
    <div class="row-login">
      <div class="col-login">
                <img src="http://localhost/app-demo/public/img/login_img.jpg" alt="gambar_2" width="300px" > 
      </div>
    </div>
    <div class="row-login">
      <div class="m-box">
        <?php Flasher::flash(); ?>
      </div>
     <form action="<?= BASEURL; ?>/login/cek" method="post">
        <div class="container-form">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required autocomplete="off">
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required autocomplete="off">
        </div>
        <div class="sub_container_form" style="background-color:#f1f1f1">
            <span class="psw">Forgot <a href="#">Password?</a></span>
            <button type="submit">Login</button>
            <button type="button" id="cancelbtn">Cancel</button>
          
        </div>
     </form>        

    </div>


</div>




