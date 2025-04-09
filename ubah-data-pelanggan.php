<?php 
    include 'koneksi.php';
    $id_pelanggan = $_POST ['id_pelanggan'];

    $sql = $koneksi->query("select * from pelanggan where id_pelanggan='$id_pelanggan'");

    $tampil = $sql->fetch_assoc();

  $nama_pelanggan    = $_POST ['nama_pelanggan'];
  $hp   = $_POST ['hp'];
  $tgl_daftar   = $_POST ['tgl_daftar'];
  $username   = $_POST ['username'];
  $password    = $_POST ['password'];
      $sql = $koneksi->query("update pelanggan set nama_pelanggan='$nama_pelanggan', hp='$hp', username='$username', password='$password', tgl_daftar='$tgl_daftar' where id_pelanggan='$id_pelanggan'"); 
      if ($sql) {
          ?>
              <script type="text/javascript">
                  alert ("Data Berhasil Diubah");
                  window.location.href="halaman-akun.php";
              </script>
          <?php
      }
?>