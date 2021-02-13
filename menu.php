<nav class="nav navbar-default">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><img src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="Malas Ngoding"></li>
            <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="keranjang.php"><i class="glyphicon glyphicon-shopping-cart"></i> Keranjang</a></li>

            <?php if (isset($_SESSION['pelanggan'])) : ?>
                <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                <li><a href="riwayat.php"><i class="glyphicon glyphicon-retweet"></i> Riwayat Belanja</a></li>

            <?php else : ?>
                <li><a href="login.php"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>
                <li><a href="daftar.php"><i class="glyphicon glyphicon-user"></i> Daftar</a></li>
            <?php endif ?>
            <li><a href="checkout"><i class="glyphicon glyphicon-share"></i> Checkout</a></li>
        </ul>

        <form action="pencarian.php" method="get" class="navbar-form navbar-right">
            <input type="text" class="form-control" name="keyword">
            <button class="btn btn-primary">Cari</button>
        </form>
    </div>
</nav>
<br>