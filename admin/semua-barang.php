<?php

require '../functions/function.php';

$pakaian = query("SELECT * FROM barang WHERE kategori = 'pakaian' ORDER BY id_barang DESC");

$aksesoris = query("SELECT * FROM barang WHERE kategori = 'aksesoris' ORDER BY id_barang DESC");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
    <title>Waroutfit &mdash; Admin semua produk</title>

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
                            <a href="tambah-barang.php" class="nav-link"><i class="fa fa-plus"></i> <span>Tambah Produk</span></a>
                        </li>
                        <li>
                            <a href="semua-barang.php" class="nav-link"><i class="fas fa-share"></i><span>Semua Produk</span></a>
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
                                    <h4>Semua Produk</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6>Pakaian</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="row container-fluid mx-auto mt-5">
                                                <?php foreach ($pakaian as $pkn) : ?>
                                                    <div class="container-fluid card card-barang mb-4 shadow-sm" style="width: 14rem;" data-bs-toggle="tooltip" title="">
                                                        <img src="../assets/img-barang/<?= $pkn['gambar']; ?>" class="card-img-top img-fluid" alt="...">
                                                        <div class="card-body">
                                                            <p class="card-title fw-bold text-capitalize"><?= $pkn['nama_barang']; ?></p>
                                                            <ul class="list-unstyled">
                                                                <li>Kategori : <?= $pkn['kategori']; ?></li>
                                                                <li>Stok : <?= $pkn['stok']; ?></li>
                                                                <li>Harga : <?= rupiah($pkn['harga']); ?></li>
                                                            </ul>
                                                            <a href="edit-barang.php?id=<?= $pkn['id_barang']; ?>" class="btn btn-secondary">Edit</a>
                                                            <a href="../functions/delete-barang.php?id=<?= $pkn['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')">Hapus</a>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6>Aksesoris</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="row container-fluid mx-auto mt-5">
                                                <?php foreach ($aksesoris as $aks) : ?>
                                                    <div class="container-fluid card card-barang mb-4 shadow-sm" style="width: 14rem;" data-bs-toggle="tooltip" title="">
                                                        <img src="../assets/img-barang/<?= $aks['gambar']; ?>" class="card-img-top img-fluid" alt="...">
                                                        <div class="card-body">
                                                            <p class="card-title fw-bold text-capitalize"><?= $aks['nama_barang']; ?></p>
                                                            <ul class="list-unstyled">
                                                                <li>Kategori : <?= $aks['kategori']; ?></li>
                                                                <li>Stok : <?= $aks['stok']; ?></li>
                                                                <li>Harga : <?= $aks['harga']; ?></li>
                                                            </ul>
                                                            <a href="edit-barang.php?id=<?= $aks['id_barang']; ?>" class="btn btn-secondary">Edit</a>
                                                            <a href="../functions/delete-barang.php?id=<?= $aks['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')">Hapus</a>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
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