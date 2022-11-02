<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require "config.php";
if(isset($_GET['id'])){
    $query = mysqli_query($db,"SELECT * FROM pattimura WHERE id=$_GET[id]");
    $result = mysqli_fetch_assoc($query);
    $nama = $result['nama'];
    $suku = $result['suku'];
    $agama = $result['agama'];
    $tanggal_lahir = $result['tanggal_lahir'];
    $alamat = $result['alamat'];
}

if(isset($_POST['submit'])){
    $query = mysqli_query($db,"UPDATE pattimura SET nama='$_POST[nama]',suku='$_POST[suku]',agama='$_POST[agama]',tanggal_lahir='$_POST[tanggal_lahir]',alamat='$_POST[alamat]' WHERE id=$_GET[id]");
    if($query){
        header("Location:index.php");
    } else {
        echo "Update gagal";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <h1 class="judul">Sistem data Pattimura</h1>
    
    <div class="form-class">
        <h3>Edit Data Pattimura</h3>
        <form action="" method="post">
            <label for="">Nama Lengkap</label><br>
            <input type="text" name="nama" class="form-text" value='<?=$nama?>'><br>
            
            <label for="">suku</label><br>
            <input type="text" name="suku" class="form-text" value='<?=$suku?>'><br>
            
            <label for="">agama</label><br>
            <input type="agama" name="agama" class="form-text" value='<?=$agama?>'><br>
            
            <label for="">tanggal_lahir</label><br>
            <input type="text" name="tanggal_lahir" class="form-text" value='<?=$tanggal_lahir?>'><br>

            <label for="">Alamat</label><br>
            <textarea name="alamat" cols="64" rows="10" ><?=$alamat?></textarea><br>
            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        </form>
    </div>

</body>
</html>