<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

    include('koneksi.php');

    if (!$koneksi) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    $uname = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if (empty($uname) || empty($pass)) {
        echo "<h2>Username dan Password wajib diisi!</h2>";
        echo "<a href='login.php'>&lt;&lt; Kembali</a>";
        exit;
    }

    // Tabelnya harus `users`, bukan `login`
    $query = "SELECT id, username, email, password FROM users WHERE username=? AND password=?";
    $stmt = mysqli_prepare($koneksi, $query);

    if (!$stmt) {
        die("Prepare statement gagal: " . mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, "ss", $uname, $pass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) === 1) {
        // Ambil hasil bind
        mysqli_stmt_bind_result($stmt, $id, $username, $email, $password);
        mysqli_stmt_fetch($stmt);

        session_start();
        $_SESSION['status'] = "login";
        $_SESSION['username'] = $username;

        header("Location: http://localhost/tes/index.php");
        exit(); // Stop eksekusi
    } else {
        echo "<h2>Login Gagal! Username atau password salah.</h2>";
        echo "<a href='login.php'>&lt;&lt; Ulangi Login</a>";
    }

} else {
    echo "<h2>Metode tidak valid.</h2>";
    echo "<a href='login.php'>&lt;&lt; Ulangi Login</a>";
}
?>
