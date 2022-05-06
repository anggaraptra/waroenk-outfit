<?php

// jika tombol submit signup ditekan
if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nohp = $_POST['no-hp'];
    $pwd = $_POST['password'];
    $pwdRepeat = $_POST['password-repeat'];

    require_once 'koneksi.php';
    require_once 'function.php';

    if (emptyInputsSignup($username, $email, $nohp, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (usernameExist($koneksi, $username, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($koneksi, $username, $email, $nohp, $pwd, $pwdRepeat);
} else {
    header("location: ../signup.php");
    exit();
}
