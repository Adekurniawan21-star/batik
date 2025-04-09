<?php include 'header.php'; ?>


    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Login Pelanggan</h1>
                    <ul>
                        <li>
                            <a href="index.php">Home </a>
                        </li>
                        <li class="active"> Login</li>
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
                    <!-- Login Wrapper Start -->
                    <div class="login-wrapper">

                        <!-- Login Title & Content Start -->
                        <div class="section-content text-center mb-5">
                            <h2 class="title mb-2">Login Pelanggan</h2>
                            <p class="desc-content">Silahkan masuk dengan akun anda</p>
                            <?php 
                            if(isset($_GET['pesan'])){
                              if($_GET['pesan'] == "gagal"){
                                echo "<p style='color: red;'>Masukan data dengan benar!<p>";
                              }else if($_GET['pesan'] == "logout"){
                                echo "<p style='color: red;'>Anda berhasil logout!<p>";
                              }else if($_GET['pesan'] == "belum_login"){
                                echo "<p style='color: red;'>Anda harus login untuk mengakses halaman ini!<p>";
                              }
                            }
                            ?>
                        </div>
                        <!-- Login Title & Content End -->

                        <!-- Form Action Start -->
                        <form method="post" action="cek-pelanggan.php">

                            <!-- Input Email Start -->
                            <div class="single-input-item mb-3">
                                <input type="text" name="username" placeholder="Username">
                            </div>
                            <!-- Input Email End -->

                            <!-- Input Password Start -->
                            <div class="single-input-item mb-3">
                                <input type="password" name="password" placeholder="Enter your Password">
                            </div>
                            <!-- Input Password End -->

                            <!-- Checkbox/Forget Password Start -->
                            <!-- <div class="single-input-item mb-3">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                            <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                        </div>
                                    </div>
                                    <a href="#" class="forget-pwd mb-3">Forget Password?</a>
                                </div>
                            </div> -->
                            <!-- Checkbox/Forget Password End -->

                            <!-- Login Button Start -->
                            <div class="single-input-item mb-3">
                                <button type="submit" name="submit" class="btn btn btn-dark btn-hover-primary rounded-0">Login</button>
                            </div>
                            <!-- Login Button End -->

                            <!-- Lost Password & Creat New Account Start -->
                            <div class="lost-password">
                                Belum memiliki akun? <a href="daftar-pelanggan.php">Daftar</a>
                            </div>
                            <hr>
                            username : adekurniawan <br>
                            password : adekurniawan
                            <!-- Lost Password & Creat New Account End -->

                        </form>
                        <!-- Form Action End -->

                    </div>
                    <!-- Login Wrapper End -->
                </div>
            </div>

        </div>
    </div>
    <!-- Login | Register Section End -->

    <?php include 'footer.php'; ?>