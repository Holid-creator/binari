<?php

include '../koneksi.php';

// Require composer autoload
require_once '../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
// $mpdf->WriteHTML('$isi');

// Output a PDF file directly to the browser
// $mpdf->Output('laporan.pdf', 'I');

echo "<pre>";
print_r($_GET);
echo "<pre>";

$tmulai = $_GET['tglm'];
$tselesai = $_GET['tgls'];
$status = $_GET['status'];
$alldata = array();
$ambil = $conn->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm . id_plg = pl . id_plg WHERE status = '$status' AND tgl_pem BETWEEN '$tmulai' AND '$tselesai'");
while ($pecah = $ambil->fetch_assoc()) {

    $alldata[] = $pecah;
}

$isi = "<h3>Laporan Pembelian " . $status . "</h3>";
$isi = "<h5>Mulai" . date('d F Y', strtotime($tmulai)) . "Hingga" . date('d F Y', strtotime($tselesai)) . "</h5>";

$isi .= "<table class='table table-bordered' border='1'>";
$isi .= "<thead>";
$isi .= "<tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Tanggal</th>
        <th>Jumlah</th>
        <th>Status</th>
        </tr>";
$isi .= "</thead>";

$isi .= "<tbody>";
$total = 0;
foreach ($alldata as $key => $value) :
    $total += $value['to_pem'];
    $no = $key + 1;
    $isi .= "<tr>";
    $isi .= "<td>" . $no . "</td>";
    $isi .= "<td>" . $value['n_plg'] . "</td>";
    $isi .= "<td>" . date('d F Y', strtotime($value['tgl_pem'])) . "</td>";
    $isi .= "<td>Rp." . number_format($value['to_pem']) . "</td>";
    $isi .= "<td>" . $value['status'] . "</td>";
    $isi .= "</tr>";
endforeach;
$isi .= "</tbody>";

$isi .= "<tfoot>";
$isi .= "<tr>";
$isi .= "<th colspan='3'>Total</th>";
$isi .= "<th>Rp. <?= number_format($total) ?></th>";
$isi .= "<th></th>";
$isi .= "</tr>";
$isi .= "</tfoot>";
$isi .= "</table>";


$mpdf->writeHTML($isi);

// output PDF
$mpdf->output('laporan.pdf', 'I');
