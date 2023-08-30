<?php
require 'koneksi.php';

$conn = new mysqli('localhost', 'root', '', 'db_antrian');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id_dokter = $_GET["id"];
    
    // Delete data from the database
    $sql = "DELETE FROM tbl_dokter WHERE id_dokter='$id_dokter'";
    
    if ($conn->query($sql) === true) {
        header("Location: dokter.php"); // Redirect to the page after deletion
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

?>
