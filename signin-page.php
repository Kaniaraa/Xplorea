<!-- image address ( https://i.pinimg.com/736x/8e/17/6d/8e176ddb525dc623c2f5ca0a492176b8.jpg ) -->
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
        <form action="signin.php" method="POST" class="main-signup">
            <?php if (!empty($errorMsg)) : ?>
                <p style="color: red; text-align: center; font-weight: bold;">
                <?= htmlspecialchars($errorMsg) ?>
                </p>
            <?php endif; ?>
            <p class="header">Sign in</p> <br>
            <table class="isian">
                <tr>
                    <td>
                        <p>Email</p>
                    </td>
                </tr>
                <tr>
                    <td><input type="email" name="mail" id="mail" placeholder="Enter your email"></td>
                </tr>
                <tr>
                    <td>
                        <p>Username</p>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="user" id="user" placeholder="Create username"></td>
                </tr>
                <tr>
                    <td>
                        <p>Password</p>
                    </td>
                </tr>
                <tr>
                    <td><input type="password" name="pass" id="pass" placeholder="Create password"></td>
                </tr>
                <tr>
                    <td><br><input id="button" type="submit" value="Sign in"></td>
                </tr>
                <tr>
                    <td class="divider"><br><p>Or</p></td>
                </tr>
                <tr>
                    <td id="google">
                        <a href="#"><img src="Assets/pngwing.com.png" alt="">Sign in with Google</a>
                    </td>
                </tr>
                <tr>
                    <td class="signup">
                        <p>Already have an account? <a href="login-page.php">Log in</a></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>