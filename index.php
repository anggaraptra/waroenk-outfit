<?php
require 'functions/koneksi.php';
require 'functions/function.php';

$barang = query("SELECT * FROM barang ORDER BY id_barang DESC LIMIT 5");

if (isset($_POST["submitCari"])) {
    $barang = cari($_POST["keyword"]);
}

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <!-- icon -->
    <link rel="stylesheet" href="assets/fontawesome-free-5.15.4-web/css/all.min.css">
    <!-- mycss -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Waroutfit &mdash; Beranda</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href=""><span>WAR</span>OUTFIT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="pakaian.php">Pakaian</a></li>
                            <li><a class="dropdown-item" href="aksesoris.php">Aksesoris</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                </ul>
                <form method="post" action="" class="d-flex w-100">
                    <input name="keyword" class="form-control me-2" type="search" placeholder="Cari Produk..." aria-label="Search" autofocus required>
                    <button name="submitCari" class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>

                <?php
                if (isset($_SESSION["username"])) {
                    echo '<ul class="navbar-nav ms-auto mb-2 text-center mb-lg-0">
                        <li class="nav-item">
                            <a href="functions/logout.php" class="nav-link">Logout</a>
                        </li>
                    </ul>';
                } else {
                    echo '
                        <ul class="navbar-nav ms-auto mb-2 text-center mb-lg-0">
                            <li class="nav-item">
                                <a href="signup.php" class="nav-link">Daftar</a>
                            </li>
                            <li class="nav-item">
                                <a href="login.php" class="nav-link">Login</a>
                            </li>
                        </ul>';
                }
                ?>

            </div>
        </div>
    </nav>



    <!-- carousel -->
    <?php
    if (isset($_SESSION["username"])) {
        echo '
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 d-none d-lg-block">
                    <div class="notif-user alert alert-primary alert-dismissible fade show w-50" role="alert">
                    <strong>Hello ' . $_SESSION["username"] . '!</strong> Silahkan pilih produk yang ingin anda beli!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
    ?>
    <section id="carousel">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div id="carouselExampleIndicators" class="carousel slide shadow-sm" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner rounded">
                            <div class="carousel-item active">
                                <img src="assets/img/baju.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/celana.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/sepatu.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                    <img src="assets/img/pakaian.png" class="mb-2 img-fluid rounded shadow-sm" alt="">
                    <img src="assets/img/aksesoris.png" class="img-fluid rounded shadow-sm" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- produk terbaru -->
    <section id="produkTerbaru">
        <div class="container-fluid mb-4">
            <div class="row">
                <div class="col p-3">
                    <h3 class="fw-normal">Produk Terbaru</h3>
                </div>
            </div>
            <div class="row container-fluid mx-auto">
                <?php foreach ($barang as $brng) : ?>
                    <div class="container-fluid card card-barang mb-4 shadow-sm" style="width: 14rem;" data-bs-toggle="tooltip" title="">
                        <img src="assets/img-barang/<?= $brng["gambar"]; ?>" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <p class="card-title fw-bold text-capitalize"><?= $brng["nama_barang"]; ?></p>
                            <p class="card-text"><?= rupiah($brng["harga"]); ?></p>
                            <a href="detail.php?id=<?= $brng['id_barang']; ?>" class="btn btn-primary">Detail</a>
                            <a href="beli.php?id=<?= $brng['id_barang']; ?>" class="btn btn-success">Beli</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row lihat-semua-produk">
                <div class="col p-3">
                    <a href="shop.php" class="">Lihat Semua Produk???</a>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="container-fluid text-dark p-3">
        <div class="row mt-3 mb-3">
            <div class="col-lg-3 footer-logo">
                <img src="assets/img/logo.png" class="img-fluid" alt="">
            </div>
            <div class="col-lg-3 mb-3">
                <h6 class="fw-bold">Sosial Media Kami</h6>
                <div class="d-flex footer-sosmed">
                    <div class="p-2"><a href="#"><i class="fab fa-instagram"></i></a></div>
                    <div class="p-2"><a href="#"><i class="fab fa-facebook"></i></a></div>
                    <div class="p-2"><a href="#"><i class="fab fa-twitter"></i></a></div>
                    <div class="p-2"><a href="#"><i class="fas fa-envelope"></i></a></div>
                </div>
            </div>
            <div class="layanan col-lg-3">
                <h6 class="fw-bold">Layanan</h6>
                <ul class="list-unstyled">
                    <li><a href="">Pusat Bantuan</a></li>
                    <li><a href="">Cara Pembelian</a></li>
                    <li><a href="">Pengembalian jika ada masalah</a></li>
                </ul>
            </div>
            <div class="col-lg-3 footer-about">
                <h6 class="fw-bold">Tentang Kami</h6>
                <p>Waroenk Outfit adalah website toko online yang menjual berbagai produk pakaian maupun aksesoris</p>
            </div>
        </div>
        <div class="text-center footer-copy mt-3">
            <p>?? Copyright Waroenk Outfit - All Rights Reserved</p>
        </div>
    </footer>

    <!-- assets -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>