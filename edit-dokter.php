<?php
require 'koneksi.php';

$conn = new mysqli('localhost', 'root', '', 'db_antrian');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id_dokter = ""; // Inisialisasi nilai awal untuk id_transaksi

if (isset($_GET["id"])) {
    $id_dokter = $_GET["id"];
    $sql = "SELECT * FROM tbl_dokter WHERE id_dokter='$id_dokter'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $id_dokter = $data["id_dokter"];
        $nama_dokter = $data["nama_dokter"];
    } else {
        echo "Data tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_dokter = $_POST["id_dokter"];
    $nama_dokter = $_POST["nama_dokter"];

    // Cek apakah data diubah oleh user atau tidak
    $sql_select = "SELECT * FROM tbl_dokter WHERE id_dokter='$id_dokter'";
    $result_select = $conn->query($sql_select);
    
    if ($result_select->num_rows > 0) {
        $data = $result_select->fetch_assoc();
        
        // Mengambil data yang diubah oleh user atau menggunakan data sebelumnya
        $id_dokter = ($id_dokter !== '') ? $id_dokter : $data["id_dokter"];
        $nama_dokter = ($nama_dokter !== '') ? $nama_dokter : $data["nama_dokter"];
        
        // Update data di database
        $sql_update = "UPDATE tbl_dokter SET id_dokter='$id_dokter', nama_dokter='$nama_dokter' WHERE id_dokter='$id_dokter'";
        
        if ($conn->query($sql_update) === true) {
            header("Location: dokter.php"); // Ganti transaksi.php dengan halaman yang sesuai
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
    <title>Tambah dokter</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-page">
        <div class="form">
          <form class="login-form" method="POST">
            <input type="text" name="id_dokter" value="<?php echo $id_dokter; ?>">
            <input type="text" name="nama_dokter" value="<?php echo $nama_dokter; ?>">
            <button type="submit">Tambah</button>
          </form>
        </div>
      </div>
</body>
</html>
