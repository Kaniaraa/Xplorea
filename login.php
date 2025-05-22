<?php
session_start();
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['mail'] ?? '';
    $password = $_POST['pass'] ?? '';

    // Cek berdasarkan email ATAU username
    $sql = "SELECT email, username, password FROM user WHERE email = ? OR username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Query prepare gagal: " . $conn->error);
    }

    // Bind dua kali karena query punya 2 ?
    $stmt->bind_param("ss", $input, $input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $passwordFromDB = $row['password'];

        // Ganti dengan password_verify kalau pakai hash nanti
        if ($password === $passwordFromDB) {
            $_SESSION['user'] = $row['email']; // Atau bisa simpan username juga kalau mau
            header('Location: index.html');
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
