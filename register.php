<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kuis_prakweb";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = 'user'; // Default role

    // Melakukan query untuk menambahkan pengguna baru
    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $hashed_password, $role);

    if ($stmt->execute()) {
        $message = "Registrasi berhasil! Silakan login.";
    } else {
        $message = "Username sudah terdaftar.";
    }

    $stmt->close();
}
$conn->close();

if (isset($message)) {
    header("Location: login.php?message=" . urlencode($message));
    exit;
}
?>