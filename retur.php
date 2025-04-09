<?php include 'header.php'; ?>
<?php
    $no = 1;
    $sql = $koneksi -> query("select * from tb_order 
        join pelanggan on pelanggan.id_pelanggan=tb_order.pelanggan 
        where pelanggan = '15'");
    $dataorder = $sql->fetch_assoc();
?>

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Retur</h1>
                    <ul>
                        <li>
                            <a href="index.php">Home </a>
                        </li>
                        <li class="active"> Upload Foto</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n4">
                <div class="col-lg-6 col-12 mb-4">

                    <!-- Checkbox Form Start -->
                    <form method="POST" enctype="multipart/form-data">
                        <div class="checkbox-form">

                            <!-- Checkbox Form Title Start -->
                            <h3 class="title">Foto Barang Rusak</h3>
                            <!-- Checkbox Form Title End -->

                            <div class="row">

                                <!-- First Name Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>File <span class="required">*</span></label>
                                        <input type="file" name="foto">
                                    </div>
                                    <div class="checkout-form-list">
                                        <label>Keterangan <span class="required">*</span></label>
                                        <input type="text" name="ket">
                                    </div>
                                </div>
                                <!-- First Name Input End -->
                                <div class="order-button-payment">
                                    <button type="submit" name="submit" class="btn btn-dark btn-hover-primary rounded-0 w-100">Kirim</button>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- Checkbox Form End -->

                </div>

            </div>
        </div>
    </div>
    <!-- Checkout Section End -->

    <?php
      $id_order_retur = $_GET['id_order'];
      $foto = $_FILES['foto']['name'];
      $ket = $_POST['ket'];
      $status = "Terkirim";
      if (isset($_POST['submit'])) {
        if($foto != "") {
        $ekstensi_diperbolehkan = array('png','jpg','jpeg','pdf','doc','docx','xls','xlsx','ppt','pptx'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_size    = $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];   
        $angka_acak     = date('dmy');
        $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
              if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                if ($file_size < 10000000) {
                      move_uploaded_file($file_tmp, 'file/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                        $sql      = $koneksi->query("insert into retur (id_order_retur, foto, ket, status)
                  values('$id_order_retur', '$nama_gambar_baru', '$ket', '$status')");
                        $result = mysqli_query($koneksi, $query);
                        // periska query apakah ada error
                        if(!$result){
                            ?>
                                <script type="text/javascript">
                                    alert ("Data Berhasil Dikirim 1");
                                    window.location.href="halaman-akun.php";
                                </script>
                            <?php
                        } else {
                          ?>
                              <script type="text/javascript">
                                  alert ("Data Tidak Berhasil Dikirim");
                                  window.location.href="halaman-akun.php";
                              </script>
                          <?php
                        }

              }   } else {     
                    ?>
                        <script type="text/javascript">
                            alert ("Gagal Upload File");
                            window.location.href="halaman-akun.php";
                        </script>
                    <?php
                  }
        }else{
          $sql      = $koneksi->query("insert into retur (id_order_retur, foto, ket, status)
                  values('$id_order_retur', '$nama_gambar_baru', '$ket', '$status')");
                        $result = mysqli_query($koneksi, $query);
                        // periska query apakah ada error
                        if(!$result){
                            ?>
                                <script type="text/javascript">
                                    alert ("Data Berhasil Dikirim");
                                    window.location.href="halaman-akun.php";
                                </script>
                            <?php
                        } else {
                          ?>
                              <script type="text/javascript">
                                  alert ("Data Tidak Berhasil Dikirim");
                                  window.location.href="halaman-akun.php";
                              </script>
                          <?php
                        }
        }
      }
    ?>

    <?php include 'footer.php'; ?>
