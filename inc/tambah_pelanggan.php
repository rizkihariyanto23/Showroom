<fieldset>
	<legend>Tambah Data Pelanggan</legend>

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>No Identitas</td>
				<td>:</td>
				<td><input type="number" name="no_id" required></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input type="text" name="nm_lngkp" required>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><textarea type="text" name="almt" required> </textarea></td>
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
				<td><input type="text" name="tlp" required>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"  />  <input type="reset" name="reset" value="Batal"/></td>
			</tr>
		</table>		
	</form>

	<?php
	$no_id = @$_POST['no_id'];
	$nm_lngkp = @$_POST['nm_lngkp'];
	$almt = @$_POST['almt'];
	$jk = @$_POST['jk'];
	$tlp = @$_POST['tlp'];

	if (@$_POST['tambah']) {
		if (!is_numeric($no_id)) {
			echo '<script type="text/javascript">alert("No. Identitas harus berupa angka !!");</script>';
		} else {
			mysqli_query($con, "INSERT INTO tb_pelanggan(no_identitas,nama_lengkap,alamat,jenis_kelamin,no_telp) VALUES('$no_id','$nm_lngkp','$almt','$jk','$tlp')") or die(mysqli_error($con));
			echo '<script type="text/javascript">alert("Tambah data pelanggan baru berhasil !!");</script>';
		}
	}
	?>
</fieldset>