<?php

$ambil = $conn->query("SELECT * FROM product WHERE id_pro = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$f_pro = $pecah['f_pro'];
if (file_exists('foto_product/$f_pro')) {
    unlink('foto_product/$f_pro');
}
$conn->query("DELETE FROM product WHERE id_pro='$_GET[id]'");
echo "<script>alert('product terhapus');</script>";
echo "<script>location='index.php?halaman=product';</script>";
