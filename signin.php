<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "xplorea";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed " . $conn->connect_error);
}

$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($username) || empty($password)) {
    echo "Semua field wajib diisi!";
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $email, $username, $hashed_password);

if ($stmt->execute()) {
    echo "Registration successful. <a href='login.php'>Login here</a>";
} else {
    echo "Registration failed " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
