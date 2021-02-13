<?php include 'koneksi.php';

$keyword = $_GET['keyword'];

$alldata = array();
$ambil = $conn->query("SELECT * FROM product WHERE n_pro LIKE '%$keyword%' OR des_pro LIKE '%keyword%'");
while ($pecah = $ambil->fetch_assoc()) {

    $alldata[] = $pecah;
}

echo "<pre>";
print_r($alldata);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <title>Pencarian</title>
</head>

<body>

    <?php include 'menu.php' ?>
    <div class="container">
        <h3>Hasil Pencarian : <?= $keyword ?></h3>

        <?php if (empty($alldata)) : ?>
            <div class="alert alert-danger">Product <strong><?= $keyword ?></strong> Tidak ditemukan</div>
        <?php endif ?>
        <div class="row">

            <?php foreach ($alldata as $key => $value) : ?>

                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="foto_product/<?= $value['f_pro'] ?>" alt="" class="img-responsive">
                        <div class="caption">
                            <h3><?= $value['n_pro'] ?></h3>
                            <h5>Rp. <?= number_format($value['hrg_pro']) ?></h5>
                            <a href="detail.php?id=<?= $value['id_pro'] ?>" class="btn btn-default">Detail</a>
                            <a href="beli.php?id=<?= $value['id_pro'] ?>" class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

</body>

</html>