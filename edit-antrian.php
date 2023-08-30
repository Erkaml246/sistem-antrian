<?php
require 'koneksi.php';

$conn = new mysqli('localhost', 'root', '', 'db_antrian');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id_antrian = ""; // Inisialisasi nilai awal untuk id_admin

if (isset($_GET["id"])) {
    $id_antrian = $_GET["id"];
    $sql = "SELECT * FROM tbl_antrian WHERE id_antrian='$id_antrian'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $id_antrian = $data["id_antrian"];
        $id_dokter = $data["id_dokter"];
        $id_pasien = $data["id_pasien"];
        $no_antrian = $data["no_antrian"];
        $tanggal = $data["tanggal"];
        $waktu = $data["waktu"];
        $status = $data["status"];
        
    } else {
        echo "Data tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_antrian = $_POST["id_antrian"];
    $id_dokter = $_POST["id_dokter"];
    $id_pasien = $_POST["id_pasien"];
    $no_antrian = $_POST["no_antrian"];
    $tanggal = $_POST["tanggal"];
    $waktu = $_POST["waktu"];
    $status = $_POST["status"];

    // Cek apakah data diubah oleh user atau tidak
    $sql_select = "SELECT * FROM tbl_antrian WHERE id_antrian='$id_antrian'";
    $result_select = $conn->query($sql_select);
    
    if ($result_select->num_rows > 0) {
        $data = $result_select->fetch_assoc();
        
        // Mengambil data yang diubah oleh user atau menggunakan data sebelumnya
        $id_antrian = ($id_antrian !== '') ? $id_antrian : $data["id_antrian"];
        $id_dokter = ($id_dokter !== '') ? $id_dokter : $data["id_dokter"];
        $id_pasien = ($id_pasien !== '') ? $id_pasien : $data["id_pasien"];
        $no_antrian = ($no_antrian !== '') ? $no_antrian : $data["no_antrian"];
        $tanggal = ($tanggal !== '') ? $tanggal : $data["tanggal"];
        $waktu = ($waktu !== '') ? $waktu : $data["waktu"];
        $status = ($status !== '') ? $status : $data["status"];
       
        // Update data di database
        $sql_update = "UPDATE tbl_antrian SET id_antrian='$id_antrian',  id_dokter='$id_dokter', id_pasien='$id_pasien', no_antrian='$no_antrian', tanggal='$tanggal', waktu='$waktu', status='$status' WHERE id_antrian='$id_antrian'";
        
        if ($conn->query($sql_update) === true) {
            header("Location: antrian.php"); // Ganti transaksi.php dengan halaman yang sesuai
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
            <input type="text" name="id_antrian" value="<?php echo $id_antrian; ?>">
            <input type="text" name="id_dokter" value="<?php echo $id_dokter; ?>">
            <input type="text" name="no_antrian" value="<?php echo $no_antrian; ?>">
            <input type="date" name="tanggal" value="<?php echo $tanggal; ?>">
            <input type="time" name="waktu" value="<?php echo $waktu; ?>">
            <input type="text" name="status" value="<?php echo $status; ?>">
            
            <button type="submit">Edit</button>
          </form>
        </div>
      </div>
</body>
</html>
