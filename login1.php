<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kuis_prakweb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password, $role);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $role;
            if ($role == 'admin') {
                header("location: index.php");
            } else {
                header("location: home.php");
            }
            exit;
        } else {
            $message = "Password salah!";
        }
    } else {
        $message = "Tidak ada akun dengan username tersebut.";
    }
    $stmt->close();
}
$conn->close();
if (isset($message)) {
    header("Location: login.php?message=" . urlencode($message));
    exit;
}
?>