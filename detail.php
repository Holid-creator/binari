<?php session_start(); ?>
<?php include 'koneksi.php'; ?>
<?php

// mendapatkan id product dari URL
$id_product = $_GET['id'];

// query Ambil Data
$ambil = $conn->query("SELECT * FROM product WHERE id_pro = '$id_product'");
$detail = $ambil->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <title>Detail Product</title>
</head>

<body>

    <?php include 'menu.php'; ?>

    <!-- konten -->
    <sec class="konten">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="foto_product/<?= $detail['f_pro']; ?>" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h2><?= $detail['n_pro']; ?></h2>
                    <h4>Rp. <?= number_format($detail['hrg_pro']); ?></h4>

                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli">Beli</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php

                    // Jika Ada Tombol Beli
                    if (isset($_POST['beli'])) {

                        // Mendapatkan jumlah yang diinputkan
                        $jumlah = $_POST['jumlah'];

                        // Masukkan keranjang belanja
                        $_SESSION['keranjang'][$id_product] = $jumlah;

                        echo "<script>Alert('Product Telah Masuk Ke Keranjang Belanja');</script>";
                        echo "<script>location='keranjang.php';</script>";
                    }

                    ?>

                    <?= $detail['des_pro']; ?></>
                </div>
            </div>
        </div>
    </sec>

</body>

</html>