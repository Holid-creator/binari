<?php
session_start();

include 'koneksi.php';

// Jika tdk ada session pelanggan
if (!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan'])) {


    echo "<script>alert('silahkan login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

// mendapatkan
$idpem = $_GET['id'];
$ambil = $conn->query("SELECT * FROM pembelian WHERE id_pem = '$idpem'");
$detpem = $ambil->fetch_assoc();

// mendapatkan id pelanggan yg beli
$id_plg_buy = $detpem['id_plg'];

// id pelanggan yg login
$id_plg_log = $_SESSION['pelanggan']['id_plg'];

if ($id_plg_log !== $id_plg_buy) {

    echo "<script>alert('Anda tdk bisa mengakses halam aku orang lain');</script>";
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
    <title>Pembayaran</title>
</head>

<body>

    <?php include 'menu.php'; ?>

    <div class="container">
        <h3>Konfirmasi Pembayaran</h3>
        <p>Kirim Bukti Pembayaran</p>
        <div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?= number_format($detpem['to_pem']) ?></strong></div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="">Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type="number" class="form-control" name="jml" min="1">
            </div>
            <div class="form-group">
                <label for="">Foto Bukti</label>
                <input type="file" class="form-control" name="bukti" min="1">
                <p class="text-danger">Foto bukti harus jpg, jpeg minimal 2mb</p>
            </div>
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>

    <?php

    // Jika Tombol Kirim ditekan
    if (isset($_POST['kirim'])) {

        // upload dulu foto buktinya
        $bukti = $_FILES['bukti']['name'];
        $lokasi = $_FILES['bukti']['tmp_name'];
        $foto_bukti = date('YmdHis') . $bukti;
        move_uploaded_file($lokasi, 'foto_bukti/' . $foto_bukti);

        $nama = $_POST['nama'];
        $bank = $_POST['bank'];
        $jml = $_POST['jml'];
        $date = date('Y-m-d');

        // simpan pembayaran
        $conn->query("INSERT INTO pembayaran (id_pem, nama, bank, jumlah, tgl, bukti) VALUES ('$idpem', '$nama', '$bank', '$jml', '$date', '$foto_bukti')");

        // update data pembeliannya dari pending sudah kirim pembayaran
        $conn->query("UPDATE pembelian SET status = 'sudah dikirim bukti pembayaran' WHERE id_pem = '$idpem'");

        echo "<script>alert('Terima kasih sudah mengirimkan bukti pembayaran');</script>";
        echo "<script>location='riwayat.php';</script>";
    }

    ?>

</body>

</html>