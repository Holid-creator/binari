<?php

session_start();
include 'koneksi.php';

$id_pem = $_GET['id'];

// $ambil = $conn->query("SELECT * FROM pembayaran WHERE id_pem = '$id_pem'");
$ambil = $conn->query("SELECT * FROM pembayaran
    LEFT JOIN pembelian ON pembayaran . id_pem = pembelian . id_pem
    WHERE pembelian . id_pem = '$id_pem'");
$detpay = $ambil->fetch_assoc();

// Jika belum ada Data Pembayaran
if (!$detpay) {

    echo "<script>alert('Belum ada Data Pembayaran');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}

// jika data pelanggan yg bayar tdk sesuai dgn yg login
if ($_SESSION['pelanggan']['id_plg'] != $detpay['id_plg']) {

    echo "<script>alert('Anda tidak berhak melihat pembayaran orang lain');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <title>Login Pelanggan</title>
</head>

<body>

    <?php include 'menu.php'; ?>

    <div class="container">
        <h3>Lihat pembayaran</h3>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td><?= $detpay['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?= $detpay['bank'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?= $detpay['tgl'] ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?= number_format($detpay['jumlah']) ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="foto_bukti/<?= $detpay['bukti'] ?>" class="img_responsive" width="200">
            </div>
        </div>
    </div>
</body>

</html>