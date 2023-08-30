<?php
session_start();

require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Membuat prepared statement
    $stmt = $connect->prepare("SELECT id_admin FROM tbl_admin WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("location: admin.php");
    } else {
        $error = "Username atau password salah.";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-page">
        <div class="form">
            <h1>Login</h1>
            <form class="login-form" method="POST" action="">
                <input name="username" type="text" placeholder="username"/>
                <input name="password" type="password" placeholder="password"/>
                <button type="submit">Login</button>
                <p class="message">Belum punya akun? <a href="register.php">Daftar</a></p>
            </form>
            <?php
            if (!empty($error)) {
                echo '<p class="error">' . $error . '</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>
