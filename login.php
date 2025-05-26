<?php
session_start();
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = trim($_POST['mail'] ?? '');
    $password = trim($_POST['pass'] ?? '');

    if (empty($input) || empty($password)) {
        $_SESSION['error'] = 'Semua field wajib diisi!';
        header('Location: login-page.php');
        exit;
    }

    // Query berdasarkan email ATAU username
    $sql = "SELECT id_user, email, username, password FROM user WHERE email = ? OR username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Query prepare gagal: " . $conn->error);
    }

    $stmt->bind_param("ss", $input, $input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Login berhasil
            $_SESSION['user'] = [
                'id' => $user['id_user'],
                'email' => $user['email'],
                'username' => $user['username'],
            ];
            header('Location: pelanggan/index.html'); // Ganti sesuai halaman dashboard-mu
            exit;
        } else {
            $_SESSION['error'] = 'Password salah!';
            header('Location: login-page.php');
            exit;
        }
    } else {
        $_SESSION['error'] = 'Email atau username tidak ditemukan!';
        header('Location: login-page.php');
        exit;
    }
}
?>
