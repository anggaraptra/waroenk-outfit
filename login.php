<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <title>Hello, Code!</title>
    <link rel="stylesheet" href="assets/css/style-login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="overlay"></div>
    <form action="functions/login.php" method="post" class="box">
        <div class="header">
            <h4>Login Ke Akun Anda</h4>
        </div>
        <div class="login-area">
            <input type="text" class="username" name="username" placeholder="Username / Email">
            <input type="password" class="password" name="password" placeholder="Password">
            <input type="submit" value="Login" class="submit" name="submit">
            <a href="signup.php">Tidak punya akun?</a>

            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                } else if ($_GET["error"] == "wronglogin") {
                    echo "<p>Incorrect login information!</p>";
                }
            }
            ?>
        </div>
    </form>
</body>

</html>