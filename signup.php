<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <title>Hello, Outfit!</title>
    <link rel="stylesheet" href="assets/css/style-signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="overlay"></div>
    <form action="functions/signup.php" method="post" class="box">
        <div class="header">
            <h4>Register Akun</h4>
        </div>
        <div class="login-area">
            <input type="text" class="username" name="username" placeholder="Username">
            <input type="email" class="email" name="email" placeholder="Email">
            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="15" class="no-hp" name="no-hp" placeholder="No Hp">
            <input type="password" class="password" name="password" placeholder="Password">
            <input type="password" class="password" name="password-repeat" placeholder="Repeat Password">
            <input type="submit" name="submit" class="submit" value="Signup">
            <a href="login.php">Sudah punya akun? Login</a>


            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                } else if ($_GET["error"] == "invalidusername") {
                    echo "<p>Choose a proper username!</p>";
                } else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Choose a proper email!</p>";
                } else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p>Passwords doesn't match!</p>";
                } else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again!</p>";
                } else if ($_GET["error"] == "usernametaken") {
                    echo "<p>Username already taken!</p>";
                } else if ($_GET["error"] == "none") {
                    echo "<p>You have signed up!</p>";
                }
            }
            ?>
        </div>
    </form>

</body>

</html>