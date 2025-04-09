<?php 
    // mengaktifkan session pada php
    session_start();
     
    // menghubungkan php dengan koneksi database
    include 'koneksi.php';
     
    // menangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];
     
     
    // menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($koneksi,"select * from pelanggan where username='$username' and password='$password'");
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);
     
    // cek apakah username dan password di temukan pada database
    if($cek > 0){
     
        $data = mysqli_fetch_assoc($login);
 
        // buat session login dan username
        $_SESSION['id_pelanggan'] = $data['id_pelanggan'];
        // alihkan ke halaman dashboard admin
        header("location:index.php");
    }else{
        header("location:login-pelanggan.php?pesan=gagal");
    }
     
    ?>