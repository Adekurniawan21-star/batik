<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">


    <!-- Vendor CSS (Icon Font) -->

    <!-- 
    <link rel="stylesheet" href="assets/css/vendor/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.min.css"> 
    -->

    <!-- Plugins CSS (All Plugins Files) -->

    <!-- 
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/aos.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css" /> 
    -->

    <!-- Main Style CSS -->

    <!-- 
    <link rel="stylesheet" href="assets/css/style.css" /> 
    -->


    <!-- Use the minified version files listed below for better performance and remove the files listed above -->



    <link rel="stylesheet" href="assets/css/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style type="text/css">
      .bawah a {
        color: grey; 
      }
      .bawah a:visited {
        color: #fc505f; 
      }
    </style>

</head>

<body>

    <?php
    error_reporting(0);
    session_start();
    include 'koneksi.php';
    $sqlsesion = $koneksi->query("select * from pelanggan where id_pelanggan='$_SESSION[id_pelanggan]'");
    $data_sesion = $sqlsesion->fetch_assoc(); 
    
    $status="";

    // hapus edit cart
    if (isset($_POST['action']) && $_POST['action']=="remove"){
    if(!empty($_SESSION["shopping_cart"])) {
        foreach($_SESSION["shopping_cart"] as $key => $value) {
            if($_POST["kode_produk"] == $key){
            unset($_SESSION["shopping_cart"][$key]);
            $status = "<div class='box' style='color:red;'>
            Product is removed from your cart!</div>";
            }
            if(empty($_SESSION["shopping_cart"]))
            unset($_SESSION["shopping_cart"]);
                }       
            }
    }

    if (isset($_POST['action']) && $_POST['action']=="change"){
      foreach($_SESSION["shopping_cart"] as &$value){
        if($value['kode_produk'] === $_POST["kode_produk"]){
            $value['qty'] = $_POST["qty"];
            break; // Stop the loop after we've found the product
        }
    }
        
    }

    // insert cart
    if (isset($_POST['kode_produk']) && $_POST['qty'] && $_POST['kode_produk']!=""){
    $kode_produk = $_POST['kode_produk'];
    $result = mysqli_query($koneksi,"SELECT * FROM `produk` WHERE `kode_produk`='$kode_produk'");
    $row = mysqli_fetch_assoc($result);
    $nama_produk = $row['nama_produk'];
    $kode_produk = $row['kode_produk'];
    $qty = $_POST['qty'];
    $harga_jual = $row['harga_jual'];
    $file = $row['file'];

    $cartArray = array(
        $kode_produk=>array(
        'nama_produk'=>$nama_produk,
        'kode_produk'=>$kode_produk,
        'harga_jual'=>$harga_jual,
        'qty'=>$qty,
        'file'=>$file)
    );

    if(empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Product is added to your cart!</div>";
    }else{
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if(in_array($kode_produk,$array_keys)) {
            $status = "<div class='box' style='color:red;'>
            Product is already added to your cart!</div>";  
        } else {
        $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
        $status = "<div class='box'>Product is added to your cart!</div>";
        }

        }
    }
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    ?>
    <div class="header section">

        <!-- Header Bottom Start -->
        <div class="header-bottom">
            <div class="header-sticky">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- Header Logo Start -->
                        <div class="col-xl-4 col-6">
                            <div class="header-logo">
                                <a style="font-weight: bold;" href="index.php">Toko Butiq Ade Kurniawan</a>
                            </div>
                        </div>
                        <!-- Header Logo End -->

                        <!-- Header Action Start -->
                        <div class="col-xl-2 col-6">
                            <div class="header-actions">

                                <!-- User Account Header Action Button Start -->
                                <a href="login-register.html" class="header-action-btn d-none d-md-block"><i class="pe-7s-user"></i></a>
                                <!-- User Account Header Action Button End -->

                                <!-- Wishlist Header Action Button Start -->
                                <a href="" class="header-action-btn header-action-btn-wishlist d-none d-md-block">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <!-- Wishlist Header Action Button End -->

                                <?php 
                                $jumlahsesion = mysqli_num_rows($sqlsesion);
                                    if ($jumlahsesion > 0) { 
                                ?>

                                <!-- Shopping Cart Header Action Button Start -->
                                <a href="halaman-cart.php" class="header-action-btn">
                                    <i class="pe-7s-shopbag"></i>
                                    <span style="margin-right: -10px;"  class="header-action-num"><?php echo $cart_count; ?></span>
                                </a>
                                <!-- Shopping Cart Header Action Button End -->

                                <?php }else{ ?>

                                <!-- Shopping Cart Header Action Button Start -->
                                <a href="login-pelanggan.php" class="header-action-btn header-action-btn-cart">
                                    <i class="pe-7s-shopbag"></i>
                                    <span class="header-action-num"><?php echo $cart_count; ?></span>
                                </a>
                                <!-- Shopping Cart Header Action Button End -->

                                <?php } ?>

                                
                            </div>
                        </div>

                        <!-- Header Action End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom End -->

        <!-- Offcanvas Search Start -->
        <div class="offcanvas-search">
            <div class="offcanvas-search-inner">

                <!-- Button Close Start -->
                <div class="offcanvas-btn-close">
                    <i class="pe-7s-close"></i>
                </div>
                <!-- Button Close End -->

                <!-- Offcanvas Search Form Start -->
                <form class="offcanvas-search-form" method="POST" action="halaman-cari.php">
                    <input type="text" name="cari" placeholder="Search Product..." class="offcanvas-search-input">
                </form>
                <!-- Offcanvas Search Form End -->

            </div>
        </div>
        <!-- Offcanvas Search End -->

    </div>