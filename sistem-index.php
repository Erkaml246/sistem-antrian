<?php
if(isset($_POST['OK'])){
	$nama_pasien		= $_POST['nama_pasien'];
  $id_antrian 	= $_POST['id_antrian'];
  $usia 	= $_POST['usia'];
	$jk	= $_POST['jk'];
  $no_telp	= $_POST['no_telp'];

	include 'koneksi.php';
	$sql = "INSERT INTO tbl_pasien VALUES ('$id_pasien', '$nama_pasien', '$id_antrian', '$usia', '$jk','$no_telp')";
	$proses = $connect->query($sql);
	//setelah memasukan data redirect ke index/tampil data
	echo "<script>window.location.href='index.php'</script>";
  
  
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="login-page">
        <div class="login">
          <h2 class="login-title">Pendaftaran Online</h2>
          <!-- <p class="notice">Pastikan anda telah mengisi dengan benar formulir pendaftaran dibawah ini:</p> -->
          <form class="form-login" method="POST">
            <!-- <label for="penjamin">Penjamin</label> -->
            <!-- <div class="checkbox">
                <label for="remember"><a href="mandiri.html"></a>
                  <input type="checkbox" name="Mandiri">
                  Mandiri
                </label>
              </div>
              <div class="checkbox">
                <label for="remember">
                  <input type="checkbox" name="Mandiri">
                  BPJS
                </label>
              </div><br> -->
              <!-- <div class="checkbox-container">
                <input type="checkbox" class="activateCheckbox" id="pageLinkCheckbox1">
                <label for="pageLinkCheckbox1">Mandiri</label>
              </div>
              <div class="checkbox-container">
                <input type="checkbox" class="activateCheckbox" id="pageLinkCheckbox2">
                <label for="pageLinkCheckbox2">BPJS</label>
              </div> -->
                <script>
                    const checkbox1 = document.getElementById('pageLinkCheckbox1');
                    const checkbox2 = document.getElementById('pageLinkCheckbox2');

                    checkbox1.addEventListener('change', function() {
                        if (checkbox1.checked) {
                            window.location.href = 'mandiri.php';
                        }
                    });

                    checkbox2.addEventListener('change', function() {
                        if (checkbox2.checked) {
                            window.location.href = 'bpjs.php';
                        }
                    });

                    function activateCheckbox() {
                    var checkbox = document.getElementById("myCheckbox");
                    checkbox.disabled = false;
                    }


                </script>
            <label for="email">Nama</label>
            <div class="input-email">
              <i class="fas fa-envelope icon"></i>
              <input type="text" name="nama_pasien" placeholder="Nama" required>
            </div>
            <label for="jk">Jenis Kelamin</label>
            <div class="input-email">
            <select name="jk" id="jk">
                <option value="">Jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            </div>
            <label for="email">Usia</label>
            <div class="input-email">
              <i class="fas fa-envelope icon"></i>
              <input type="number" name="usia" placeholder="Usia" required>
            </div>
            <label for="password">No-Telp</label>
            <div class="input-email">
              <i class="fas fa-lock icon"></i>
              <input type="number" name="no_telp" placeholder="No-telp" required>
            </div><br>
            <!-- <div class="checkbox">
              <label for="remember">
                <input type="checkbox" name="remember">
                Saya menyetujui bahwa data yang saya input benar, Apabila di kemudian hari ada kesalahan saya akan bertanggung jawab
              </label>
            </div> -->
            <button type="submit" name="OK"><i class="fas fa-door-open"></i> Daftar</button>
          </form>
            <!-- <a href="#">Forgot your password?</a> -->
          <div class="created">
            <!-- <p>Created by <a href="https://codepen.io/kelvinqueiroz/">Kelvin Queiróz</a></p> -->
          </div>
        </div>
        <div class="background">
          <h1>Dr Manang</h1>
        </div>
      </div>
      <script></script>
</body>
</html>

