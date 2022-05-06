<?php
// koneksi
$host = "localhost";
$user = "root";
$pass = "";
$db = "waroenk_outfit";
$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}