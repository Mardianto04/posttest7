<?php

require 'config.php';
if (isset($_POST['regis'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password === $cpassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $result = mysqli_query($db, "SELECT username FROM akun WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "
                <script>
                    alert('Username telah digunakan kreatif brooo!');
                    location.href = 'registrasi.php';
                </script>
            ";
        } else {
            $sql = "INSERT INTO akun VALUES (' ', '$username', '$password')";
            $result = mysqli_query($db, $sql);
            if (mysqli_affected_rows($db) > 0) {
                echo "
                    <script>
                        alert('Berhasil Registrasi!');
                        location.href = 'login.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Gagal Registrasi!');
                        location.href = 'registrasi.php';
                    </script>
                ";
            }
        }
    } else {
        echo "
            <script>
                alert('Password anda salah!');
                location.href = 'registrasi.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "regis">
    <center><h3>Registrasi</h3></center>
    <br>
    <form action="" method="post">
        <label for="">Username :</label>
        <input type="text" name="username" id=""> <br><br>
        <label for="">Password :</label>
        <input type="password" name="password" id=""> <br><br>
        <label for="">Confirm Password :</label>
        <input type="password" name="cpassword" id=""> <br><br>
        <center><button class = "btn" type="submit" name="regis">
            <div class="btn">
                Registrasi
            </div>
        </button><center>
    </form>
    </div>
</body>
</html>