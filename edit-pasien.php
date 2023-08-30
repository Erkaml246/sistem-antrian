<?php
require 'koneksi.php';

$conn = new mysqli('localhost', 'root', '', 'db_antrian');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id_pasien = ""; // Inisialisasi nilai awal untuk id_admin

if (isset($_GET["id"])) {
    $id_pasien = $_GET["id"];
    $sql = "SELECT * FROM tbl_pasien WHERE id_pasien='$id_pasien'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $id_pasien = $data["id_pasien"];
        $nama_pasien = $data["nama_pasien"];
        $id_antrian = $data["id_antrian"];
        $usia = $data["usia"];
        $jk = $data["jk"];
        $no_telp = $data["no_telp"];
        
    } else {
        echo "Data tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pasien = $_POST["id_pasien"];
    $nama_pasien = $_POST["nama_pasien"];
    $id_antrian = $_POST["id_antrian"];
    $usia = $_POST["usia"];
    $jk = $_POST["jk"];
    $no_telp = $_POST["no_telp"];

    // Cek apakah data diubah oleh user atau tidak
    $sql_select = "SELECT * FROM tbl_pasien WHERE id_pasien='$id_pasien'";
    $result_select = $conn->query($sql_select);
    
    if ($result_select->num_rows > 0) {
        $data = $result_select->fetch_assoc();
        
        // Mengambil data yang diubah oleh user atau menggunakan data sebelumnya
        $id_pasien = ($id_pasien !== '') ? $id_pasien : $data["id_pasien"];
        $nama_pasien = ($nama_pasien !== '') ? $nama_pasien : $data["nama_pasien"];
        $id_antrian = ($id_antrian !== '') ? $password : $data["id_antrian"];
        $usia = ($usia !== '') ? $usia : $data["usia"];
        $jk = ($jk !== '') ? $jk : $data["jk"];
        $no_telp = ($no_telp !== '') ? $no_telp : $data["no_telp"];
       
        // Update data di database
        $sql_update = "UPDATE tbl_pasien SET id_pasien='$id_pasien', nama_pasien='$nama_pasien',  id_antrian='$id_antrian', usia='$usia', jk='$jk', no_telp='$no_telp' WHERE id_pasien='$id_pasien'";
        
        if ($conn->query($sql_update) === true) {
            header("Location: pasien.php"); // Ganti transaksi.php dengan halaman yang sesuai
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
            <input type="text" name="id_pasien" value="<?php echo $id_pasien; ?>">
            <input type="text" name="nama_pasien" value="<?php echo $nama_pasien; ?>">
            <input type="text" name="id_antrian" value="<?php echo $id_antrian; ?>">
            <input type="text" name="usia" value="<?php echo $usia; ?>">
            <input type="text" name="jk" value="<?php echo $jk; ?>">
            <input type="text" name="no_telp" value="<?php echo $no_telp; ?>">
            
            <button type="submit">Tambah</button>
          </form>
        </div>
      </div>
</body>
</html>
