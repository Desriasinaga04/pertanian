<?php
require "koneksi.php";
$queryProduk=mysqli_query($con,"SELECT id,nama,harga,foto,detail,ketersediaan_stok FROM produk ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-6.5.2-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .banner{
        background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url('image/pertanian1.webp');
    height: 80vh;
    }
    .card-body{
        background: azure;
        border-radius: 15px;
    }
    .row{
        background: #8FBC8F;
    }
    h1{
        color: white;
    }
    </style>
<body>
    <?php require "navbar1.php"; ?>
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center ">
       <h1>Selamat datang di toko Kami</h1>
    </div>
</div>
</div>
</div>
</div>
       
        <!--produk-->

       <div class="container-fluid py-5">
           <div class="container warna3 text-center">
                <br><h3>Produk</h3>
                <div class="row mt-5">
                  <?php while($data=mysqli_fetch_array($queryProduk)){?>
                    <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card h-100" >
                        <div class="image-box">
                        <img src="image/<?php echo $data['foto'];?>" class="card-img-top" alt="">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nama'];?></h4>
                            <p class="card-text text-truncate "><?php echo $data['detail']?></p>
                            <p class="card-text text-harga">Rp <?php echo $data['harga']?></p>
                            <p class="card-text text-harga"><?php echo $data['ketersediaan_stok']?></p>
                            <a href="transaksi.php?id=<?php echo $data['id'];?>" class="btn warna2 text-white">Lihat Detail</a>
                        </div>
                        </div>
                    </div>
                 <?php }?>
        </div>
        <div class="container-fluid warna2 py-5">
            <div class="container1 text-center">
                <h3>Tentang kami</h3>
                <p class="fs-5 mt-3">
                    <p> Kontak : 081423276889</p>
                    <p>Lokasi : jl.Jamin Ginting Padang Bulan,Medan, Sumatera Utara</p>
                </p>
            </div>
        </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>