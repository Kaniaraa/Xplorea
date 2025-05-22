<?php
session_start();

$view = $_GET['view'] ?? 'login';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $valid_password = $_SESSION['dummy_password'] ?? $dummyUser['password'];

        if ($username === $dummyUser['username'] && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: http://localhost/tes/index.php");
        exit();
        } elseif ($username === $dummyUser['username']) {
            $error = "Username benar tapi password salah.";
        } else {
            $error = "Username atau password salah.";
        }

    } elseif ($action === 'forgot') {
        $email = $_POST['email'];
        if ($email === $dummyUser['email']) {
            $_SESSION['reset_email'] = $email;
            header("Location: login.php?view=reset");
            exit();
        } else {
            $error = "Email not found.";
        }

    } elseif ($action === 'reset') {
        $newpass = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];
    
        if ($newpass !== $confirmpass) {
            $error = "Passwords do not match.";
        } elseif (strlen($newpass) < 8) {
            $error = "Password must be at least 8 characters.";
        } else {
            // Simulasi update password
            $_SESSION['dummy_password'] = $newpass;
            unset($_SESSION['reset_email']);
            $success = "Password successfully reset. You may now <a href='login.php'>login</a>.";
            $view = "login";
        }
    }
}
?>