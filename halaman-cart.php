<?php include 'header.php'; ?>

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Shopping Cart</h1>
                    <ul>
                        <li>
                            <a href="index.php">Home </a>
                        </li>
                        <li class="active"> Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->



    <!-- Shopping Cart Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-12">

<?php
if(isset($_SESSION["shopping_cart"])){
?>  
                    <!-- Cart Table Start -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">

                            <!-- Table Head Start -->
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Gambar</th>
                                    <th class="pro-title">Produk</th>
                                    <th class="pro-price">Harga</th>
                                    <th class="pro-quantity">Qty</th>
                                    <th class="pro-subtotal">Subtotal</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>

<?php       
foreach ($_SESSION["shopping_cart"] as $product){
?>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="file/<?php echo $product['file'] ?>" alt="Product" /></a></td>
                                    <td class="pro-title"><?php echo $product['nama_produk'] ?></td>
                                    <td class="pro-price"><span>Rp <?php echo number_format($product['harga_jual']) ?></span></td>

                                    <form method='post' action=''>
                                        <input type='hidden' name='kode_produk' value="<?php echo $product["kode_produk"]; ?>" />
                                        <input type='hidden' name='action' value="change" />
                                        <td><input style="text-align: center; width: 25%; height: 100; border: none;
  border-bottom: 2px solid red; font-size: 18px; font-weight: bold;" name="qty" value="<?php echo $product['qty'] ?>" type="text" onchange="this.form.submit()"></td>
                                    </form>
                                    <td class="pro-subtotal"><span>Rp <?php echo number_format($subtotal = $product["harga_jual"]*$product["qty"]); ?></span></td>
                                    <td class="pro-remove">
                                        <form method='post' action=''>
                                        <input type='hidden' name='kode_produk' value="<?php echo $product["kode_produk"]; ?>" />
                                        <input type='hidden' name='action' value="remove" />
                                        <button type='submit' class='remove'><i class="pe-7s-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
<?php
$total_price += $subtotal;
}
?>
                            </tbody>
                            <!-- Table Body End -->

                        </table>
                    </div>
                    <!-- Cart Table End -->
    


                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 ms-auto col-custom">

                    <!-- Cart Calculation Area Start -->
                    <div class="cart-calculator-wrapper">

                        <!-- Cart Calculate Items Start -->
                        <div class="cart-calculate-items">

                            <!-- Responsive Table Start -->
                            <div class="table-responsive">
                                <table class="table">
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount">Rp <?php echo number_format($total_price) ?></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- Responsive Table End -->

                        </div>
                        <!-- Cart Calculate Items End -->

                        <!-- Cart Checktout Button Start -->
                        <a href="checkout.php" class="btn btn-dark btn-hover-primary rounded-0 w-100">Proceed To Checkout</a>
                        <!-- Cart Checktout Button End -->

                    </div>
                    <!-- Cart Calculation Area End -->

                </div>
            </div>

        </div>
    </div>
    <!-- Shopping Cart Section End -->
  <?php
}else{ ?>
    <div style="text-align: center; font-weight: bold; font-size: 34px;">KERANJANG BELANJA KOSONG!</div>
    <div style="text-align: center; padding: 20px 0 50px 0">
        <a href="index.php" class="btn btn-outline-primary" style="border-radius: 15px;">Lanjut Belanja</a>
    </div>
    <?php
    }
?>

<?php include 'footer.php'; ?>