<?php

$id_pro = $_GET['id'];

$ambil = $conn->query("SELECT * FROM product LEFT JOIN kategori ON product . id_kat = kategori . id_kat WHERE id_pro = '$id_pro'");
$dproduct = $ambil->fetch_assoc();

$fproduct = array();
$ambilf = $conn->query("SELECT * FROM foto_product WHERE id_pro = '$id_pro'");
while ($tfoto = $ambilf->fetch_assoc()) {

    $fproduct[] = $tfoto;
}


?>
<table class="table">
    <tr>
        <th>Kategori</th>
        <td><?= $dproduct['n_kat'] ?></td>
    </tr>
    <tr>
        <th>Product</th>
        <td><?= $dproduct['n_pro'] ?></td>
    </tr>
    <tr>
        <th>Harga</th>
        <td>Rp. <?= number_format($dproduct['hrg_pro']) ?></td>
    </tr>
    <tr>
        <th>Berat</th>
        <td><?= $dproduct['berat'] ?> Gr.</td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td><?= $dproduct['des_pro'] ?></td>
    </tr>
    <tr>
        <th>Stock</th>
        <td><?= $dproduct['stock'] ?></td>
    </tr>
</table>

<div class="row">
    <?php foreach ($fproduct as $key => $value) : ?>
        <div class="col-md-3 text-center">
            <img src="../foto_product/<?= $value['n_fo'] ?>" alt="" class="img-responsive"><br>
            <a href="index.php?halaman=hfproduct&idfo=<?= $value['id_fo'] ?>&idpro=<?= $value['id_pro'] ?>" class="btn btn-danger glyphicon glyphicon-trash"> Hapus</a>
        </div>
    <?php endforeach ?>
</div>

<hr>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">File Foto</label>
        <input type="file" name="myfoto">
    </div>
    <button class="btn btn-success glyphicon glyphicon-save" name="simpan" value="simpan"> Simpan</button>
</form>

<?php

if (isset($_POST['simpan'])) {

    $lfoto = $_FILES['myfoto']['tmp_name'];
    $nfoto = $_FILES['myfoto']['name'];

    $tgl = date('YmdHis') . $nfoto;

    // upload
    move_uploaded_file($lfoto, '../foto_product/' . $nfoto);

    $conn->query("INSERT INTO foto_product (id_pro, n_fo) VALUES ('$id_pro', '$nfoto')");

    echo "<script>alert('Foto Product Berhasil ditambahkan');</script>";
    echo "<script>location='index.php?halaman=detailproduct&id=$id_pro';</script>";
}

?>