<?php
require 'functions/koneksi.php';
require 'functions/function.php';

$id = $_GET['id'];
$barang = query("SELECT * FROM barang WHERE id_barang = '$id'")[0];

if (isset($_POST['editBarang'])) {
    if (edit($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diedit!');
                document.location.href = 'admin.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diedit!');
                document.location.href = 'admin.php';
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
    <title>Edit Barang</title>
</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idBarang" value="<?= $barang['id_barang']; ?>">
        <input type="hidden" name="gambarLama" value="<?= $barang['gambar']; ?>">
        <table>
            <tr>
                <th>EDIT BARANG</th>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>:</td>
                <td><input type="number" name="kodeBarang" value="<?= $barang['kode_barang']; ?>"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="namaBarang" value="<?= $barang['nama_barang']; ?>"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td><select name="kategori" id="kategori">
                        <option value=""><?= $barang['kategori']; ?></option>
                        <option value="pakaian">Pakaian</option>
                        <option value="aksesoris">Aksesoris</option>
                    </select></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input type="number" name="stok" id="stok" value="<?= $barang['stok']; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="number" name="harga" id="harga" value="<?= $barang['harga']; ?>"></td>
            </tr>
            <tr>
                <td>Gambar Lama</td>
                <td>:</td>
                <td><img width="100" height="100" src="assets/img-barang/<?= $barang['gambar']; ?>" alt=""></td>
            </tr>
            <tr>
                <td>Gambar Baru</td>
                <td>:</td>
                <td><input type="file" name="gambar" id="gambarBarang" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="editBarang" value="Edit"></td>
            </tr>
        </table>
    </form>

    <!-- assets -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>