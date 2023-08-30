<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_admin = $_POST['nama_admin'];
    // Membuat prepared statement
    $stmt = $connect->prepare("INSERT INTO tbl_admin (username, password, nama_admin) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $nama_admin);

    if ($stmt->execute()) {
        header("location: login.php");
    } else {
        echo "Error: " . $stmt->error;
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
            <h1>Register</h1>
          <form method="post" action="" class="login-form">
            <input name="username" type="text" placeholder="username" required/>
            <input name="password" type="password" placeholder="password" required/>
            <input name="nama_admin" type="text" placeholder="nama admin" required/>
            <button>Daftar</button>
            <p class="message">Sudah punya Akun? <a href="login.php">Login</a></p>
          </form>
          <?php if (isset($error)) { echo $error; } ?>
        </div>
      </div>
</body>
</html>