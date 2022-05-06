<?php
require 'functions/function.php';
require 'functions/koneksi.php';

$barang = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id_barang DESC");

if (isset($_POST['tambahData'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
      alert('Produk baru berhasil ditambahkan!');
      document.location.href = '';
    </script>";
    } else {
        echo "<script>
      alert('Produk baru gagal ditambahkan!');
      document.location.href = '';
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
    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <!-- mycss -->
    <link rel="stylesheet" href="css/style-admin.css">
    <title>Admin</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>INPUT BARANG</th>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>:</td>
                <td><input type="number" name="kodeBarang"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="namaBarang"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td><select name="kategori" id="kategori">
                        <option value=""></option>
                        <option value="pakaian">Pakaian</option>
                        <option value="aksesoris">Aksesoris</option>
                    </select></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input type="number" name="stok" id="stok"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="number" name="harga" id="harga"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td><input type="file" name="gambar" id="gambarBarang" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="tambahData" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <div class="row container-fluid mx-auto mt-5">
        <?php while ($brng = mysqli_fetch_array($barang)) : ?>
            <div class="container-fluid card card-barang mb-4" style="width: 14rem;" data-bs-toggle="tooltip" title="">
                <img src="assets/img-barang/<?= $brng['gambar'] ?>" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <p class="card-title fw-bold"><?= $brng[2]; ?></p>
                    <p class="card-text"><?= rupiah($brng[5]); ?></p>
                    <a href="detail.php?id=<?= $brng['id_barang']; ?>" class="btn btn-primary">Detail</a>
                    <a href="edit.php?id=<?= $brng[0]; ?>" class="btn btn-secondary">Edit</a>
                    <a href="functions/delete-barang.php?id=<?= $brng[0]; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')">Hapus</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- assets -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>