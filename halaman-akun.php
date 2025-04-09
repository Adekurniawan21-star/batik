<?php include 'header.php'; ?>

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">My Account</h1>
                    <ul>
                        <li>
                            <a href="index.html">Home </a>
                        </li>
                        <li class="active"> My Account</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- My Account Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                        Dashboard</a>
                                    <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                    <a href="#retur" data-bs-toggle="tab"><i class="fa fa-circle-o"></i> Retur</a>
                                    <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                    <a href="logout-pelanggan.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Dashboard</h3>
                                            <div class="welcome">
                                                <p>Hello, Pelanggan <strong><?php echo $data_sesion['nama_pelanggan'] ?></strong> </p>
                                            </div>
                                            <br>
                                            
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Orders</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Bukti</th>
                                                            <th>Nama</th>
                                                            <th>Total</th>
                                                            <th>Tanggal</th>
                                                            <th>Metode</th>
                                                            <th>Status</th>
                                                            <th>Tgl Kirim</th>
                                                            <th>Tgl Terima</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $no = 1;
                                                            $sql = $koneksi -> query("select * from tb_order join pelanggan on pelanggan.id_pelanggan=tb_order.pelanggan where pelanggan = '$data_sesion[id_pelanggan]'");
                                                            if(!empty($sql)){
                                                              while ($data= $sql -> fetch_assoc ()) {
                                                              # code...
                                                        ?>
                                                    <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td>
                                                      <?php if ($data['metode'] == "COD") { ?>
                                                        Bayar ditempat
                                                      <?php }else{ ?>
                                                        <?php if ($data['bukti'] == "-") { ?>
                                                            Upload bukti trf
                                                        <?php }elseif ($data['bukti'] == "Bayar ditempat"){ ?>
                                                            Bayar ditempat
                                                        <?php }else{ ?>
                                                            <img style="width: 100px; height: 100px;" src="./file/<?php echo $data['bukti']; ?>">
                                                        <?php } ?>
                                                      <?php } ?>
                                                    </td>
                                                    <td><?php echo $data['nama_pelanggan'] ?></td>
                                                    <td><?php echo $data['total_bayar'] ?></td>
                                                    <td><?php echo $data['tgl_transaksi'] ?></td>
                                                    <td><?php echo $data['metode'] ?></td>
                                                    <td><?php echo $data['pembayaran'] ?></td>
                                                    <td><?php echo $data['tgl_kirim'] ?></td>
                                                    <td><?php echo $data['tgl_terima'] ?></td>
                                                    <td>
                                                      <a href="detail-order.php?id_order=<?php echo $data['id_order'];?>"> 
                                                        <button type="button" class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">
                                                            Lihat detail
                                                        </button>
                                                      </a>
                                                      <?php if ($data['pembayaran'] == "Barang dikirim") { ?>
                                                          <a href="proses-terima.php?id_order=<?php echo $data['id_order'];?>"> 
                                                            <button type="button" class="btn btn btn-warning btn-hover-primary btn-sm rounded-0 text-white">
                                                                Diterima
                                                            </button>
                                                          </a>
                                                      <?php }else{ ?>
                                                      <?php } ?>

                                                      <?php if ($data['pembayaran'] == "Barang diterima") { ?>
                                                          <a href="rating.php?id_order=<?php echo $data['id_order'];?>"> 
                                                            <button type="button" class="btn btn btn-warning btn-hover-primary btn-sm rounded-0 text-white">
                                                                Rating
                                                            </button>
                                                          </a>

                                                          <?php 
                                                            $sql5 = $koneksi -> query("select * from retur where id_order_retur = '$data[id_order]'");
                                                            $hitung5 = mysqli_num_rows($sql5);
                                                            if ($hitung5 > 0) {
                                                          ?>
                                                          <?php }else{ ?>
                                                          <a href="retur.php?id_order=<?php echo $data['id_order'];?>"> 
                                                            <button type="button" class="btn btn btn-danger btn-hover-primary btn-sm rounded-0 text-white">
                                                                Retur
                                                            </button>
                                                          </a>
                                                          <?php } ?>

                                                      <?php }else{ ?>
                                                      <?php } ?>
                                                    </td>
                                                    </tr>
                                                    <?php } } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="retur" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Retur</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Foto</th>
                                                            <th>ID Order</th>
                                                            <th>Ket</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $no = 1;
                                                            $sql2 = $koneksi -> query("select * from retur join tb_order on tb_order.id_order=retur.id_order_retur where tb_order.pelanggan = '$data_sesion[id_pelanggan]'");
                                                            if(!empty($sql2)){
                                                              while ($data2= $sql2 -> fetch_assoc ()) {
                                                              # code...
                                                        ?>
                                                    <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><img style="width: 100px; height: 100px;" src="./file/<?php echo $data2['foto']; ?>"></td>
                                                    <td><?php echo $data2['id_order_retur'] ?></td>
                                                    <td><?php echo $data2['ket'] ?></td>
                                                    <td><?php echo $data2['status'] ?></td>
                                                    <td>
                                                      <?php if ($data2['status'] == "Barang dikirim") { ?>
                                                          <a href="proses-terima-retur.php?id_retur=<?php echo $data2['id_retur'];?>"> 
                                                            <button type="button" class="btn btn btn-warning btn-hover-primary btn-sm rounded-0 text-white">
                                                                Diterima
                                                            </button>
                                                          </a>
                                                      <?php }else{ ?>
                                                      <?php } ?>
                                                    </td>
                                                    </tr>
                                                    <?php } } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3 class="title">Account Details</h3>
                                            <div class="account-details-form">
                                                <form action="ubah-data-pelanggan.php" method="POST">
                                                    <div class="single-input-item mb-3">
                                                        <label for="first-name" class="required mb-1">Nama</label>
                                                        <input type="text" name="nama_pelanggan" id="first-name" placeholder="First Name" value="<?php echo $data_sesion['nama_pelanggan'] ?>" />
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="display-name" class="required mb-1">Nomor Telpon</label>
                                                        <input type="text" name="hp" id="display-name" placeholder="Display Name" value="<?php echo $data_sesion['hp'] ?>"/>
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="email" class="required mb-1">Alamat</label>
                                                        <input type="text" name="alamat" id="email" placeholder="Email Address" value="<?php echo $data_sesion['alamat'] ?>" />
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="email" class="required mb-1">Username</label>
                                                        <input type="text" name="username" id="email" placeholder="Email Address" value="<?php echo $data_sesion['username'] ?>" />
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="email" class="required mb-1">Password</label>
                                                        <input type="text" name="password" id="email" placeholder="Email Address" value="<?php echo $data_sesion['password'] ?>" />
                                                    </div>
                                                    <input type="hidden" name="id_pelanggan" value="<?php echo $data_sesion['id_pelanggan']; ?>">
                                                    <input type="hidden" name="tgl_daftar" value="<?php echo date('d-m-Y') ?>">
                                                    <div class="single-input-item single-item-button">
                                                        <button type="submit" class="btn btn btn-dark btn-hover-primary rounded-0">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Page End -->

                </div>
            </div>

        </div>
    </div>
    <!-- My Account Section End -->

   <?php include 'footer.php'; ?>