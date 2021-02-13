<?php

session_start();
// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

include 'koneksi.php';

if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {

    echo "<script>alert('Keranjang kosong, silahkan belanja dulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <title>Keranjang Belanja</title>
</head>

<body>

    <?php include 'menu.php'; ?>

    <!-- Konten -->
    <section class="konten">
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($_SESSION['keranjang'] as $id_pro => $jml) : ?>
                        <!-- Menampilkan product berdasarkan id product -->
                        <?php

                        $ambil = $conn->query("SELECT * FROM product WHERE id_pro = '$id_pro'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah['hrg_pro'] * $jml;

                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pecah['n_pro']; ?></td>
                            <td><?= number_format($pecah['hrg_pro']); ?></td>
                            <td><?= $jml; ?></td>
                            <td><?= number_format($subharga); ?></td>
                            <td>
                                <a href="hapuskeranjang.php?id=<?= $id_pro; ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-primary"><i class="glyphicon glyphicon-new-window"></i> Checkout</a>

        </div>
    </section>


</body>

</html>