<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require "config.php";

if(isset($_POST['submit'])){
  $nama = $_POST['nama'];
  $suku = $_POST['suku'];
  $agama = $_POST['agama'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];
  $waktu = strtotime('now');
  $nama_gambar = $_POST['nama_gambar'];
  $gambar = $_FILES['file']['name'];
  $x = explode('.',$gambar);
  $ekstensi = strtolower(end($x));
  $gambar_baru = "$nama_gambar.$ekstensi";
  $tmp = $_FILES['file']['tmp_name'];

  if(move_uploaded_file($tmp,'img/'.$gambar_baru)){
      $query = mysqli_query($db,"INSERT INTO pattimura VALUES (NULL,'$nama','$suku','$agama','$tanggal_lahir','$alamat','$gambar_baru','$waktu')");
        if($query){
            echo "<script>alert('berhasil menambahkan gambar')
                    document.location.href = 'index.php';
            </script>";
        }
        else{
            echo error_log($query);
        }
    }
    else{
        echo "<script>alert('terdapat kesalahan ketika menambahkan gambar')</script>";
    }
}

//   if(!empty($_FILES['gambar']['name'])){
//     // Get id pattimura
//     // $query = mysqli_query($db,"SELECT * FROM pattimura WHERE suku='$suku'");
//     // $result = mysqli_fetch_assoc($query);
//     // $id = $result['id'];
//     // $nama = $_POST['nama_gambar'];
//     // $gambar = $_FILES['gambar']['name'];
//     // $x = explode('.',$gambar);
//     // $ekstensi = strtolower(end($x));
//     // $gambar_baru = "$nama.$ekstensi";
//     // $tmp = $_FILES['gambar']['tmp_name'];
//     // if(move_uploaded_file($tmp,"img/$gambar_baru")){
//     //   $query = mysqli_query($db,"INSERT INTO pattimura (id_pattimura,nama_file,file) VALUES ($id,'$nama','$gambar_baru');");
//       if($query){
//          header("Location:index.php");
//       } else {
//          echo "Tambah data error";
//       }
//     }
//   } 
// }
?>