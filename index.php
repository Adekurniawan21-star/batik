<?php include 'header.php'; ?>

    <!-- Hero/Intro Slider Start -->
    <div class="section">
        <div class="hero-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- Single Hero Slider Item Start -->
                    <div class="hero-slide-item-two swiper-slide">

                        <!-- Hero Slider Background Image Start-->
                        <div class="hero-slide-bg">
                            <img src="file/1.jpg" alt="" />
                        </div>
                        <!-- Hero Slider Background Image End-->

                    </div>
                    <!-- Single Hero Slider Item End -->

                    <!-- Single Hero Slider Item Start -->
                    <div class="hero-slide-item-two swiper-slide">

                        <!-- Hero Slider Background Image Start -->
                        <div class="hero-slide-bg">
                            <img src="file/2.jpg" alt="" />
                        </div>
                        <!-- Hero Slider Background Image End -->

                    </div>
                      <div class="hero-slide-item-two swiper-slide">

                        <!-- Hero Slider Background Image Start -->
                        <div class="hero-slide-bg">
                            <img src="file/3.jpg" alt="" />
                        </div>
                        <!-- Hero Slider Background Image End -->

                    </div>
                    <!-- Single Hero Slider Item End -->
                </div>

                <!-- Swiper Pagination Start -->
                <div class="swiper-pagination d-md-none"></div>
                <!-- Swiper Pagination End -->

                <!-- Swiper Navigation Start -->
                <div class="home-slider-prev swiper-button-prev main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
                <div class="home-slider-next swiper-button-next main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
                <!-- Swiper Navigation End -->

            </div>
        </div>
    </div>
    <!-- Hero/Intro Slider End -->

    <!-- Product List Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row mb-n8">
                <div class="col-md-6 col-lg-4 col-12 mb-8" data-aos="fade-up" data-aos-delay="300">

                    <!-- Product List Title Start -->
                    <div class="product-list-title">
                        <h2 class="title pb-3 mb-0">Kategori</h2>
                        <span></span>
                    </div>
                    <!-- Product List Title End -->

                    <!-- Product List Carousel Start -->
                    <div style="display: flex; flex-direction: row; flex-wrap: wrap; column-gap: 20px;">
                        <?php
                            $kategori = $koneksi -> query("select * from kategori");
                              while ($datakategori = $kategori -> fetch_assoc ()) {
                              # kode_produk...
                        ?>
                        <div style="text-align: center;">
                            <a href="halaman-kategori.php?kategori=<?php echo $datakategori['id_kategori'] ?>">
                                <img style="width: 50px; height: 50px; border-radius: 15px;" src="file/<?php echo $datakategori['file_kat']; ?>">
                                <p style="font-size: 14px; font-weight: 500;"><?php echo $datakategori['nama_kategori']; ?></p>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- Product List Carousel End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Product List End -->

    <!-- Banner Section Start -->
    <div class="section">
        <div class="container">

            <!-- Banners Start -->
            <div class="row mb-8">
                <!-- Banner Start -->
                <div class="col-lg-4 col-md-6 col-12 mb-6">
                    <div class="banner" data-aos="fade-up" data-aos-delay="300">
                        <!-- Product List Title Start -->
                        <div class="product-list-title">
                            <h2 class="title pb-3 mb-0">Semua Produk</h2>
                            <span></span>
                        </div>
                        <!-- Product List Carousel Start -->
                        <div style="display: flex; flex-direction: row; flex-wrap: wrap; column-gap: 20px; grid-row-gap: 20px;">
                            <?php
                            $produk = mysqli_query($koneksi,"SELECT * FROM produk");
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
                            <?php } mysqli_close($koneksi); ?>
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