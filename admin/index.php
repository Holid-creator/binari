<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['admin'])) {

    echo "<script>alert('Anda Harus Login Terlebih Dahulu');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="assets/OwlCarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/OwlCarousel/css/owl.theme.default.css">
    <!-- OWL CARAUSEL -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- JQUERY SCRIPTS -->

</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>


                    <li><a href="index.php"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li><a href="index.php?halaman=ketegori"><i class="fa fa-cube"></i>Kategori</a></li>
                    <li><a href="index.php?halaman=product"><i class="fa fa-tags"></i>Product</a></li>
                    <li><a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i>Pembelian</a></li>
                    <li><a href="index.php?halaman=laporan"><i class="fa fa-file"></i>Laporan</a></li>
                    <li><a href="index.php?halaman=pelanggan"><i class="fa fa-male"></i>Pelanggan</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php

                if (isset($_GET['halaman'])) {

                    if ($_GET['halaman'] == 'product') {
                        include 'product.php';
                    } elseif ($_GET['halaman'] == 'ketegori') {
                        include 'kategori.php';
                    } elseif ($_GET['halaman'] == 'pembelian') {
                        include 'pembelian.php';
                    } elseif ($_GET['halaman'] == 'laporan') {
                        include 'laporan.php';
                    } elseif ($_GET['halaman'] == 'pelanggan') {
                        include 'pelanggan.php';
                    } elseif ($_GET['halaman'] == 'detail') {
                        include 'detail.php';
                    } elseif ($_GET['halaman'] == 'tambahproduct') {
                        include 'tambahproduct.php';
                    } elseif ($_GET['halaman'] == 'hapusproduct') {
                        include 'hapusproduct.php';
                    } elseif ($_GET['halaman'] == 'ubahproduct') {
                        include 'ubahproduct.php';
                    } elseif ($_GET['halaman'] == 'pembayaran') {
                        include 'pembayaran.php';
                    } elseif ($_GET['halaman'] == 'detailproduct') {
                        include 'detailproduct.php';
                    } elseif ($_GET['halaman'] == 'hfproduct') {
                        include 'hfproduct.php';
                    } elseif ($_GET['halaman'] == 'download_laporan') {
                        include 'download_laporan.php';
                    }
                } else {
                    include 'home.php';
                }

                ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    <!-- Pangil jquery, Bootstrap, dan owncarousel.js -->
    <script src="assets/dist/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/OwlCarousel/owl.carousel.min.js"></script>


</body>

</html>