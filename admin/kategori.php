<h2>Data Kategori</h2>
<hr>

<?php

$alldata = array();
$ambil = $conn->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {

    $alldata[] = $tiap;
}

// echo "<pre>";
// print_r($alldata);
// echo "</pre>";

?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alldata as $key => $value) : ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value['n_kat'] ?></td>
                <td>
                    <a href="" class="btn btn-warning btn-sm">Ubah</a>
                    <a href="" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<a href="" class="btn btn-default">Tambah Data</a>