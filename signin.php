<?php
session_start();
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['mail'] ?? '');
    $username = trim($_POST['user'] ?? '');
    $password = trim($_POST['pass'] ?? '');

    if (empty($email) || empty($username) || empty($password)) {
        $_SESSION['error'] = 'Semua field wajib diisi!';
        header('Location: signin-page.php');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Format email tidak valid!';
        header('Location: signin-page.php');
        exit;
    }

    // Cek apakah email atau username sudah digunakan
    $check = $conn->prepare("SELECT id_user FROM user WHERE email = ? OR username = ?");
    if (!$check) {
        die("Query prepare gagal (SELECT): " . $conn->error);
    }

    $check->bind_param("ss", $email, $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $_SESSION['error'] = 'Email atau username sudah digunakan!';
        header('Location: signin-page.php');
        exit;
    }

    // Hash password dan simpan ke database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO user (email, username, password) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Query prepare gagal (INSERT): " . $conn->error);
    }

    $stmt->bind_param("sss", $email, $username, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Registrasi berhasil. Silakan login.';
        header('Location: login-page.php');
        exit;
    } else {
        $_SESSION['error'] = 'Gagal menyimpan data!';
        header('Location: signin-page.php');
        exit;
    }
}
?>