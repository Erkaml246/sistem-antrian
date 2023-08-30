<?php
if(isset($_POST['OK'])){
	
	$id_admin 	= $_POST['id_admin'];
	$password		= $_POST['password'];
    $username 	= $_POST['username'];
	$nama_admin		= $_POST['nama_admin'];

	include 'koneksi.php';
	$sql = "INSERT INTO tbl_admin VALUES ('$id_admin', '$password', '$username', '$nama_admin')";
	$proses = $connect->query($sql);
	//setelah memasukan data redirect ke index/tampil data
	echo "<script>window.location.href='admin.php'</script>";	
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
            <input type="text" name="id_admin" placeholder="id_admin"/>
            <input type="password" name="password" placeholder="password"/>
            <input type="text" name="username" placeholder="username"/>
            <input type="text" name="nama_admin" placeholder="nama_admin"/>
            <button type="submit" name="OK">Tambah</button>
          </form>
        </div>
      </div>
</body>
</html>

