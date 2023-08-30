<?php
require 'koneksi.php';

$conn = new mysqli('localhost', 'root', '', 'db_antrian');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id_antrian = $_GET["id"];
    
    // Delete data from the database
    $sql = "DELETE FROM tbl_antrian WHERE id_antrian='$id_antrian'";
    
    if ($conn->query($sql) === true) {
        header("Location: antrian.php"); // Redirect to the page after deletion
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

?>
