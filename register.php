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
					<textarea name="alamat" class="lg" placeholder="Alamat"></textarea>
				</div>
				<div style="margin-top: 10px;">
					<select name="level">
						<option value="">- Pilih Kategori</option>
						<option value="admin">Admin</option>
						<option value="operator">Operator</option>
						<option value="user">User</option>
					</select>
				</div>
				<div style="margin-top: 10px;">
					<input type="submit" name="register" value="Register" class="btn" />
					<span style='margin-left: 120px;'>
						<a href="login.php" class="btn-right">login</a>
					</span>
				</div>
			</form>
			<?php
			include "inc/koneksi.php";
				if(@$_POST['register']) {
					$user = @$_POST['user'];
					$pass = @$_POST['pass'];
					$nama_lengkap = @$_POST['nama_lengkap'];
					$jenis_kelamin = @$_POST['jenis_kelamin'];
					$alamat = @$_POST['alamat'];
					$level = @$_POST['level'];

					if($user == '' || $pass === '' || $nama_lengkap == '' || $jenis_kelamin == '' || $alamat == '' || $level == ''){
						?> <script type="text/javascript"> alert('Inputan tidak boleh kosong !!')</script> <?php
					} else{

						// $sql_insert = mysql_query("insert into tb_login values ('', '$user', md5('$pass'), '$nama_lengkap', '$jenis_kelamin', '$alamat', 'user')") or die (mysql_error());

						$sql_insert = mysqli_query($con, "INSERT INTO tb_login values ('', '$user', md5('$pass'), '$nama_lengkap', '$jenis_kelamin', '$alamat', '$level')") or die(mysqli_error($con));
						if($sql_insert){
							?> <script type="text/javascript"> alert('Pendaftaran berhasil, silahkan login')</script> <?php
						} 
					}
				}
			?>
		</div>
	</div>
</body>
</html>