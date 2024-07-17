<?php
require "koneksi.php";
$sql = "SELECT * FROM transaksi";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Print Data Example</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/fontawesome-free-6.5.2-web/css/fontawesome.min.css">
    <style>
        .print-area {
            width: 80%;
            margin: 0 auto;
        }
        .print-button {
            margin-bottom: 20px;
            background-color: #FF0000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        body{
            background:  #EEC373;
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>
<body>
<?php require "navbar.php";?>
    <div class="print-area">
        <h1>Data from Database</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Detail</th>
                    <th>Tanggal</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data dari setiap baris
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["nama"]. "</td><td>" . $row["harga"]. "</td><td>" . $row["detail"]. "</td>.<td>" . $row["tanggal"]. "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }
                $con->close();
                ?>
            </tbody>
        </table>
        <p><button class="print-button" onclick="printPage()">Print this page</button></p>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>