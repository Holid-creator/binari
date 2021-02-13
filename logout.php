<?php
session_start();

session_destroy();

echo "<script>alert('Anda telah Logout');</script>";
echo "<script>location='index.php';</script>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">

    <title>Checkout</title>
</head>

<body>

    <?php include 'menu.php'; ?>

</body>

</html>