<?php
session_start();
require 'config.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "log">
        <div class="login">
            <h1>Login</h1>
        </div>
    </div>
    <?php
    
    if (isset($error)) {
        echo "<p style='color: red'>Username atau password salah!</p>";
    }

    ?>
    <div class = "logg">
    <form action="" method="post">
        <label for="">Username : </label>
        <input type="text" name="username"> <br><br>
        <label for="">Password : </label>
        <input type="password" name="password"> <br><br>
        <input type="submit" value ="Login" name="login">
    </form>
    <a href="registrasi.php"> Registrasi </a>
    </div>
    
   </div>

</body>
</html>