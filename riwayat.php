<?php
session_start();

include 'koneksi.php';

// Jika tdk ada session pelanggan
if (!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan'])) {


    echo "<script>alert('silahkan login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <title>Riwayat</title>
</head>

<body>

    <?php include 'menu.php'; ?>
    <!-- <pre><?php print_r($_SESSION) ?></pre> -->
    <section class="riwayat">
        <div class="container">
            <h3>Riwayat Belanja <?= $_SESSION['pelanggan']['n_plg'] ?></h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // mendapatkan id Pelanggan dari session
                    $id_plg = $_SESSION['pelanggan']['id_plg'];
                    $ambil = $conn->query("SELECT * FROM pembelian WHERE id_plg = '$id_plg'");
                    while ($pecah = $ambil->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pecah['tgl_pem'] ?></td>
                            <td>
                                <?= $pecah['status'] ?><br>
                                <?php if (!empty($pecah['resi'])) : ?>
                                    Resi : <?= $pecah['resi'] ?>
                                <?php endif ?>
                            </td>
                            <td>Rp. <?= number_format($pecah['to_pem']) ?></td>
                            <td>
                                <a href="nota.php?id=<?= $pecah['id_pem'] ?>" class="btn btn-info">Nota</a>
                                <?php if ($pecah['status'] == 'pending') : ?>
                                    <a href="pembayaran.php?id=<?= $pecah['id_pem'] ?>" class="btn btn-success">Input Pembayaran</a>
                                <?php else : ?>
                                    <a href="lihatpembayaran.php?id=<?= $pecah['id_pem'] ?>" class="btn btn-warning">Lihat Pembayaran</a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

</body>

</html>