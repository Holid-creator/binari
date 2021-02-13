<h1>Pelanngan</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; ?>
        <?php $tampil = $conn->query('SELECT * FROM pelanggan') ?>
        <?php while ($pecah = $tampil->fetch_assoc()) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $pecah['n_plg']; ?></td>
                <td><?= $pecah['e_plg']; ?></td>
                <td><?= $pecah['telp_plg']; ?></td>
                <td>
                    <a href="" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>