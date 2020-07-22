<fieldset>
	<legend>Tambah Data Pelanggan</legend>

	<?php 
	$ID = @$_GET['ID'];
	$sql = mysqli_query($con, "select * from tb_pelanggan where no_identitas='$ID'") or die (mysqli_error($con));
	$data = mysqli_fetch_array($sql);
	?>

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>No Identitas</td>
				<td>:</td>
				<td><input type="text" name="no_id" value="<?php echo $data['no_identitas']; ?>" disabled="disabled" required> </td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input type="text" name="nm_lngkp" value="<?php echo $data['nama_lengkap']; ?>" required>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><textarea type="text" name="almt" value="<?php echo $data['alamat']; ?>" required> </textarea></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<label><input type="radio" name="jk" value="L" required />Laki-laki</label>
					<br>
					<label><input type="radio" name="jk" value="P" required />Perempuan</label>
				</td>
			</tr>
			<tr>
				<td>No Telpon</td>
				<td>:</td>
				<td><input type="number" name="tlp" value="<?php echo $data['no_telp']; ?>" required>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="edit" value="Edit"  />  <input type="reset" name="reset" value="Batal"/></td>
			</tr>
		</table>		
	</form>

	<?php
	$nm_lngkp = @$_POST['nm_lngkp'];
	$almt = @$_POST['almt'];
	$jk = @$_POST['jk'];
	$tlp = @$_POST['tlp'];

	$edit_pelanggan = @$_POST['edit']; 

	if ($edit_pelanggan) {
		if ($nm_lngkp == "" || $almt == "" || $jk == "" || $tlp == "") {
			?> 
			<script type="text/javascript">
			alert("Inputan tidak boleh ada kosong !!");
			</script> 
			<?php
		} else {
			mysqli_query($con, "update tb_pelanggan set nama_lengkap = '$nm_lngkp', alamat = '$almt', jenis_kelamin = '$jk', no_telp = '$tlp' where no_identitas = '$ID'") or die(mysqli_error($con));
			echo '<script type="text/javascript">
			alert("Update data berhasil !!");
			window.location.href="?page=pelanggan";
			</script>';
		}
	}
	?>
</fieldset>