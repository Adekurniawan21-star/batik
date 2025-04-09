<?php 
	include 'koneksi.php';
	$id_retur = $_GET ['id_retur'];

	$koneksi->query("update retur set status='Barang diterima' where id_retur ='$id_retur'");

 ?>

 <script type="text/javascript">
 	alert("Terima barang");
 	window.location.href="halaman-akun.php";

 </script>