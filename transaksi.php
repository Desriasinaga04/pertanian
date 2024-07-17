<!DOCTYPE html>
<html>
<head>
    <title>Menu Transaksi Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url('image/pertanian1.webp');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .menu-container {
            background:  #FAFAD2;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .menu-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .menu-container a, .menu-container button {
            display: block;
            padding: 10px;
            margin: 10px 0;
            text-decoration: none;
            color: white;
            background: #007BFF;
            border: none;
            border-radius: 4px;
            transition: background 0.3s ease;
            cursor: pointer;
        }
        .menu-container a:hover, .menu-container button:hover {
            background: #0056b3;
        }
        .menu-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .menu-container input, .menu-container textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <?php
    include 'koneksi.php';
    $con = new mysqli("localhost", "root", "", "kuis_prakweb");
    if(isset($_GET['id'])){
    $query = "select * from produk where id = '" .$_GET['id'] ."'";
    $res = mysqli_query($con , $query);
    $total=0;
    while ($data = mysqli_fetch_array($res)) :
    ?>
    <div class="menu-container">
        <h2>Menu Transaksi Barang</h2>
        <form action="transaksi.php" method="post" enctype="multipart/form-data">
            <input value="<?= $data['nama'] ?>" type="text" name="nama" placeholder="Nama Barang" required>
            <input value="<?= $data['harga'] ?>" type="text" step="0.01" name="price" placeholder="Harga" required>
            <textarea value="<?= $data['detail'] ?>" name="details"  rows="4" ><?= $data['detail'] ?></textarea>
            <label>Tanggal : </label>
            <input type="date" name="tanggal" ></input>
            <label>Nama : </label>
            <input type="text" name="nama_pembeli" ></input>
            <button type="submit" name="bayar">Bayar</button>
        </form>
    </div>
    <?php endwhile ;}?>
    <?php
    $con = new mysqli("localhost", "root", "", "kuis_prakweb");
                        if(isset($_POST['bayar']) ){
                            $nama=htmlspecialchars($_POST['nama']);
                            $namap=htmlspecialchars($_POST['nama_pembeli']);
                            $harga=htmlspecialchars($_POST['price']);
                            $tanggal=htmlspecialchars($_POST['tanggal']);
                            $detail=htmlspecialchars($_POST['details']);
                           
                            $queryTambah = "insert into transaksi(nama, harga, detail,tanggal, nama_pembeli) values ('$nama','$harga','$detail','$tanggal', '$namap')";
                            $resultTambah = mysqli_query($con, $queryTambah);
                            if($resultTambah){
                                try{

                                header("Location: home.php");
                                echo "<script>alert('berhasil');</script>";
                                ?>
                                <?php
                                }catch(mysqli_sql_exception){
                                    echo "<script>alert('gagal');</script>";
                                }
                            }
                            else{
                                echo "<script>alert('gagal');</script>";
                               echo myqsli_error($con);
                            }
                        }
                ?>
</body>
</html>