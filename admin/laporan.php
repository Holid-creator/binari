<?php

$alldata = array();

$tmulai = "";
$tselesai = "";
$status = "";

if (isset($_POST['lihat'])) {

    $tmulai = $_POST['tglm'];
    $tselesai = $_POST['tgls'];
    $status = $_POST['status'];
    $ambil = $conn->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm . id_plg = pl . id_plg WHERE status = '$status' AND tgl_pem BETWEEN '$tmulai' AND '$tselesai'");
    while ($pecah = $ambil->fetch_assoc()) {

        $alldata[] = $pecah;
    }

    // echo "<pre>";
    // print_r($alldata);
    // echo "</pre>";
}

?>

<h2>Laporan Pembelian dari <?= date('d F Y', strtotime($tmulai)); ?> Hingga <?= date('d F Y', strtotime($tselesai)) ?></h2>
<hr>

<form method="post">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Dari Tanggal</label>
                <input type="date" class="form-control" name="tglm" value="<?= $tmulai ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Sampai Tanggal</label>
                <input type="date" class="form-control" name="tgls" value="<?= $tselesai ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    <option value="">Pilih Status</option>
                    <option value="Belum Dibayar" <?= $status == "Belum Dibayar'?'selected':'"; ?>>Belum Dibayar</option>
                    <option value="Sudah Mengirim Pembayaran" <?= $status == "Sudah Mengirim Pembayaran'?'selected':'"; ?>>Sudah Mengirim Pembayaran</option>
                    <option value="Dibatalkan" <?= $status == "Dibatalkan?'selected':'"; ?>>Dibatalkan</option>
                    <option value="Barang Sudah Sampai" <?= $status == "Barang Sudah Sampai'?'selected':'"; ?>>Barang Sudah Sampai</option>
                    <option value="Barang Dikirim" <?= $status == "Barang Dikirim'?'selected':'"; ?>>Barang Dikirim</option>
                    <option value="Lunas" <?= $status == "Lunas'?'selected':'"; ?>>Lunas</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <label for="">&nbsp;</label><br>
            <button class="btn btn-primary" name="lihat"><i class="glyphicon glyphicon-tasks"></i> Lihat Laporan</a></button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0 ?>
        <?php foreach ($alldata as $key => $value) : ?>
            <?php $total += $value['to_pem'] ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value['n_plg'] ?></td>
                <td><?= date('d F Y', strtotime($value['tgl_pem'])) ?></td>
                <td>Rp. <?= number_format($value['to_pem']) ?></td>
                <td><?= $value['status'] ?></td>

            </tr>
        <?php endforeach ?>
    </tbody>

    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th>Rp. <?= number_format($total) ?></th>
            <th></th>
        </tr>
    </tfoot>
</table>

<a href="download_laporan.php?tglm=<?= $tmulai; ?>&tgls=<?= $tselesai; ?>&status=<?= $status; ?>">Download PDF</a>