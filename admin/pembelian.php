<h2>Pembelian Product</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Status Pembelian</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; ?>
        <?php $ambil = $conn->query('SELECT * FROM pembelian JOIN pelanggan ON pembelian . id_plg = pelanggan . id_plg'); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $pecah['n_plg']; ?></td>
                <td><?= date('d F Y', strtotime($pecah['tgl_pem'])); ?></td>
                <td><?= $pecah['status']; ?></td>
                <td>Rp. <?= number_format($pecah['to_pem']); ?></td>
                <td>
                    <a href="index.php?halaman=detail&id=<?= $pecah['id_pem']; ?>" class="btn btn-info">Detail</a>
                    <?php if ($pecah['status'] !== 'pending') : ?>
                        <a href="index.php?halaman=pembayaran&id=<?= $pecah['id_pem']; ?>" class="btn btn-success">Lihat Pembayaran</a>
                    <?php endif ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>