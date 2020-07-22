<fieldset>
	<legend> Tampil Data Mobil </legend>

	<div style="margin-bottom: 15px" align="right">
		<form action="" method="post">
			<input type="text" name="inputan_pencarian" placeholder="Masukkan merk / type mobil.." style="width:200px; padding:5px;" />
			<input type="submit" name="cari_mobil" value="Cari" style="3px" />
		</form>
	</div>

	<table width="100%" border="1px" style="border-collapse:collapse;">
		<tr style="background-color: #fc0; ">
			<th>#</th>
			<th>Kode Mobil</th>
			<th>Merk</th>
			<th>Type</th>
			<th>Warna</th>
			<th>Harga</th>
			<th>Gambar</th>
			<th>Opsi</th>
		</tr>
		<?php
			$no = 1;
			$batas = 5;
			$hal = @$_GET['hal'];
			if (empty($hal)){
				$posisi = 0;
				$hal = 1;
			} else {
				$posisi = ($hal - 1) * $batas;
			}

			$sql_mobil = mysqli_query($con,"SELECT * FROM tb_mobil LIMIT $posisi, $batas") or die(mysqli_error($con));
			$no = $posisi + 1;
			$cek = mysqli_num_rows($sql_mobil);

			$inputan_pencarian = @$_POST['inputan_pencarian'];
			$cari_mobil = @$_POST['cari_mobil'];
			if($cari_mobil) {
				if($inputan_pencarian != "") {
					/*$sql_mobil = mysqli_query("select * from tb_mobil where merk like '%$inputan_pencarian%' or type like '%$inputan_pencarian%'") or die (mysqli_error());*/
					$sql_mobil = mysqli_query($con, "select * from tb_mobil where merk like '%$inputan_pencarian%' or type like '%$inputan_pencarian%'") or die (mysqli_error($con));
				} else {
					/*$sql = mysqli_query("select * from tb_mobil") or die (mysqli_error());*/
					$sql_mobil = mysqli_query($con, "SELECT * FROM tb_mobil LIMIT $posisi, $batas") or die(mysqli_error($con));
				}
			} else {
				/*$sql = mysqli_query("select * from tb_mobil") or die (mysqli_error());*/
				$sql_mobil = mysqli_query($con,"SELECT * FROM tb_mobil LIMIT $posisi, $batas") or die(mysqli_error($con));
			}

			
			if($cek < 1) {
				?>
				<tr>
					<td colspan="7" align="center" style="padding: 10px;">Data tidak ditemukan </td>
				</tr>
				<?php

			} else {

				while($data = mysqli_fetch_array($sql_mobil)) {
			?>

				<tr>
					<td align="center"><?php echo $no++.".";?></td>
					<td align="center"> <?php echo $data['kode_mobil']; ?> </td>
					<td align="center"> <?php echo $data['merk']; ?> </td>
					<td align="center"> <?php echo $data['type']; ?> </td>
					<td align="center"> <?php echo $data['warna']; ?> </td>
					<td align="center"> <?php echo $data['harga']; ?> </td>
					<td align="center"><img src="img/<?php echo $data['gambar']; ?>" width="120px"/></td> 
					<td align="center"> 
						<a href="?page=mobil&action=edit&kdmobil=<?php echo $data['kode_mobil']; ?>"><button>Edit</button></a> 
						<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=mobil&action=hapus&kdmobil=<?php echo $data['kode_mobil']; ?>"><button>Hapus</button></a>
					</td>
				</tr>
			<?php
			}
		}
		?>
	</table>

	<div style="margin-top: 10px; float: left;">
		<?php 
		$jml = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_mobil"));
		echo "Jumlah data : <b>".$jml."<b>"; 
		?>
		<br>
		<a href="laporan/test_cetak_mobil.php" target="_blank"><button>Cetak</button></a>
	</div>

	<div style="margin-top: 10px; float: right;">
		<?php
		$jml_hal = ceil($jml / $batas);
		for($i=1; $i<=$jml_hal; $i++) {
			if($i !=$hal) {
				echo "<a href='?page=mobil&hal=$i'><button style='background-color:#fff; border:1px; solid #666; color:#666;'>$i</button></a>";
			} else {
				echo "<button style='background-color:#ccc; border:1px; solid #000; '><b>$i</b></button>";
			}
		}
		?>
	</div>
</fieldset>