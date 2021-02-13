<h2>Detail Pembelian</h2>

<?php

$ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian . id_plg = pelanggan . id_plg WHERE pembelian . id_pem = '$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<!-- <pre><?php print_r($detail); ?></pre> -->

<div class="row">
    <div class="col-md-4">
        <h3>Pembelian</h3>
        <p>
            Status Barang : <?= $detail['status']; ?><br>
            No. Resi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $detail['resi']; ?><br>
            Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= date('d F Y', strtotime($detail['tgl_pem'])); ?><br>
            Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?= number_format($detail['to_pem']); ?><br>
        </p>
    </div>
    <div class="col-md-4">
        <h3>Pelanggan</h3><br>
        <strong>Nama : <?= $detail['n_plg']; ?></strong><br>
        <p>
            No. Telp : <?= $detail['telp_plg']; ?><br>
            E-Mail &nbsp;&nbsp;&nbsp;: <?= $detail['e_plg']; ?>
        </p>
    </div>
    <div class="col-md-4">
        <h3>Pengiriman</h3>
        <p>
            <strong>Alamat Tujuan :</strong> <?= $detail['tipe']; ?> <?= $detail['distrik']; ?> <?= $detail['provinsi']; ?><br>
            Ongkos Kirim : Rp. <?= number_format($detail['ongkir']); ?><br>
            Ekspedisi : <?= $detail['ekspedisi']; ?> <?= $detail['paket']; ?> <?= $detail['estimasi']; ?><br>
            Alamat Pengiriman : <?= ($detail['alamat']); ?>
        </p>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Product</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php $ambil = $conn->query("SELECT * FROM pem_product JOIN product ON pem_product . id_pro = product . id_pro WHERE pem_product . id_pem = '$_GET[id]'"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $pecah['n_pro']; ?></td>
                <td>Rp. <?= number_format($pecah['hrg_pro']); ?></td>
                <td><?= $pecah['jumlah']; ?></td>
                <td>Rp. <?= number_format($pecah['hrg_pro'] * $pecah['jumlah']); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>