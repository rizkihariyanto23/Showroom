<?php
@session_start();
include "inc/koneksi.php";

if (@$_SESSION['admin'] || @$_SESSION['operator']) {
	header("location: index.php");
} else if (@$_SESSION['user']) {
	header("location: user/index.php");
} else {
?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login </title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="utama">
		<div id="judul">
			Halaman Login
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
					<input type="submit" name="login" value="Login" class="btn" />
					<span style="margin-left: 130px;">
						<a href="register.php" class="btn-right">Register </a>
						
					</span>
				</div>
			</form>
			
			<?php
			
			$user = @$_POST['user'];
			$pass = @$_POST['pass'];
			$login = @$_POST['login'];

			if($login) {
				if($user == "" || $pass == "") {
					?> <script type="text/javascript">alert("Username atau Password tidak boleh kosong !!");
					</script> 
					<?php
				}
				else {
					// echo "Lanjut Proses";
					$sql = mysqli_query($con, "select * from tb_login where username = '$user' and password = md5('$pass')") or die (mysqli_error($con));
					$data =  mysqli_fetch_array($sql);
					$cek = mysqli_num_rows($sql);
					if($cek >= 1) {
						if($data['level']  == "admin") {
							@$_SESSION['admin'] = $data['kode_user'];
							header("location: index.php");
						} else if($data['level']  == "operator") {
							@$_SESSION['operator'] = $data['kode_user'];
							header("location: index.php");
						} else if($data['level']  == "user") {
							@$_SESSION['user'] = $data['kode_user'];
							header("location: user/index.php");
						} 
					} else {
						// echo "Gagal Login";
						?>
						<script type="text/javascript">alert("Username atau Password Salah !!");
						</script>
						<?php
					 
					}
				
				}
			}
			?>

		</div>
	</div>

</body>
</html>

<?php
}
?>