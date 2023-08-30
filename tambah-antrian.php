<?php
if(isset($_POST['OK'])){
	
	$id_antrian 	= $_POST['id_antrian'];
	$id_dokter	= $_POST['id_dokter'];
  $id_pasien 	= $_POST['id_pasien'];
	$no_antrian		= $_POST['no_antrian'];
  $tanggal	= $_POST['tanggal'];
  $waktu 	= $_POST['waktu'];
	$status		= $_POST['status'];

	include 'koneksi.php';
	$sql = "INSERT INTO tbl_antrian VALUES ('$id_antrian', '$id_dokter', '$id_pasien', '$no_antrian', '$tanggal', '$waktu', '$status')";
	$proses = $connect->query($sql);
	//setelah memasukan data redirect ke index/tampil data
	echo "<script>window.location.href='antrian.php'</script>";	
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
            <input type="text" name="id_antrian" placeholder="id_antrian"/>
            <input type="text" name="id_dokter" placeholder="id_dokter"/>
            <input type="text" name="id_pasien" placeholder="id_pasien"/>
            <input type="text" name="no_antrian" placeholder="no_antrian"/>
            <input type="date" name="tanggal" placeholder="tanggal"/>
            <input type="time" name="waktu" placeholder="waktu"/>
            <input type="text" name="status" placeholder="status"/>
            <button type="submit" name="OK">Tambah</button>
          </form>
        </div>
      </div>
</body>
</html>

