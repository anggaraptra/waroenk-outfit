<?php
require 'functions/koneksi.php';
require 'functions/function.php';

session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$barang = query("SELECT * FROM barang WHERE id_barang = $id")[0];

if (isset($_POST["submitBeli"])) {
    if (beli($_POST) > 0) {
        echo "<script>
            alert('Pesanan segera diproses! Silahkan ditunggu');
            document.location.href= 'index.php';
          </script>";
    } else {
        echo "<script>
            alert('Pesanan gagal! Silahkan dipesan lagi');
            document.location.href= 'pesan.php';
          </script>";
    }
}

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
    <!-- css -->
    <link rel="stylesheet" href="assets/css/style-beli.css">
    <title>Waroutfit &mdash; Beli produk</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php"><span>WAR</span>OUTFIT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
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

    <!-- beli -->
    <section id="beli">
        <div class="container-fluid">
            <form action="" method="post">
                <div class="row mt-4 mb-4">
                    <div class="col-md-2"></div>

                    <!-- Bagian Produk -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nama-produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control text-capitalize" id="nama-produk" name="nama_barang" value="<?= $barang["nama_barang"]; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="harga-produk" class="form-label">Harga Produk</label>
                            <input type="text" class="form-control" id="harga-produk" name="harga" value="<?= rupiah($barang["harga"]); ?>" readonly>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="" class="form-label d-flex">Gambar Produk</label>
                            <img src="assets/img-barang/<?= $barang["gambar"]; ?>" width="200" height="200" class="img-fluid mt-3 rounded shadow-sm" alt="">
                        </div>
                    </div>

                    <!-- Bagian Pembeli -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nama-anda" class="form-label">Nama Pemesan</label>
                            <input value="<?= $_SESSION['username']; ?>" type="text" class="form-control" id="nama-anda" name="nama_pemesan" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label d-flex">Jumlah Pesanan</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah_pesanan" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="totalHarga" class="form-label">Total Pesanan</label>
                            <input type="text" value="<?= rupiah($barang["harga"]); ?>" class="form-control" id="totalHarga" name="total_pesanan" readonly>
                        </div>
                        <button type="submit" name="submitBeli" class="btn btn-success mt-1">Beli</button></button>
                    </div>

                    <div class="col-md-2"></div>
                </div>
            </form>
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
            <p>© Copyright Waroenk Outfit - All Rights Reserved</p>
        </div>
    </footer>

    <!-- assets -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>