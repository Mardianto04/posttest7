<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <h1 class="judul">Sistem Data Pattimura </h1>
    <div class = "warp">
                <div class ="search">
                    <form action="" method="get">
                    <input type="text" name="keyword">
                    <tr class = tombol><button type="submit" name="cari">Cari</button></tr>
                </form>
                </div>
    
    <div class="list-table center" style="overflow-x: auto;"> 
        <h3><?php
        date_default_timezone_set("Asia/Makassar");
        $waktu = strtotime("now");
        echo "Hari ini : ".date("l, Y/m/d H:i:sa",$waktu);?></h3>
        <table > 
            <thead>
                <tr>
                    <th colspan="7" class="thead">
                        <h3 class="center">Data Pattimura</h3>
                    </th>
                    <th style="width: 20px;" colspan="3">
                        <a href="formulir.php" class="tambah">Tambah</a>
                    </th>
                </tr>
              
                <tr>
                </div>
                    <th>No</th>
                    <th nowrap>Nama Lengkap</th>
                    <th>suku</th>
                    <th>agama</th>
                    <th>tanggal_lahir</th>
                    <th>Alamat</th>
                    <th>Waktu</th>
                    <th>Gambar</th>
                    <th colspan="2">Aksi</th>
                </tr> 
                
                
            </thead>
            
            <tbody>
                <?php
                require "config.php";
                
                if (isset($_GET['cari'])) {
                    $keyword = $_GET['keyword'];

                    $query = mysqli_query($db, "SELECT * FROM pattimura WHERE nama LIKE '%$keyword%'
                    OR suku LIKE '%$keyword%' OR agama LIKE '%$keyword%' OR tanggal_lahir LIKE '%$keyword%'
                    OR alamat LIKE '%$keyword%' OR waktu LIKE '%$keyword%'");
                } else {
                    $query = mysqli_query($db, "SELECT * FROM pattimura"); //109
                }

                $i = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td nowrap><?=$row['nama']?></td>
                        <td><?=$row['suku']?></td>
                        <td><?=$row['agama']?></td>
                        <td><?=$row['tanggal_lahir']?></td>
                        <td><?=$row['alamat']?></td>
                        <td><?=$row['waktu'] ?></td>
                        <td><img width="60px" src="img/<?=$row['file']?>" alt="<?=$row['file']?>"> </td>
                        <td class="edit">
                            <a href="edit.php?id=<?=$row['id']?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </a>
                        </td>
                        <td class="hapus">
                            <a href="hapus.php?id=<?=$row['id']?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class = "logout">
            <th>
                 <a href="keluar.php" class= "logout">Logout</a>
            </th>
    </div>
</body>

</html>