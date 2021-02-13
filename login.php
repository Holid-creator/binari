<?php

session_start();
include 'koneksi.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <title>Login Pelanggan</title>
</head>

<body>

    <?php include 'menu.php'; ?>

    <!-- konten -->
    <div class="container">
        <div class="login-container">
            <div class="avatar"></div>
            <div class="form-box">

                <form method="post">
                    <!-- <div class="form-group"> -->
                    <!-- <label for="">Email</label> -->
                    <input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email">
                    <!-- </div> -->
                    <!-- <div class="form-group"> -->
                    <!-- <label for="">Password</label> -->
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                    <!-- </div> -->
                    <button class="btn btn-info btn-block login" name="login" id="login">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

    <?php
    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $ambil = $conn->query("SELECT * FROM pelanggan WHERE e_plg = '$email' AND pass_plg = '$pass'");
        $akuncocok = $ambil->num_rows;

        if ($akuncocok == 1) {

            $akun = $ambil->fetch_assoc();
            $_SESSION['pelanggan'] = $akun;

            echo "<script>alert('Anda berhasil login');</script>";

            // Jika sudah belanja
            if (isset($_SESSION['keranjang']) or !empty($_SESSION['keranjang'])) {

                echo "<script>location='checkout.php';</script>";
            } else {

                echo "<script>location='riwayat.php';</script>";
            }
        } else {

            echo "<script>alert('Anda gagal login');</script>";
            echo "<script>location='login.php';</script>";
        }
    }

    ?>

</body>

<script>
    $(function() {
        var textfield = $("input[name=user]");
        $('button[type="submit"]').click(function(e) {
            e.preventDefault();
            //little validation just to check username
            if (textfield.val() != "") {
                //$("body").scrollTo("#output");
                $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back " + "<span style='text-transform:uppercase'>" + textfield.val() + "</span>");
                $("#output").removeClass(' alert-danger');
                $("input").css({
                    "height": "0",
                    "padding": "0",
                    "margin": "0",
                    "opacity": "0"
                });
                //change button text 
                $('button[type="submit"]').html("continue")
                    .removeClass("btn-info")
                    .addClass("btn-default").click(function() {
                        $("input").css({
                            "height": "auto",
                            "padding": "10px",
                            "opacity": "1"
                        }).val("");
                    });

                //show avatar
                $(".avatar").css({
                    "background-image": "url('http://api.randomuser.me/0.3.2/portraits/women/35.jpg')"
                });
            } else {
                //remove success mesage replaced with error message
                $("#output").removeClass(' alert alert-success');
                $("#output").addClass("alert alert-danger animated fadeInUp").html("sorry enter a username ");
            }
            //console.log(textfield.val());

        });
    });
</script>

</html>