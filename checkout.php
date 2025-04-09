<?php include 'header.php'; ?>


    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Checkout</h1>
                    <ul>
                        <li>
                            <a href="index.php">Home </a>
                        </li>
                        <li class="active"> Checkout</li>
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
                                        <input placeholder="" type="text" name="nama_pelanggan" value="<?php echo $data_sesion['nama_pelanggan'] ?>">
                                    </div>
                                </div>
                                <!-- First Name Input End -->

                                <!-- Last Name Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Nomor Telpon <span class="required">*</span></label>
                                        <input placeholder="" type="text" name="hp" value="<?php echo $data_sesion['hp'] ?>">
                                    </div>
                                </div>
                                <!-- Last Name Input End -->

                                <!-- Address Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Alamat <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text" name="alamat" value="<?php echo $data_sesion['alamat'] ?>">
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
                                        foreach ($_SESSION["shopping_cart"] as $product) {
                                    ?>
                                    <tr class="cart_item">
                                        <td class="cart-product-name text-start ps-0"> <?php echo $product['nama_produk'] ?><strong class="product-quantity"> × <?php echo $product['qty'] ?></strong></td>
                                        <td class="cart-product-total text-end pe-0"><span class="amount">Rp <?php echo number_format($product['harga_jual']) ?></span></td>
                                    </tr>
                                    <?php
                                        $subtotalproduk = $product['harga_jual']*$product['qty'];
                                        $total_price += $subtotalproduk;
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

                        <form method="POST" action="transaksi.php">
                            <input type="hidden" name="ongkos" value="10000">
                            <input type="hidden" name="id_pelanggan" value="<?php echo $data_sesion['id_pelanggan'] ?>">
                            <input type="hidden" name="total_bayar" value="<?php echo $totalbayar; ?>">
                        <!-- Payment Accordion Order Button Start -->
                        <div class="payment-accordion-order-button">
                            <div class="payment-accordion">
                                <div class="single-payment">
                                    <h5 class="panel-title mb-3">
                                        <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            <div style="display: flex; justify-content: space-between;">
                                                <div><input type="radio" name="metode_bayar" value="Transfer" checked=""></div>
                                                <div>Direct Bank Transfer</div>
                                            </div>
                                        </a>
                                    </h5>
                                    <div class="collapse show" id="collapseExample">
                                        <div class="card card-body rounded-0">
                                            <p><strong>MANDIRI</strong> <br> 15029918</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-payment">
                                    <h5 class="panel-title mb-3">
                                        <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample-2" aria-expanded="false" aria-controls="collapseExample-2">
                                            <div style="display: flex; justify-content: space-between;">
                                                <div><input type="radio" name="metode_bayar" value="COD"></div>
                                                <div>Cash on Delivery</div>
                                            </div>
                                        </a>
                                    </h5>
                                    <div class="collapse" id="collapseExample-2">
                                        <div class="card card-body rounded-0">
                                            <p>Pastikan paket tidak terbuka jika anda cancel dan di wajibkan membayar jika sudah diterima.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-button-payment">
                                <button type="submit" class="btn btn-dark btn-hover-primary rounded-0 w-100">Place Order</button>
                            </div>
                        </div>
                        <!-- Payment Accordion Order Button End -->
                        </form>
                    </div>
                    <!-- Your Order Area End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Section End -->

    <?php include 'footer.php'; ?>