<?php
session_start();
$errorMsg = $_SESSION['error'] ?? '';
unset($_SESSION['error']); // agar pesan hanya muncul 1x
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="left-section">
        <p>Xploréa</p>
    </div>
    <div class="right-section">
        <form action="login.php" method="POST" class="main">
            <?php if (!empty($errorMsg)) : ?>
            <p style="color: red; text-align: center; font-weight: bold;"><?= htmlspecialchars($errorMsg) ?></p>
            <?php endif; ?>
            <p class="header">Log in</p> <br>
            <table class="isian">
                <tr>
                    <td>
                        <p>Email</p>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="mail" id="mail" placeholder="Email / username"></td>
                </tr>
                <tr>
                    <td>
                        <p>Password</p>
                    </td>
                </tr>
                <tr>
                    <td><input type="password" name="pass" id="pass"></td>
                </tr>
                <tr><td><a class="forgot" href="#">Forgot password?</a></td></tr>
                <tr>
                    <td><input id="button" type="submit" value="Log in"></td>
                </tr>
                <tr>
                    <td class="divider"><br><p>Or</p></td>
                </tr>
                <tr>
                    <td id="google">
                        <a href="#"><img src="Assets/pngwing.com.png" alt="">Continue with Google</a>
                    </td>
                </tr>
                <tr>
                    <td class="signup">
                        <p>Dont have an account? <a href="signin-page.php">Sign in</a></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>