<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php 
  error_reporting(0);
  session_start();
  include 'koneksi.php';
  $sql = $koneksi->query("select * from user where id='$_SESSION[id]'");
  $d_sesion = $sql->fetch_assoc(); 
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?adminpage=dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="?adminpage=dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <li class="nav-item">
                <a class="nav-link" href="?adminpage=user">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?adminpage=kategori">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Kategori</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?adminpage=produk">
                    <i class="fas fa-fw fa-boxes"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?adminpage=barang_masuk">
                    <i class="fas fa-fw fa-arrow-down"></i>
                    <span>Barang Masuk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?adminpage=pelanggan">
                    <i class="fas fa-fw fa-user-circle"></i>
                    <span>Pelanggan</span></a>
            </li>
            
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Order
            </div>
            <li class="nav-item">
                <a class="nav-link" href="?adminpage=retur">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Retur</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?adminpage=order">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Transaksi</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Report
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="?adminpage=laptransaksi">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Transaksi</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="?adminpage=lapproduk">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Produk</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $d_sesion['nama']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="admin/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="?adminpage=user&aksi=profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="?adminpage=user&aksi=editprofile">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php 
                    $adminpage = $_GET['adminpage'];
                    $aksi = $_GET['aksi'];

                    if ($adminpage == "dashboard") {
                        if ($aksi == "") {
                            include "adminpage/dashboard/dashboard.php";
                        }
                    }if ($adminpage == "user") {
                        if ($aksi == "") {
                            include "adminpage/user/user.php";
                        }elseif ($aksi=="tambah") {
                            include "adminpage/user/tambah.php";
                        }elseif ($aksi=="ubah") {
                            include "adminpage/user/ubah.php";
                        }elseif ($aksi=="hapus") {
                            include "adminpage/user/hapus.php";
                        }elseif ($aksi=="profile") {
                            include "adminpage/user/profile.php";
                        }elseif ($aksi=="editprofile") {
                            include "adminpage/user/editprofile.php";
                        }
                    }if ($adminpage == "kategori") {
                        if ($aksi == "") {
                            include "adminpage/kategori/kategori.php";
                        }elseif ($aksi=="tambah") {
                            include "adminpage/kategori/tambah.php";
                        }elseif ($aksi=="ubah") {
                            include "adminpage/kategori/ubah.php";
                        }elseif ($aksi=="hapus") {
                            include "adminpage/kategori/hapus.php";
                        }
                    }if ($adminpage == "sidangulang") {
                        if ($aksi == "") {
                            include "adminpage/sidangulang/sidangulang.php";
                        }elseif ($aksi=="tambah") {
                            include "adminpage/sidangulang/tambah.php";
                        }elseif ($aksi=="ubah") {
                            include "adminpage/sidangulang/ubah.php";
                        }elseif ($aksi=="hapus") {
                            include "adminpage/sidangulang/hapus.php";
                        }
                    }if ($adminpage == "sidangulang2") {
                        if ($aksi == "") {
                            include "adminpage/sidangulang2/sidangulang.php";
                        }elseif ($aksi=="tambah") {
                            include "adminpage/sidangulang2/tambah.php";
                        }elseif ($aksi=="ubah") {
                            include "adminpage/sidangulang2/ubah.php";
                        }elseif ($aksi=="hapus") {
                            include "adminpage/sidangulang2/hapus.php";
                        }
                    }if ($adminpage == "pelanggan") {
                        if ($aksi == "") {
                            include "adminpage/pelanggan/pelanggan.php";
                        }elseif ($aksi=="tambah") {
                            include "adminpage/pelanggan/tambah.php";
                        }elseif ($aksi=="ubah") {
                            include "adminpage/pelanggan/ubah.php";
                        }elseif ($aksi=="hapus") {
                            include "adminpage/pelanggan/hapus.php";
                        }
                    }if ($adminpage == "produk") {
                        if ($aksi == "") {
                            include "adminpage/produk/produk.php";
                        }elseif ($aksi=="tambah") {
                            include "adminpage/produk/tambah.php";
                        }elseif ($aksi=="ubah") {
                            include "adminpage/produk/ubah.php";
                        }elseif ($aksi=="hapus") {
                            include "adminpage/produk/hapus.php";
                        }
                    }if ($adminpage == "retur") {
                        if ($aksi == "") {
                            include "adminpage/retur/retur.php";
                        }elseif ($aksi=="tambah") {
                            include "adminpage/retur/tambah.php";
                        }elseif ($aksi=="ubah") {
                            include "adminpage/retur/ubah.php";
                        }elseif ($aksi=="hapus") {
                            include "adminpage/retur/hapus.php";
                        }elseif ($aksi=="kirim") {
                            include "adminpage/retur/kirim.php";
                        }elseif ($aksi=="proses") {
                            include "adminpage/retur/proses.php";
                        }
                    }if ($adminpage == "order") {
                        if ($aksi == "") {
                            include "adminpage/order/order.php";
                        }elseif ($aksi=="tambah") {
                            include "adminpage/order/tambah.php";
                        }elseif ($aksi=="ubah") {
                            include "adminpage/order/ubah.php";
                        }elseif ($aksi=="hapus") {
                            include "adminpage/order/hapus.php";
                        }elseif ($aksi=="detail") {
                            include "adminpage/order/detail.php";
                        }elseif ($aksi=="kirim") {
                            include "adminpage/order/kirim.php";
                        }
                    }if ($adminpage == "barang_masuk") {
                        if ($aksi == "") {
                            include "adminpage/barang_masuk/barang_masuk.php";
                        }elseif ($aksi=="tambah") {
                            include "adminpage/barang_masuk/tambah.php";
                        }elseif ($aksi=="ubah") {
                            include "adminpage/barang_masuk/ubah.php";
                        }elseif ($aksi=="hapus") {
                            include "adminpage/barang_masuk/hapus.php";
                        }
                    }if ($adminpage == "laptransaksi") {
                        if ($aksi == "") {
                            include "adminpage/laptransaksi/laptransaksi.php";
                        }elseif ($aksi=="tambah") {
                            include "adminpage/laptransaksi/tambah.php";
                        }elseif ($aksi=="ubah") {
                            include "adminpage/laptransaksi/ubah.php";
                        }elseif ($aksi=="hapus") {
                            include "adminpage/laptransaksi/hapus.php";
                        }
                    }if ($adminpage == "lapproduk") {
                        if ($aksi == "") {
                            include "adminpage/lapproduk/lapproduk.php";
                        }elseif ($aksi=="tambah") {
                            include "adminpage/lapproduk/tambah.php";
                        }elseif ($aksi=="ubah") {
                            include "adminpage/lapproduk/ubah.php";
                        }elseif ($aksi=="hapus") {
                            include "adminpage/lapproduk/hapus.php";
                        }
                    }
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/chart-area-demo.js"></script>
    <script src="admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>