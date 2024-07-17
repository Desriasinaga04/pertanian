<?php 
include 'koneksi.php';
$id = $_GET['p'];
mysqli_query($con,"DELETE from produk where id='$id'");
header("location: produk.php");
?>