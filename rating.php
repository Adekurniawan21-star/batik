<?php
error_reporting(0);
  include 'koneksi.php';
  $id_order = $_GET['id_order'];
  $login = mysqli_query($koneksi,"select * from ulasan where id_order='$id_order'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
$tampil = mysqli_fetch_assoc($login);
  if ($cek > 0) { 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style type="text/css">
      body {
        text-align: center;
        padding-top: 150px;
      }
      .rating {
        display: inline-block;
        position: relative;
        height: 50px;
        line-height: 50px;
        font-size: 32px;
      }

      .rating label {
        position: absolute;
        top: 0;
        left: 50;
        height: 100%;
        cursor: pointer;
      }

      .rating label:last-child {
        position: static;
      }

      .rating label:nth-child(1) {
        z-index: 5;
      }

      .rating label:nth-child(2) {
        z-index: 4;
      }

      .rating label:nth-child(3) {
        z-index: 3;
      }

      .rating label:nth-child(4) {
        z-index: 2;
      }

      .rating label:nth-child(5) {
        z-index: 1;
      }

      .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
      }

      .rating label .icon {
        float: left;
        color: transparent;
      }

      .rating label:last-child .icon {
        color: #000;
      }

      .rating:not(:hover) label input:checked ~ .icon,
      .rating:hover label:hover input ~ .icon {
        color: #ffff66;
      }

      .rating label input:focus:not(:checked) ~ .icon:last-child {
        color: #000;
        text-shadow: 0 0 5px #ffff66;
      }
      
      textarea {
        font-size: 12px;
        width: 220px;
        height: 100px;
      }
    </style>
</head>
<body>
  <h3>Rating sudah terisi, terima kasih</h3>
<form class="rating" method="POST">
  <div>
    <label>
      <input type="radio" name="rating" value="1" <?php echo ($tampil['rating'] == 1) ?  "checked" : "" ;  ?>>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
    </label>
    <label>
      <input type="radio" name="rating" value="2" <?php echo ($tampil['rating'] == 2) ?  "checked" : "" ;  ?>>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
    </label>
    <label>
      <input type="radio" name="rating" value="3" <?php echo ($tampil['rating'] == 3) ?  "checked" : "" ;  ?>>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
    </label>
    <label>
      <input type="radio" name="rating" value="4" <?php echo ($tampil['rating'] == 4) ?  "checked" : "" ;  ?>>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
    </label>
    <label>
      <input type="radio" name="rating" value="5" <?php echo ($tampil['rating'] == 5) ?  "checked" : "" ;  ?>>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
    </label>
  </div>
  <div>
    <textarea name="ulasan"><?php echo $tampil['ulasan']; ?></textarea>
  </div>
  <a href="halaman-akun.php" class="btn btn-outline-primary" style="padding: 5px 45px;">Kembali</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>



<?php }else{ ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style type="text/css">
      body {
        text-align: center;
        padding-top: 150px;
      }
      .rating {
        display: inline-block;
        position: relative;
        height: 50px;
        line-height: 50px;
        font-size: 32px;
      }

      .rating label {
        position: absolute;
        top: 0;
        left: 50;
        height: 100%;
        cursor: pointer;
      }

      .rating label:last-child {
        position: static;
      }

      .rating label:nth-child(1) {
        z-index: 5;
      }

      .rating label:nth-child(2) {
        z-index: 4;
      }

      .rating label:nth-child(3) {
        z-index: 3;
      }

      .rating label:nth-child(4) {
        z-index: 2;
      }

      .rating label:nth-child(5) {
        z-index: 1;
      }

      .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
      }

      .rating label .icon {
        float: left;
        color: transparent;
      }

      .rating label:last-child .icon {
        color: #000;
      }

      .rating:not(:hover) label input:checked ~ .icon,
      .rating:hover label:hover input ~ .icon {
        color: #ffff66;
      }

      .rating label input:focus:not(:checked) ~ .icon:last-child {
        color: #000;
        text-shadow: 0 0 5px #ffff66;
      }
      
      textarea {
        font-size: 12px;
        width: 220px;
        height: 100px;
      }
    </style>
</head>
<body>
<form class="rating" method="POST">
  <div>
    <label>
      <input type="radio" name="rating" value="1">
      <span class="icon"><i class="fa-solid fa-star"></i></span>
    </label>
    <label>
      <input type="radio" name="rating" value="2">
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
    </label>
    <label>
      <input type="radio" name="rating" value="3">
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
    </label>
    <label>
      <input type="radio" name="rating" value="4">
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
    </label>
    <label>
      <input type="radio" name="rating" value="5">
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
      <span class="icon"><i class="fa-solid fa-star"></i></span>
    </label>
  </div>
  <div>
    <textarea name="ulasan" placeholder="Tulis komentar . . ."></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-outline-primary" style="padding: 5px 45px;">Kirim</button>
</form>
<?php
  $id_order    = $_GET ['id_order'];
  $rating   = $_POST ['rating'];
  $ulasan   = $_POST ['ulasan'];
  if (isset($_POST['submit']))  {
      $sql      = $koneksi->query("insert into ulasan (id_order, rating, ulasan)
                  values('$id_order', '$rating', '$ulasan')"); 
  if ($sql) {
?>
  <script type="text/javascript">
      alert ("Data Berhasil Disimpan");
      window.location.href="halaman-akun.php";
  </script>
<?php
                }
                }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>