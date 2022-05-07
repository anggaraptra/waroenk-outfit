<?php

require '../functions/koneksi.php';
require '../functions/function.php';

if (isset($_POST['submitTambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
      alert('Produk baru berhasil ditambahkan!');
      document.location.href = 'index.php';
    </script>";
    } else {
        echo "<script>
      alert('Produk baru gagal ditambahkan!');
      document.location.href = 'index.php';
    </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
    <title>Waroutfit &mdash; Admin tambah produk</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i class="far fa-envelope"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.php">WAROUTFIT</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.php">WFIT</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li>
                            <a href="index.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Pages</li>
                        <li>
                            <a href="tambah-barang.php" class="nav-link"><i class="fas fa-plus"></i><span>Tambah Produk</span></a>
                        </li>
                        <li>
                            <a href="semua-barang.php" class="nav-link"><i class="fa fa-share"></i> <span>Semua Produk</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header shadow-sm">
                                    <h4>Tambah Data Produk</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td><label for="kodeBarang">Kode Produk</label></td>
                                                <td></td>
                                                <td><input type="number" name="kodeBarang" id="kodeBarang" class="form-control" autocomplete="off" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="namaBarang">Nama Produk</label></td>
                                                <td></td>
                                                <td><input type="text" name="namaBarang" id="namaBarang" class="form-control" autocomplete="off" required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="kategori">Kategori</label></td>
                                                <td></td>
                                                <td><select class="form-control" id="kategori" name="kategori" required>
                                                        <option value=""></option>
                                                        <option value="pakaian">Pakaian</option>
                                                        <option value="aksesoris">Aksesoris</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><label for="stok">Stok</label></td>
                                                <td></td>
                                                <td><input type="number" name="stok" id="stok" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="harga">Harga</label></td>
                                                <td></td>
                                                <td><input type="number" name="harga" id="harga" class="form-control" autocomplete="off" placeholder="Rp. " required></td>
                                            </tr>
                                            <tr>
                                                <td><label for="gambar">Gambar</label></td>
                                                <td></td>
                                                <td><input type="file" name="gambar" id="gambar"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><button type="submit" name="submitTambah" class="btn btn-primary mt-1">Tambah</button></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <div class="bullet"></div><a href="../index.php">WAROUTFIT</a>
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/jquery.sparkline.min.js"></script>
    <script src="assets/modules/chart.min.js"></script>
    <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="assets/modules/summernote/summernote-bs4.js"></script>
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="assets/js/page/index.js"></script>

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>