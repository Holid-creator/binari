<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION['pelanggan'])) {

    echo "<script>alert('Anda Harus Login Terlebih Dahulu');</script>";
    echo "<script>location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <script src="admin/assets/js/jquery.min.js"></script>

    <title>Checkout</title>
</head>

<body>

    <?php include 'menu.php'; ?>

    <!-- Konten -->
    <section class="konten">
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php $totalberat = 0; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach ($_SESSION['keranjang'] as $id_pro => $jml) : ?>

                        <!-- Menampilkan product berdasarkan id product -->
                        <?php

                        $ambil = $conn->query("SELECT * FROM product WHERE id_pro = '$id_pro'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah['hrg_pro'] * $jml;

                        // sub berat diperoleh dari berat produck x jumlah
                        $sub_brt = $pecah['berat'] * $jml;

                        // total berat
                        $totalberat += $sub_brt;

                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pecah['n_pro']; ?></td>
                            <td>Rp. <?= number_format($pecah['hrg_pro']); ?></td>
                            <td><?= $jml; ?></td>
                            <td>Rp. <?= number_format($subharga); ?></td>
                        </tr>
                        <?php $totalbelanja += $subharga ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?= number_format($totalbelanja) ?></th>
                    </tr>
                </tfoot>
            </table>

            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="<?= $_SESSION['pelanggan']['n_plg'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="<?= $_SESSION['pelanggan']['telp_plg'] ?>">
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <select name="id_ongkir" class="form-control" required>
                            <option value="">Pilih Ongkir</option>
                            <?php

                            $ambil = $conn->query("SELECT * FROM ongkir");
                            while ($perongkir = $ambil->fetch_assoc()) { ?>

                                <option value="<?= $prongkir['id_ongkir'] ?>">
                                    <?= $perongkir['nama_kota'] ?>
                                    Rp. <?= $perongkir['tarif'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div> -->
                </div>

                <div class="form-group">
                    <label for="">Alamat Pengiriman</label><br>
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Pengiriman Anda"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="n_provinsi" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Distrik</label>
                            <select name="n_distrik" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Ekspedisi</label>
                            <select name="n_ekspedisi" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Paket</label>
                            <select name="nama_paket" class="form-control">

                            </select>
                        </div>
                    </div>
                </div>
                <input type="text" name="tberat" value="<?= $totalberat; ?>">
                <input type="text" name="provinsi">
                <input type="text" name="distrik">
                <input type="text" name="tipe">
                <input type="text" name="kodepos">
                <input type="text" name="ekspedisi">
                <input type="text" name="paket">
                <input type="text" name="ongkir">
                <input type="text" name="estimasi">

                <button class="btn btn-primary" name="checkout">
                    <i class="glyphicon glyphicon-export"></i> Checkout </a>
                </button>

            </form>

            <?php

            if (isset($_POST['checkout'])) {

                $id_plg = $_SESSION['pelanggan']['id_plg'];
                $tanggal = date('Y-m-d');
                $alamat = $_POST['alamat'];

                $tberat = $_POST['tberat'];
                $provinsi = $_POST['provinsi'];
                $distrik = $_POST['distrik'];
                $tipe = $_POST['tipe'];
                $kodepos = $_POST['kodepos'];
                $ekspedisi = $_POST['ekspedisi'];
                $paket = $_POST['paket'];
                $ongkir = $_POST['ongki'];
                $estimasi = $_POST['estimasi'];

                $totalpembelian = $totalbelanja + $ongkir;

                // 1. Menyimpan Data ke table pembelian
                $conn->query("INSERT INTO pembelian (id_plg, tgl_pem, to_pem, alamat, tberat, provinsi, distrik, tipe, kodepos, ekspedisi, paket, ongkir, estimasi) VALUES('$id_plg', '$tanggal', '$totalpembelian', '$alamat', '$tberat', '$provinsi', '$distrik', '$tipe', '$kodepos', '$ekspedisi', '$paket', '$ongkir', '$estimasi')");

                // // mendapatkan id pembelian barusan terjadi
                $id_pem_brsn = $conn->insert_id;

                foreach ($_SESSION['keranjang'] as $id_pro => $jml) {

                    // Mendapatkan data product berdasarkan id produck
                    $ambil = $conn->query("SELECT * FROM product WHERE id_pro = '$id_pro'");
                    $perpro = $ambil->fetch_assoc();

                    $nama = $perpro['n_pro'];
                    $harga = $perpro['hrg_pro'];
                    $berat = $perpro['berat'];

                    $sub_brt = $perpro['berat'] * $jml;
                    $sub_hrg = $perpro['hrg_pro'] * $jml;

                    $conn->query("INSERT INTO pem_product (id_pem, id_pro, nama, harga, berat, sub_brt, sub_hrg, jumlah) VALUES ('$id_pem_brsn', '$id_pro', '$nama', '$harga', '$berat', '$sub_brt', '$sub_hrg', '$jml')");
                }

                // mengkosongkan keranjang belanja
                unset($_SESSION['keranjang']);

                // tampilan dialhkan ke halaman nota
                echo "<script>alert('Pembelian Sukses');</script>";
                echo "<script>location='nota.php?id=$id_pem_brsn';</script>";
            }

            ?>

        </div>
    </section>

    <!-- <pre><?php print_r($_SESSION['pelanggan']) ?></pre>
    <pre><?php print_r($_SESSION['keranjang']) ?></pre> -->

</body>

</html>

<?php include 'footer.php'; ?>
<script>
    $(document).ready(function() {

        $.ajax({
            type: 'post',
            url: 'dataprovinsi.php',
            success: function(hasil_provinsi) {

                $('select[name = n_provinsi]').html(hasil_provinsi);
            }
        });

        $('select[name = n_provinsi]').on('change', function() {
            // ambil id provinsi yg dipilih dari attribut pribadi
            var id_provinsi_terpilih = $('option:selected', this).attr('id_provinsi');
            $.ajax({
                type: 'post',
                url: 'datadistrik.php',
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_distrik) {

                    $('select[name = n_distrik]').html(hasil_distrik);
                }
            });
        });

        $.ajax({
            type: 'post',
            url: 'dataekspedisi.php',
            success: function(hasil_ekspedisi) {

                $('select[name = n_ekspedisi]').html(hasil_ekspedisi);
            }
        });

        $('select[name = n_ekspedisi]').on('change', function() {

            // mendapatkan data ongkir

            // mendapatkan ekspedisi yg dipilih
            var ekspedisi_terpilih = $('select[name = n_ekspedisi]').val();

            // mendapatkan id distrik yg dipilih pengguna
            var distrik_terpilih = $('option:selected', 'select[name = n_distrik]').attr('id_distrik');

            // mendapatkan total berat dari inputan
            var tberat = $('input[name=tberat]').val();

            $.ajax({
                type: 'post',
                url: 'datapaket.php',
                data: 'ekspedisi =' + ekspedisi_terpilih + '&distrik=' + distrik_terpilih + '&berat=' + tberat,
                success: function(hasil_paket) {

                    // console.log(hasil_paket0);
                    $('select[name = nama_paket]').html(hasil_paket);

                    // letakkan nama ekpedisi terpilih diinput ekspedisi
                    $('input[name = ekspedisi]').val(ekspedisi_terpilih);
                }
            })
        });

        $('select[name=n_distrik]').on('change', function() {
            var prov = $('option:selected', this).attr('n_provinsi');
            var dist = $('option:selected', this).attr('n_distrik');
            var tipe = $('option:selected', this).attr('tipe_distrik');
            var kodepos = $('option:selected', this).attr('kodepos');

            $('input[name=provinsi]').val(prov);
            $('input[name=distrik]').val(dist);
            $('input[name=tipe]').val(tipe);
            $('input[name=kodepos]').val(kodepos);
        });

        $('select[name=nama_paket]').on('change', function() {

            var paket = $('option:selected', this).attr('paket');
            var ongkir = $('option:selected', this).attr('ongkir');
            var etd = $('option:selected', this).attr('etd');
            $('input[name=paket]').val(paket);
            $('input[name=ongkir]').val(ongkir);
            $('input[name=estimasi]').val(etd);
        })
    });
</script>