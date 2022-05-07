<?php

require_once 'koneksi.php';

// fungsi query atau mengambil data dari tabel database produk
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi tambah
function tambah($data)
{
    global $koneksi;
    $kodeBarang = htmlspecialchars($data["kodeBarang"]);
    $namaBarang = htmlspecialchars($data["namaBarang"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);

    // upload Gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO barang VALUES ('', '$kodeBarang', '$namaBarang', '$kategori', '$stok', '$harga' ,'$gambar')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function upload()
{
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
            alert('Pilih gambar!');
        </script>";
        return false;
    }

    // cek yang di upload gambar atau tidak
    $ekstensi_gambar_valid = ['jpg', 'jpeg', 'png', 'jfif'];
    $ekstensi_gambar = explode('.', $nama_file);
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));
    if (!in_array($ekstensi_gambar, $ekstensi_gambar_valid)) {
        echo "<script>
            alert('Yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    // cek jika ukuran gambar terlalu besar
    if ($ukuran_file > 2000000) {
        echo "<script>
            alert('Ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    // jika lolos pengecekan, gambar sudah bisa diupload
    // generate nama gambar baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_gambar;

    move_uploaded_file($tmp_name, '../assets/img-barang/' . $nama_file_baru);
    return $nama_file_baru;
}

// fungsi edit 
function edit($data)
{
    global $koneksi;
    $id = $data["idBarang"];
    $kodeBarang = htmlspecialchars($data["kodeBarang"]);
    $namaBarang = htmlspecialchars($data["namaBarang"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE barang SET
                kode_barang = '$kodeBarang',
                nama_barang = '$namaBarang',
                kategori = '$kategori',
                stok = '$stok',
                harga = '$harga',
                gambar = '$gambar'
                WHERE id_barang = '$id'
            ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fungsi edit status pesanan
function editStatus($data)
{
    global $koneksi;
    $id = $data["idPesanan"];
    $status = $data["statusPesanan"];

    $query =  "UPDATE pesanan SET status = '$status' WHERE id_pesanan = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi cari barang
function cari($data)
{
    $query = "SELECT * FROM barang
                WHERE
            nama_barang LIKE '%$data%' OR
            kategori LIKE '%$data%'";

    return query($query);
}

// fungsi untuk membeli produk
function beli($data)
{
    global $koneksi;

    $nama_pemesan = $data['nama_pemesan'];
    $nama_barang = $data['nama_barang'];
    $jumlah_pesanan = htmlspecialchars($data['jumlah_pesanan']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $total_pesanan = $data['total_pesanan'];
    $proses = "proses";

    $query = "INSERT INTO pesanan
    VALUES
    ('', '$nama_pemesan', '$nama_barang', '$jumlah_pesanan', '$keterangan', '$total_pesanan', '$proses')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi sign up
function emptyInputsSignup($username, $email, $nohp, $pwd, $pwdRepeat)
{
    $result = '';

    if (empty($username)  || empty($email) || empty($nohp) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidUsername($username)
{
    $result = '';

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email)
{
    $result = '';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
    $result = '';
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function usernameExist($koneksi, $username, $email)
{
    $result = '';
    $sql = "SELECT * FROM user WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($koneksi);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function  createUser($koneksi, $username, $email, $nohp, $pwd)
{
    $result = '';
    $sql = "INSERT INTO user (username, email, no_hp, password, level) VALUES (?, ?, ?, ?, 'user');";
    $stmt = mysqli_stmt_init($koneksi);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $nohp, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();
}

// fungsi login
function emptyInputsLogin($username, $pwd)
{
    $result = '';
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function loginUser($koneksi, $username, $pwd)
{
    $result = '';
    $usernameExists = usernameExist($koneksi, $username, $username);

    if ($usernameExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $usernameExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["username"] = $usernameExists["username"];
        header("location: ../index.php");
        exit();
    }
}

// fungsi format rupiah
function rupiah($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
