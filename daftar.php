<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <title>Daftar</title>
</head>

<body>

    <?php include 'menu.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-7">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-7">
                                    <input type="password" class="form-control" name="pass" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Alamat</label>
                                <div class="col-md-7">
                                    <textarea name="alamat" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Telepon</label>
                                <div class="col-md-7">
                                    <input type="text" name="telp" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button class="btn btn-primary" name="daftar">Daftar</button>
                                </div>
                            </div>
                        </form>

                        <?php

                        // jika ada tombol daftar
                        if (isset($_POST['daftar'])) {

                            // Mengambil isian nama, email, alamat dan telepon
                            $nama = $_POST['nama'];
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];

                            $alamat = $_POST['alamat'];
                            $telp = $_POST['telp'];

                            // Cek apakah email sudah digunakan
                            $ambil = $conn->query("SELECT * FROM pelanggan WHERE e_plg = '$email'");
                            $temail = $ambil->num_rows;

                            if ($temail == 1) {

                                echo "<script>alert('Pendaftaran Gagal, Email Sudah digunakan');</script>";
                                echo "<script>location='daftar.php';</script>";
                            } else {
                                $conn->query("INSERT INTO pelanggan(e_plg, pass_plg, n_plg, telp_plg, alamat) VALUES('$email', '$pass', '$nama', '$telp', '$alamat')");

                                echo "<script>alert('Pendaftaran Berhasil, Silahkan Login');</script>";
                                echo "<script>location='login.php';</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>