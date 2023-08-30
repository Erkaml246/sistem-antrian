<?php
require 'koneksi.php';

$conn = new mysqli('localhost', 'root', '', 'db_antrian');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id_admin = ""; // Inisialisasi nilai awal untuk id_admin

if (isset($_GET["id"])) {
    $id_admin = $_GET["id"];
    $sql = "SELECT * FROM tbl_admin WHERE id_admin='$id_admin'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $id_admin = $data["id_admin"];
        $password = $data["password"];
        $username = $data["username"];
        $nama_admin = $data["nama_admin"];
    } else {
        echo "Data tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_admin = $_POST["id_admin"];
    $password = $_POST["password"];
    $username = $_POST["username"];
    $nama_admin = $_POST["nama_admin"];

    // Cek apakah data diubah oleh user atau tidak
    $sql_select = "SELECT * FROM tbl_admin WHERE id_admin='$id_admin'";
    $result_select = $conn->query($sql_select);
    
    if ($result_select->num_rows > 0) {
        $data = $result_select->fetch_assoc();
        
        // Mengambil data yang diubah oleh user atau menggunakan data sebelumnya
        $id_admin = ($id_admin !== '') ? $id_admin : $data["id_admin"];
        $password = ($password !== '') ? $password : $data["password"];
        $username = ($username !== '') ? $username : $data["tgl_pemesanan"];
        $nama_admin = ($nama_admin !== '') ? $nama_admin : $data["nama_admin"];
        
        // Update data di database
        $sql_update = "UPDATE tbl_admin SET id_admin='$id_admin', password='$password', username='$username', nama_admin='$nama_admin' WHERE id_admin='$id_admin'";
        
        if ($conn->query($sql_update) === true) {
            header("Location: admin.php"); // Ganti transaksi.php dengan halaman yang sesuai
            exit;
        } else {
            echo "Error: " . $sql_update . "<br>" . $conn->error;
        }
    } else {
        echo "Data tidak ditemukan.";
    }
}
?> 

 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-page">
        <div class="form">
          <form class="login-form" method="POST">
            <input type="text" name="id_admin" value="<?php echo $id_admin; ?>">
            <input type="text" name="password" value="<?php echo $password; ?>">
            <input type="text" name="username" value="<?php echo $username; ?>">
            <input type="text" name="nama_admin" value="<?php echo $nama_admin; ?>">
            
            <button type="submit">Tambah</button>
          </form>
        </div>
      </div>
</body>
</html>
