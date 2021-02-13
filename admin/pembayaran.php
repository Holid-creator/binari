<h2>Data Pembelian</h2>

<?php

$id_pem = $_GET['id'];

$ambil = $conn->query("SELECT * FROM pembayaran WHERE id_pem = '$id_pem'");
$detail = $ambil->fetch_assoc();

?>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?= $detail['nama'] ?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?= $detail['bank'] ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>Rp. <?= number_format($detail['jumlah']) ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?= $detail['tgl'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../foto_bukti/<?= $detail['bukti'] ?>" class="img-reponsive" width="200">
    </div>
</div>

<form method="post">
    <div class="form-group">
        <label for="">No. Resi Pengiriman</label>
        <input type="text" class="form-control" name="resi">
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select name="status" class="form-control">
            <option value="">Pilih Status</option>
            <option value="lunas">Lunas</option>
            <option value="barang dikirm">Barang Dikirim</option>
            <option value="batal">Batal</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php
if (isset($_POST['proses'])) {

    $resi = $_POST['resi'];
    $status = $_POST['status'];

    $conn->query("UPDATE pembelian SET resi = '$resi', status = '$status' WHERE id_pem = '$id_pem'");

    echo "<script>alert('Data pembelian terUpdate');</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";
}



?>