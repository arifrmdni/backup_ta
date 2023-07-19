<?php

class Flasher {

    public static function setFlash($pesan, $aksi , $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe,
            'uji' => $uji
        ];
    }

    public static function flash()
    {
        if( isset($_SESSION['flash']) )
      
        {
            echo'<div class="alert-'.$_SESSION['flash']['tipe'].'">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
                    '.$_SESSION['flash']['pesan'].' ,'.$_SESSION['flash']['aksi'].' 
                </div>';
            unset($_SESSION['flash']);
        }
    }
}