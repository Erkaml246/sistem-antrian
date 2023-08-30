<?php
if(isset($_POST['OK'])){
	
	$id_dokter 	= $_POST['id_dokter'];
	$nama_dokter		= $_POST['nama_dokter'];

	include 'koneksi.php';
	$sql = "INSERT INTO tbl_dokter VALUES ('$id_dokter', '$nama_dokter')";
	$proses = $connect->query($sql);
	//setelah memasukan data redirect ke index/tampil data
	echo "<script>window.location.href='dokter.php'</script>";	
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
            <input type="text" name="id_dokter" placeholder="id_dokter"/>
            <input type="text" name="nama_dokter" placeholder="nama_dokter"/>
            <button type="submit" name="OK">Tambah</button>
          </form>
        </div>
      </div>
</body>
</html>

