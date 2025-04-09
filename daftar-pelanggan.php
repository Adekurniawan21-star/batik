<?php include 'header.php'; ?>


    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Daftar</h1>
                    <ul>
                        <li>
                            <a href="index.html">Home </a>
                        </li>
                        <li class="active"> Daftar</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Login | Register Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row mb-n10">
                <div class="col-lg-6 col-md-8 m-auto m-lg-0 pb-10">
                    <!-- Register Wrapper Start -->
                    <div class="register-wrapper">

                        <!-- Login Title & Content Start -->
                        <div class="section-content text-center mb-5">
                            <h2 class="title mb-2">Create Account</h2>
                            <p class="desc-content">Silahkan isi dengan data yang valid</p>
                        </div>
                        <!-- Login Title & Content End -->

                        <!-- Form Action Start -->
                        <form method="post">

                            <!-- Input First Name Start -->
                            <div class="single-input-item mb-3">
                                <input type="text" name="nama_pelanggan" placeholder="Nama" required="">
                            </div>
                            <!-- Input First Name End -->

                            <!-- Input Email Or Username Start -->
                            <div class="single-input-item mb-3">
                                <input type="text" name="hp" placeholder="Nomor HP" required="">
                            </div>
                            <!-- Input Email Or Username End -->

                            <!-- Input Email Or Username Start -->
                            <div class="single-input-item mb-3">
                                <input type="text" name="alamat" placeholder="Alamat" required="">
                            </div>
                            <!-- Input Email Or Username End -->

                            <!-- Input Email Or Username Start -->
                            <div class="single-input-item mb-3">
                                <input type="text" name="username" placeholder="Username" required="">
                            </div>
                            <!-- Input Email Or Username End -->

                            <!-- Input Password Start -->
                            <div class="single-input-item mb-3">
                                <input type="text" name="password" placeholder="Password" required="">
                            </div>
                            <!-- Input Password End -->

                            <input type="hidden" name="tgl_daftar" value="<?php echo date('Y-m-d') ?>">

                            <!-- Register Button Start -->
                            <div class="single-input-item mb-3">
                                <button type="submit" name="submit" class="btn btn btn-dark btn-hover-primary rounded-0">Daftar</button>
                            </div>
                            <!-- Register Button End -->

                            <!-- Lost Password & Creat New Account Start -->
                            <div class="lost-password">
                                Sudah memiliki akun? <a href="login-pelanggan.php">Masuk</a>
                            </div>
                            <!-- Lost Password & Creat New Account End -->
                        </form>
                        <!-- Form Action End -->

                    </div>
                    <!-- Register Wrapper End -->
                </div>
            </div>

        </div>
    </div>
    <!-- Login | Register Section End -->

    <?php
      include 'koneksi.php';
      $nama_pelanggan    = $_POST ['nama_pelanggan'];
      $hp    = $_POST ['hp'];
      $alamat    = $_POST ['alamat'];
      $username   = $_POST ['username'];
      $password    = $_POST ['password'];
      $tgl_daftar     = $_POST ['tgl_daftar'];
      if (isset($_POST['submit']))  {
          $sql      = $koneksi->query("insert into pelanggan (nama_pelanggan, hp, alamat, username, password, tgl_daftar)
                      values('$nama_pelanggan', '$hp', '$alamat', '$username', '$password', '$tgl_daftar')"); 
          if ($sql) {
    ?>
      <script type="text/javascript">
          window.location.href="halaman-informasi.php?pesan=berhasildaftar";
      </script>
        <?php }else{ ?>
          <script type="text/javascript">
              window.location.href="halaman-informasi.php?pesan=gagaldaftar";
          </script>
        <?php }
    }  ?>

        <?php include 'footer.php'; ?>