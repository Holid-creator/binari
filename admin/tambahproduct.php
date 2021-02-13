<?php

$dkategori = array();

$ambil = $conn->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {

    $dkategori[] = $tiap;
}

// echo "<pre>";
// print_r($dkategori);
// echo "</pre>";

?>


<h2>Tambah Product</h2>
<form method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Product">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="id_kat">
            <option value="">Pilih Kategori</option>
            <?php foreach ($dkategori as $key => $value) : ?>
                <option value="<?= $value['id_kat'] ?>"><?= $value['n_kat'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Harga (Rp.)</label>
        <input type="number" class="form-control" name="harga" id="harga">
    </div>
    <div class="form-group">
        <label>Berat (Gr)</label>
        <input type="number" class="form-control" name="berat" id="berat">
    </div>
    <div class="form-group">
        <label>Deskripsi</label><br>
        <textarea name="deskripsi" id="deskripsi" cols="140" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <div class="letak-foto" style="margin-bottom: 10px;">
            <input type="file" class="form-control" name="foto[]">
        </div>
        <span class="btn btn btn-primary btn-tambah">
            <i class="fa fa-plus"></i>
        </span>
    </div>
    <div class="form-group">
        <label>Stock</label>
        <input type="number" class="form-control" name="stock">
    </div>
    <button class="btn btn-primary" name="save"><i class="glyphicon glyphicon-saved">Save</i></button>
</form>

<?php

if (isset($_POST['save'])) {
    $snama = $_FILES['foto']['name'];
    $slokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($slokasi[0], "../foto_product/" . $snama[0]);
    $conn->query("INSERT INTO product (id_kat, n_pro, hrg_pro, berat, f_pro, des_pro, stock)
    VALUES('$_POST[id_kat]', '$_POST[nama]', '$_POST[harga]', '$_POST[berat]', '$snama[0]', '$_POST[deskripsi]', '$_POST[stock]')");

    $id_pronew = $conn->insert_id;
    foreach ($snama as $key => $tnama) {

        $tlokasi = $slokasi[$key];

        move_uploaded_file($tlokasi, '../foto_product/' . $tnama);

        $conn->query("INSERT INTO foto_product (id_pro, n_fo) VALUES ('$id_pronew', '$tnama')");
    }

    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=product'>";
}
?>

<script>
    $(document).ready(function() {

        $('.btn-tambah').on('click', function() {

            $('.letak-foto').append("<input type='file' class='form-control' name='foto[]''>");
        })
    })
</script>