<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require "config.php";
if(isset($_GET['id'])){
  $query = mysqli_query($db,"DELETE FROM pattimura WHERE id=$_GET[id]");  
  if($query){
    // $data = mysqli_query($db, "SELECT file FROM pattimura WHERE id=$_GET[id]");
    // $result = mysqli_fetch_assoc($data);
    header("Location:index.php");
  } else {
    echo "Delete gagal";
  }
}
?>