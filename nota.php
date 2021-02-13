<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">

    <title>Checkout</title>
</head>

<body>

    <?php include 'menu.php'; ?>
    <?php include 'menutanpacheckout.php'; ?>

    <!-- konten -->
    <section class="konten">
        <div class="container">

            <h3>NOTA PEMBELIAN</h3>
            <h3 class="glyphicon glyphicon-barcode"></h3>
            <h3 class="glyphicon glyphicon-barcode"></h3>
            <h3 class="glyphicon glyphicon-barcode"></h3>
            <h3 class="glyphicon glyphicon-barcode"></h3>
            <h3 class="glyphicon glyphicon-barcode"></h3>
            <h3 class="glyphicon glyphicon-barcode"></h3>
            <h3 class="glyphicon glyphicon-barcode"></h3>
            <h3 class="glyphicon glyphicon-barcode"></h3>

            <?php
            $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian . id_plg = pelanggan . id_plg WHERE pembelian . id_pem = '$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>
            <br>
            <br>
            <br>

            <?php
            // Mendapatkan id pelanggan yg beli
            $id_plg_buy = $detail['id_plg'];

            // Mendapatkan id pelanggan yg login
            $id_plg_log = $_SESSION['pelanggan']['id_plg'];

            if ($id_plg_buy !== $id_plg_log) {

                echo "<script>alert('Tidak ada riwayat ini');</script>";
                echo "<script>location='riwayat.php';</script>";
                exit();
            }

            ?>

            <div class="row">
                <div class="col-md-4">
                    <strong>No. Pembelian : <?= $detail['id_pem']; ?></strong><br>
                    Tanggal : <?= date('d F Y', strtotime($detail['tgl_pem'])); ?><br>
                    Total : Rp. <?= number_format($detail['to_pem']); ?>
                </div>
                <div class="col-md-4">
                    <strong>Nama : <?= $detail['n_plg']; ?></strong>
                    <p>
                        <?= $detail['telp_plg']; ?><br>
                        <?= $detail['e_plg']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <strong>Alamat Tujuan : <?= $detail['tipe']; ?> <?= $detail['distrik']; ?> <?= $detail['provinsi']; ?></strong><br>
                    Ongkos Kirim : Rp. <?= number_format($detail['ongkir']); ?><br>
                    Ekspedisi : <?= $detail['ekspedisi']; ?> <?= $detail['paket']; ?> <?= $detail['estimasi']; ?><br>
                    Alamat Pengiriman : <?= ($detail['alamat']); ?>

                </div>
            </div><br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Product</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Jumlah</th>
                        <th>Sub Berat</th>
                        <th>Sub Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php $ambil = $conn->query("SELECT * FROM pem_product WHERE id_pem = '$_GET[id]'"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pecah['nama']; ?></td>
                            <td>Rp. <?= number_format($pecah['harga']); ?></td>
                            <td><?= $pecah['berat']; ?> Gr.</td>
                            <td><?= $pecah['jumlah']; ?></td>
                            <td><?= $pecah['sub_brt']; ?></td>
                            <td>Rp.<?= number_format($pecah['sub_hrg']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        <p>
                            Silahkan Melakukan Pembayaran Rp. <?= number_format($detail['to_pem']); ?><br>
                            <strong>BANK BCA 014 8835878 AN. M HOLIDIN</strong>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

</html>