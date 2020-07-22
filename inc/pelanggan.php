<fieldset>
	<legend>Tampil Data Pelanggan </legend>
	<table width="100%" border="1px" style="border-collapse: collapse;">
		<tr style="background-color: #c06 ">
			<th>#</th>
			<th>No. Identititas</th>
			<th>Nama Lengkap</th>
			<th>Alamat</th>
			<th>Jenis kelamin</th>
			<th>No telpon</th>
			<th>Opsi</th>
		</tr>
		<?php
		$no = 1;
		$batas = 9;
		$hal = @$_GET['hal'];
		if (empty($hal)) {
			$posisi = 0;
			$hal = 1;
		} else {
			$posisi = ($hal - 1) * $batas;
		}

		$sql_plgn = mysqli_query($con, "SELECT * FROM tb_pelanggan LIMIT $posisi, $batas") or die (mysqli_error($con));
		$no = $posisi + 1;
		$cek = mysqli_num_rows($sql_plgn);
		if($cek < 1){
			echo '<tr><td colspan="7" align="center" style="padding:10px;">Data tidak ditemukan</td></tr>';
		} else {
			while ($data = mysqli_fetch_array($sql_plgn)) { 
				?> 
					<tr>
						<td align="center"><?php echo $no++.".";?></td>
						<td align="center"><?php echo $data['no_identitas']; ?></td>
						<td align="center"><?php echo $data['nama_lengkap']; ?></td>
						<td align="center"><?php echo $data['alamat']; ?></td>
						<td align="center"><?php if ($data['jenis_kelamin'] == 'L') {echo "Laki-laki"; } else {echo "Perempuan"; } ?></td>
						<td align="center"><?php echo $data['no_telp']; ?></td>
						<td align="center">
							<a href="?page=pelanggan&action=edit&ID=<?php echo $data['no_identitas']; ?>"><button>Edit</button></a>
							<a onclick="return confirm('yakin ingin menghapus data ?')" href="?page=pelanggan&action=hapus&ID=<?php echo $data['no_identitas']; ?>"><button>Hapus</button></a>
						</td>
					</tr>
				<?php	
			}
		} ?>
	</table>

	<div style="margin-top: 10px; float: left;">
		<?php 
		$jml = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_pelanggan"));
		echo "Jumlah data : <b>".$jml."<b>"; 
		?>
		<br>
		<a href="laporan/test_cetak_pelanggan.php" target="_blank"><button>Cetak</button></a>
	</div>

	<div style="margin-top: 10px; float: right;">
		<?php
		$jml_hal = ceil($jml / $batas);
		for($i=1; $i<=$jml_hal; $i++) {
			if($i !=$hal) {
				echo "<a href='?page=pelanggan&hal=$i'><button style='background-color:#fff; border:1px; solid #666; color:#666;'>$i</button></a>";
			} else {
				echo "<button style='background-color:#ccc; border:1px; solid #000; '><b>$i</b></button>";
			}
		}
		?>
	</div>
</fieldset>