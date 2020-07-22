<?php
@session_start();
include "inc/koneksi.php";

if (@$_SESSION['admin'] || @$_SESSION['operator']) {
?>

<!DOCTYPE html>
<html>
<head>
	<title> Membuat desain web dan menu dropdown sederhana</title>
	<link rel="stylesheet" href="css/style-index.css" type="text/css">

<body>

	<div id="canvas">
		<div id="header">
			<div class="logo">
			</div>
		</div>

		<div id="menu">
		<!-- 	ini bagian menu -->
			<ul>
				<li class="utama"><a href="/MY_WEB">Beranda </a></li>
				<?php
				if(@$_SESSION['admin']) { ?>
					<li class="utama"><a href="">Mobil </a>
						<ul>
							<li><a href="?page=mobil">Lihat Data</a></li>
							<li><a href="?page=mobil&action=tambah">Tambah Data</a></li>
						</ul>
					</li>
				<?php
				} ?>
				<li class="utama"><a href="">Pelanggan </a>
					<ul>
						<li><a href="?page=pelanggan">Lihat Data</a></li>
						<li><a href="?page=pelanggan&action=tambah">Tambah Data</a></li>
					</ul>
				</li>
				<?php
				if(@$_SESSION['admin']) { ?>
					<li class="utama"><a href="">Paket Kredit</a></li>
				<?php } ?>
				<li class="utama"><a href="">Transaksi</a>
					<ul>
						<li><a href="">Beli Cash</a></li>
						<li><a href="">Beli Kredit</a></li>
					</ul>
				</li>
				<li class="utama right" style="background-color:#fc0;"/><a href="inc/logout.php">Logout</a></li>
				<li class="utama right" >
					<?php
						if(@$_SESSION['admin']) {
							$user_terlogin = @$_SESSION['admin'];
						} else if(@$_SESSION['operator']) {
							$user_terlogin = @$_SESSION['operator'];
						}

						$sql = mysqli_query($con,"select *from tb_login where kode_user = '$user_terlogin'") or die (mysqli_error($con));
						$datauser = mysqli_fetch_array($sql);
					?>
					<a>Selamat datang, <?php echo " "; echo $datauser['nama_lengkap']; ?></a></li>
			</ul>
		</div>

		<div id="isi">
			<?php
				$page = @$_GET['page'];
				$action = @$_GET['action'];
				if ($page == "mobil") {
						if(@$_SESSION['admin']) {
							if ($action == "") {
								include "inc/mobil.php";
							} else if ($action == "tambah") {
								include "inc/tambah_mobil.php";
							}else if ($action == "edit") {
								include "inc/edit_mobil.php";
							}else if ($action == "hapus") {
								include "inc/hapus_mobil.php";
							}
						} else {
							echo "Anda tidak punya hak akses pada halaman ini !!";
						}
				} else if ($page == "pelanggan") {
						if ($action == "") {
							include "inc/pelanggan.php";
						} else if ($action == "tambah") {
							include "inc/tambah_pelanggan.php";
						} else if($action == "edit") {
							include "inc/edit_pelanggan.php";
						} else if($action == "hapus") {
							include "inc/hapus_pelanggan.php";
						}
				} else if ($page == "paketkredit") {
						echo "Ini halaman paket kredit";	
				} else if ($page == "") {
						echo "Selamat datang di halaman Utama";
				} else {
					echo "404! Halaman tidak ditemukan";
				}
			?>
		</div>

		<div id="footer">
			Copyright 2017 - Rizki Hariyanto
		</div>
	
	</div>
</body>
</html>

<?php
} else {
	header("location: login.php");
}
?>