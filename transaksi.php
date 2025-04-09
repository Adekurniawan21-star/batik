<?php      
    error_reporting(0);
    session_start();
    include 'koneksi.php';
    $sqlsesion = $koneksi->query("select * from pelanggan where id_pelanggan='$_SESSION[id_pelanggan]'");
    $data_sesion = $sqlsesion->fetch_assoc(); 
    
    $status=""; 

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
    }

    $total_item = count($_SESSION["shopping_cart"]);
    $total_bayar = $_POST['total_bayar'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $metode_bayar = $_POST['metode_bayar'];
    if ($metode_bayar == "Transfer") {
        $bukti = "-";
    }else{
        $bukti = "Bayar ditempat";
    }

    // proses penyimpanan data
    $query = mysqli_query($koneksi, "INSERT INTO tb_order (total_item, total_bayar, tgl_transaksi, pelanggan, bukti, pembayaran, metode) VALUES ('$total_item', '$total_bayar', '" . date('Y-m-d') . "', '$id_pelanggan', '$bukti', 'Transaksi berhasil', '$metode_bayar')");

    $id_order = mysqli_insert_id($koneksi);

    for ($i=0; $i<count($total_item); $i++) { 
        foreach ($_SESSION["shopping_cart"] as $product) {
            $id_produk = $product['kode_produk'];
            $pembelian = $product['qty'];

            $query = mysqli_query($koneksi, "INSERT INTO tb_detail_order (id_order, id_produk, pembelian, konsumen, tgl) VALUES ('$id_order', '$id_produk', '$pembelian', '$id_pelanggan','" . date('Y-m-d') . "')");
        }
    }
    
    // unset session
    unset($_SESSION['shopping_cart']);
    header('Location: sukses.php');
?>