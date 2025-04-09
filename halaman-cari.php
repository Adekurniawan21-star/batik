<?php include 'header.php'; ?>

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Hasil</h1>
                    <ul>
                        <li>
                            <a href="index.php">Home </a>
                        </li>
                        <li class="active"> Hasil Pencarian</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Banner Section Start -->
    <div class="section section-margin">
        <div class="container">

            <!-- Banners Start -->
            <div class="row mb-8">
                <!-- Banner Start -->
                <div class="col-lg-4 col-md-6 col-12 mb-6">
                    <div class="banner" data-aos="fade-up" data-aos-delay="300">
                        <!-- Product List Title Start -->
                        <div class="product-list-title">
                            <h2 class="title pb-3 mb-0">Produk dengan kata <?php echo $_POST['cari'] ?></h2>
                            <span></span>
                        </div>
                        <!-- Product List Carousel Start -->
                        <div style="display: flex; flex-direction: row; flex-wrap: wrap; column-gap: 20px; grid-row-gap: 20px;">
                            <?php
                            $cari = $_POST['cari'];
                            $produk = mysqli_query($koneksi,"SELECT * FROM produk WHERE nama_produk LIKE '%$cari%'");
                            $jumlah = mysqli_num_rows($produk);
                            if ($jumlah > 0) {
                            	while($dataproduk = mysqli_fetch_assoc($produk)){ 
                            ?>
                            <div style="width: 160px; height: auto;">
                                <form method="POST" action="">
                                    <input type='hidden' name='kode_produk' value="<?php echo $dataproduk['kode_produk'] ?>" />
                                    <div><img style="width: 100%; height: 170px;" src="file/<?php echo $dataproduk['file'] ?>"></div>
                                    <div style="font-size: 10px;">
                                      <table>
                                        <tr>
                                          <td>Nama</td>
                                          <td>:</td>
                                          <td><?php echo $dataproduk['nama_produk'] ?></td>
                                        </tr>
                                        <tr>
                                          <td>Harga</td>
                                          <td>:</td>
                                          <td>Rp <?php echo number_format($dataproduk['harga_jual']) ?></td>
                                        </tr>
                                        <tr>
                                          <td>Berat</td>
                                          <td>:</td>
                                          <td><?php echo $dataproduk['ukuran'] ?></td>
                                        </tr>
                                        <tr>
                                          <td>Keterangan</td>
                                          <td>:</td>
                                          <td><?php echo $dataproduk['ket'] ?></td>
                                        </tr>
                                        <tr>
                                          <td>Satuan</td>
                                          <td>:</td>
                                          <td><?php echo $dataproduk['satuan'] ?></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="quantity mb-3 mt-2">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" name="qty" value="1" min="1" type="text">
                                            <div class="dec qtybutton"></div>
                                            <div class="inc qtybutton"></div>
                                        </div>
                                    </div>
                                    <div><button type="submit" style="width: 100%; border: 1px solid grey; background-color: transparent;">Add to cart</button></div>
                                </form>
                            </div>
                            <?php }}else{ echo "Tidak ada produk untuk hasil pencarian ini";} mysqli_close($koneksi); ?>
                        </div>
                        <!-- Product List Carousel End -->
                    </div>
                </div>
                <!-- Banner End -->

            </div>
            <!-- Banners End -->
        </div>
    </div>
    <!-- Banner Section End -->

<?php include 'footer.php'; ?>