<?php

include 'koneksi.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <title>Home</title>
</head>

<body>

    <?php include 'menu.php'; ?>

    <!-- Konten -->
    <div class="badan">
        <section class="konten">
            <div class="container">
                <h1>Product Terbaru</h1>
                <div class="row">

                    <?php $ambil = $conn->query("SELECT * FROM product");  ?>
                    <?php while ($per_pro = $ambil->fetch_assoc()) { ?>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <img src="foto_product/<?= $per_pro['f_pro']; ?>">
                                <div class="caption">
                                    <h3><?= $per_pro['n_pro']; ?></h3>
                                    <h5>Rp. <?= number_format($per_pro['hrg_pro']); ?></h5>
                                    <a href="beli.php?id=<?= $per_pro['id_pro']; ?>" class="btn btn-primary "><i class="glyphicon glyphicon-shopping-cart"></i> Beli</a>
                                    <a href="detail.php?id=<?= $per_pro['id_pro']; ?>" class="btn btn-default"> <i class="glyphicon glyphicon-eye-open"></i> Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </section>

</body>

</html>