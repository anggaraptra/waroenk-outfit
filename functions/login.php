<?php

// jika tombol submit login ditekan
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    require_once 'koneksi.php';
    require_once 'function.php';

    if (emptyInputsLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($koneksi, $username, $pwd);
} else {
    header("location: ../login.php");
    exit();
}
