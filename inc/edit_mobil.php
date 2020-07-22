<fieldset>
	<legend>Edit Data Mobil</legend>

	<?php
	$kdmobil = @$_GET['kdmobil'];
	$sql = mysqli_query($con, "select * from tb_mobil where kode_mobil='$kdmobil'") or die(mysqli_error($con));
	$data = mysqli_fetch_array($sql);
	?>

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Kode Mobil</td>
				<td>:</td>
				<td><input type="text" name="kode_mobil" value="<?php echo $data['kode_mobil']; ?>" disabled="disabled"></td>
			</tr>
			<tr>
				<td>Merk</td>
				<td>:</td>
				<td><input type="text" name="merk" value="<?php echo $data['merk']; ?>">
			</tr>
			<tr>
				<td>Type</td>
				<td>:</td>
				<td><input type="text" name="type" value="<?php echo $data['type']; ?>">
			</tr>
			<tr>
				<td>Warna</td>
				<td>:</td>
				<td><input type="text" name="warna" value="<?php echo $data['warna']; ?>">
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td><input type="number" name="harga" value="<?php echo $data['harga']; ?>">
			</tr>
			<tr>
				<td>Gambar</td>
				<td>:</td>
				<td> <input type="file" name="gambar"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="edit" value="Edit"  />  <input type="reset" name="reset" value="Batal"/></td>
			</tr>
		</table>		
	</form>

	<?php
	$merk = @$_POST['merk'];
	$type = @$_POST['type'];
	$warna = @$_POST['warna'];
	$harga = @$_POST['harga'];

	$sumber = @$_FILES['gambar']['tmp_name'];
	$target = 'img/';
	$nama_gambar = @$_FILES['gambar']['name'];

	$edit_mobil = @$_POST['edit'];

	if($edit_mobil) {
			if($merk == "" || $type == "" || $warna == "" || $harga == "") {
				?> 
				<script type="text/javascript">
				alert("Inputan tidak boleh ada kosong !!");
				</script> 
				<?php
			} else {
				if($nama_gambar == "") {
					mysqli_query($con, "update tb_mobil set merk = '$merk', type = '$type', warna = '$warna', harga='$harga' where kode_mobil = '$kdmobil'") or die (mysqli_error($con));
					?> 
					<script type="text/javascript">
					alert("Data berhasil di edit");
					window.location.href = "?page=mobil";
					</script> 
					<?php
				} else {
				$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
				if ($pindah) {
					mysqli_query($con, "update tb_mobil set merk = '$merk', type = '$type', warna = '$warna', harga='$harga', gambar = '$nama_gambar' where kode_mobil = '$kdmobil'") or die(mysqli_error($con));
					?> 
					<script type="text/javascript">
					alert("Data berhasil di edit");
					window.location.href = "?page=mobil";
					</script> 
					<?php
				} else {
					?>
						<script type="text/javascript">
							alert("Gambar gagal di upload");
						</script>
					<?php
				}
			}
		}
	}
	?>
</fieldset>