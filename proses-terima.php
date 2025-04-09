<?php 
	include 'koneksi.php';
	$id_order = $_GET ['id_order'];
	$tgl_terima = date('Y-m-d');

	$koneksi->query("update tb_order set pembayaran='Barang diterima', tgl_terima='$tgl_terima' where id_order ='$id_order'");

 ?>

 <script type="text/javascript">
 	alert("Barang diterima");
 	window.location.href="halaman-akun.php";

 </script>