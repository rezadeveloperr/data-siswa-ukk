<?php
include ('koneksi.php');
$id = $_GET["id"];

    $query = "DELETE FROM tabelbuku2 WHERE id = '$id' ";
    $hasil_query = mysqli_query($koneksi, $query);

   
    if(!$hasil_query) {
      die ("Query Error : ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil dihapus!');window.location='index.php';</script>";
    }