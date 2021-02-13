<h2>Ubah Product</h2>
<?php

$ambil = $conn->query("SELECT * FROM product WHERE id_pro = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nama Product</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= $pecah['n_pro']; ?>">
    </div>
    <div class="form-group">
        <label for="">Harga (Rp.)</label>
        <input type="number" name="harga" id="harga" class="form-control" value="<?= $pecah['hrg_pro']; ?>">
    </div>
    <div class="form-group">
        <label for="">Berat (Gr)</label>
        <input type="number" name="berat" id="berat" class="form-control" value="<?= $pecah['berat']; ?>">
    </div>
    <div>
        <img src="../foto_product/<?= $pecah['f_pro']; ?>" alt="" width="200">
    </div>
    <div class="form-group">
        <label>Foto</label><br>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <label>Deskripsi</label><br>
        <textarea name="deskripsi" id="deskripsi" cols="140" rows="10"><?= $pecah['des_pro']; ?></textarea>
    </div>
    <button class="btn btn-success" name="ubah" id="ubah">Ubah</button>
</form>

<?php

if (isset($_POST['ubah'])) {
    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    if (!empty($lokasi)) {
        move_uploaded_file($lokasi, "../foto_product/$foto");

        $conn->query("UPDATE product SET n_pro  = '$_POST[nama]', hrg_pro  = '$_POST[harga]', berat  = '$_POST[berat]', f_pro = '$foto', des_pro  = '$_POST[deskripsi]' WHERE id_pro = '$_GET[id]'");
    } else {

        $conn->query("UPDATE product SET n_pro  = '$_POST[nama]', hrg_pro  = '$_POST[harga]', berat  = '$_POST[berat]', des_pro  = '$_POST[deskripsi]' WHERE id_pro = '$_GET[id]'");
    }
    echo "<script>alert('Data Product Telah Diubah') </script>";
    echo "<script>location='index.php?halaman=product' </script>";
}

?>