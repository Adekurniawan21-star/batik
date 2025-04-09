<!-- navbar bottom -->
<div style="padding: 20px 20px; background-color: #fff; overflow: hidden; position: fixed; bottom: 0; width: 100%; box-shadow: 0 -5px 10px 0 rgba(0, 0, 0, 0.4);">
  <div class="bawah" style="display: flex; justify-content: space-between;">
    <a href="javascript:void(0)" class="header-action-btn header-action-btn-search" style="text-decoration: none; display: flex; flex-direction: column; text-align: center; color: purple;"><i style="font-size: 16px;" class="fa-solid fa-search"></i><font style="font-size: 10px;">Pencarian Produk</font></a>
    <a href="index.php" style="text-decoration: none; display: flex; flex-direction: column; text-align: center; color: green;"><i style="font-size: 16px;" class="fa-solid fa-home"></i><font style="font-size: 10px;">Halaman Awal</font></a>
    <?php 
    $jumlahsesion = mysqli_num_rows($sqlsesion);
        if ($jumlahsesion > 0) { 
    ?>
    <a href="halaman-akun.php" style="text-decoration: none; display: flex; flex-direction: column; text-align: center; color: #000;"><i style="font-size: 16px;" class="fa-solid fa-user"></i><font style="font-size: 10px;"><?php echo $data_sesion['nama_pelanggan'] ?></font></a>

    <?php }else{ ?>

    <a href="login-pelanggan.php" style="text-decoration: none; display: flex; flex-direction: column; text-align: center; color: red;"><i style="font-size: 20px;" class="fa-solid fa-user"></i><font style="font-size: 10px;">Login Pelanggan</font></a>

    <a href="http://localhost/Program_Butiq/login.php" style="text-decoration: none; display: flex; flex-direction: column; text-align: center; color: blue;"><i style="font-size: 20px;" class="fa-solid fa-user"></i><font style="font-size: 10px;">Login Admin</font></a>

    <?php } ?>
  </div>
</div>