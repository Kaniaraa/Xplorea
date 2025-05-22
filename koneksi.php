<?php
$host = "localhost";
$user = "root";
$pass = ""; // Ganti sesuai password MySQL kamu
$db   = "xplorea"; // Ganti sesuai nama database kamu

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
