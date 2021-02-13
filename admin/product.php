<h2> Data Product</h2>
<br>
<div class="pull-right">
    <a href="index.php?halaman=tambahproduct" class="btn btn-success glypson glyphicon-plus">TAMBAH PRODUCT</a>
</div>
<br>
<br>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Foto</th>
            <th width="350"> Deskripsi</th>
            <th>Stock</th>
            <th width="190">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; ?>
        <?php $ambil = $conn->query('SELECT * FROM product LEFT JOIN kategori ON product . id_kat = kategori . id_kat'); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $pecah['n_kat']; ?></td>
                <td><?= $pecah['n_pro']; ?></td>
                <td><?= $pecah['hrg_pro']; ?></td>
                <td><?= $pecah['berat']; ?></td>
                <td>
                    <img src="../foto_product/<?= $pecah['f_pro']; ?>" width="100">
                </td>
                <td><?= $pecah['des_pro']; ?></td>
                <td><?= $pecah['stock']; ?></td>
                <td>
                    <a href="index.php?halaman=ubahproduct&id=<?= $pecah['id_pro']; ?>" class="btn btn-warning glyphicon glyphicon-edit"> Ubah</a>
                    <a href="index.php?halaman=hapusproduct&id=<?= $pecah['id_pro']; ?>" class="btn btn-danger glyphicon glyphicon-remove" onclick="return confirm('Apakah Anda yakin ingin menghapusnya')"> Hapus</a>

                    <a href="index.php?halaman=detailproduct&id=<?= $pecah['id_pro']; ?>" class="btn btn-info glyphicon glyphicon-eye-open"> Detail</a>

            </tr>
        <?php } ?>
    </tbody>
</table>