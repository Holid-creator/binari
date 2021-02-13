<?php
session_start();

$id_pro = $_GET['id'];
unset($_SESSION['keranjang'][$id_pro]);

echo "<script>alert('Product dihapus dari Keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
