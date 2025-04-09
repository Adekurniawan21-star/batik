<?php include 'header.php'; ?>
<?php
    $no = 1;
    $sql = $koneksi -> query("select * from tb_order 
        join pelanggan on pelanggan.id_pelanggan=tb_order.pelanggan 
        where pelanggan = '$data_sesion[id_pelanggan]'");
    $dataorder = $sql->fetch_assoc();
?>

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Detail</h1>
                    <ul>
                        <li>
                            <a href="index.php">Home </a>
                        </li>
                        <li class="active"> Detail Order</li>
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
                    <form action="#">
                        <div class="checkbox-form">

                            <!-- Checkbox Form Title Start -->
                            <h3 class="title">Billing Details</h3>
                            <!-- Checkbox Form Title End -->

                            <div class="row">

                                <!-- First Name Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Nama <span class="required">*</span></label>
                                        <input placeholder="" type="text" name="nama_pelanggan" value="<?php echo $dataorder['nama_pelanggan'] ?>" readonly>
                                    </div>
                                </div>
                                <!-- First Name Input End -->

                                <!-- Last Name Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Nomor Telpon <span class="required">*</span></label>
                                        <input placeholder="" type="text" name="hp" value="<?php echo $dataorder['hp'] ?>" readonly>
                                    </div>
                                </div>
                                <!-- Last Name Input End -->

                                <!-- Address Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Alamat <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text" name="alamat" value="<?php echo $dataorder['alamat'] ?>" readonly>
                                    </div>
                                </div>
                                <!-- Address Input End -->

                            </div>
                        </div>
                    </form>
                    <!-- Checkbox Form End -->

                </div>

                <div class="col-lg-6 col-12 mb-4">

                    <!-- Your Order Area Start -->
                    <div class="your-order-area border">

                        <!-- Title Start -->
                        <h3 class="title">Your order</h3>
                        <!-- Title End -->

                        <!-- Your Order Table Start -->
                        <div class="your-order-table table-responsive">
                            <table class="table">

                                <!-- Table Head Start -->
                                <thead>
                                    <tr class="cart-product-head">
                                        <th class="cart-product-name text-start">Product</th>
                                        <th class="cart-product-total text-end">Total</th>
                                    </tr>
                                </thead>
                                <!-- Table Head End -->

                                <!-- Table Body Start -->
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $sql2 = $koneksi -> query("select * from tb_detail_order
                                            join produk on produk.kode_produk = tb_detail_order.id_produk
                                            join tb_order on tb_order.id_order=tb_detail_order.id_order
                                            where tb_detail_order.id_order = '$_GET[id_order]'");
                                        $tampil = $sql2->fetch_assoc();
                                        $sql = $koneksi -> query("select * from tb_detail_order
                                            join produk on produk.kode_produk = tb_detail_order.id_produk
                                            join tb_order on tb_order.id_order=tb_detail_order.id_order
                                            where tb_detail_order.id_order = '$_GET[id_order]'");
                                          while ($data= $sql -> fetch_assoc ()) {
                                          # code...
                                    ?>
                                    <tr class="cart_item">
                                        <td class="cart-product-name text-start ps-0"> <?php echo $data['nama_produk'] ?><strong class="product-quantity"> × <?php echo $data['pembelian'] ?></strong></td>
                                        <td class="cart-product-total text-end pe-0"><span class="amount">Rp <?php echo number_format($data['harga_jual']) ?></span></td>
                                    </tr>
                                    <?php
                                        $total_price += $data['harga_jual'];
                                        $totalbayar = $total_price + 10000;
                                    }
                                    ?>
                                </tbody>
                                <!-- Table Body End -->

                                <!-- Table Footer Start -->
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th class="text-start ps-0">Ongkos Kirim</th>
                                        <td class="text-end pe-0"><span class="amount">Rp 10.000 </span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th class="text-start ps-0">Order Total</th>
                                        <td class="text-end pe-0"><strong><span class="amount">Rp <?php echo number_format($totalbayar) ?></span></strong></td>
                                    </tr>
                                </tfoot>
                                <!-- Table Footer End -->

                            </table>
                        </div>
                        <!-- Your Order Table End -->

                        <!-- Payment Accordion Order Button Start -->
                        <div class="payment-accordion-order-button" style="padding: 10px 0;">
                            <div class="payment-accordion">
                                <div class="single-payment">
                                    <h5 class="panel-title mb-3">
                                        <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample-2" aria-expanded="false" aria-controls="collapseExample">
                                            <?php echo $tampil['metode'] ?>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <?php if ($tampil['metode'] == "Transfer") { ?>
                                    <?php if ($tampil['bukti'] == "-") { ?>
                                        <div class="order-button-payment">
                                            <a href="upload-bukti.php?id_order=<?php echo $tampil['id_order'] ?>" class="btn btn-dark btn-hover-primary rounded-0 w-100">Upload Bukti Transfer</a>
                                        </div>
                                    <?php }else{ ?>
                                    <?php } ?>
                            <?php }else{ ?>
                            <?php } ?>
                        </div>
                        <!-- Payment Accordion Order Button End -->
                    </div>
                    <!-- Your Order Area End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Section End -->

    <?php include 'footer.php'; ?>