<?php

$id_fo = $_GET['idfo'];
$id_pro = $_GET['idpro'];

// Ambil dulu datanya
$amfoto = $conn->query("SELECT * FROM foto_product WHERE id_fo = '$id_fo'");
$dfoto = $amfoto->fetch_assoc();

$ffoto = $dfoto['n_fo'];

// Hapus File Foto dari Folder
unlink('../foto_product/' . $ffoto);

// Menghapus data di mysql
$conn->query("DELETE FROM foto_product WHERE id_fo = '$id_fo'");

echo "<script>alert('Foto Product Berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=detailproduct&id=$id_pro';</script>";
