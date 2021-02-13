<?php
session_start();
// Mendapatkan id product dari URL
$id_pro = $_GET['id'];

// Jika sudah ada produk dikeranjang, maka product itu jumlahnya +1
if (isset($_SESSION['keranjang'][$id_pro])) {

    $_SESSION['keranjang'][$id_pro] += 1;
} else {
    $_SESSION['keranjang'][$id_pro] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// selain itu (belum ada dikeranjang), maka product itu dianggapa dibeli
echo "<script>alert('Product Telah Masuk Ke Keranjang Belanja');</script>";
echo "<script>location='keranjang.php';</script>";
