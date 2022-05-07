<?php
require 'koneksi.php';

$id = $_GET["id"];

if (
  mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = $id")
) {
  echo "<script>
      alert('Data berhasil dihapus!');
      document.location.href = '../admin/semua-barang.php';
    </script>";
} else {
  echo "<script>
      alert('Data gagal dihapus!');
      document.location.href = '../admin/semua-barang.php';
    </script>";
}
