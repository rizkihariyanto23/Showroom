<?php
	@session_start();
	include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman register </title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="utama" style="margin-top: 10%">
		<div id="judul">
			Halaman Register
		</div>
		<div id="inputan">
			<form action="" method="post">
				<div>
					<input type="text" name="user" placeholder="Username" class="lg" />
				</div>
				<div style="margin-top: 10px;">
					<input type="password" name="pass" placeholder="Password" class="lg" />
				</div>
				<div style="margin-top: 10px;">
					<input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="lg" />
				</div>
				<div style="margin-top: 10px;">
					<select name="jenis_kelamin">
						<option value="">- Pilih Jenis Kelamin</option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
				<div style="margin-top: 10px;">
					<input type="text" name="alamat" placeholder="Alamat" class="lg" />
				</div>
				<div style="margin-top: 10px;">
					<input type="submit" name="register" value="Register" class="btn" />
					<span style='margin-left: 120px;'>
						<a href="login.php" class="btn-right">login</a>
					</span>
				</div>
			</form>
			<?php
				if(@$_POST['register']) {
					$user = @$_POST['user'];
					$pass = @$_POST['pass'];
					$nama_lengkap = @$_POST['nama_lengkap'];
					$jenis_kelamin = @$_POST['jenis_kelamin'];
					$alamat = @$_POST['alamat'];

					if($user == '' || $pass == '' || $nama_lengkap == '' || $jenis_kelamin == '' || $alamat == '') {
						?><script type="text/javascript"> alert("Inputan Tidak Boleh Kosong");</script> <?php
					} else {
						echo "Proses Register Berhasil";
					}
				}
			?>
		</div>
	</div>
</body>
</html>