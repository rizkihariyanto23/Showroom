<?php
$kdmobil = @$_GET['kdmobil'];

mysqli_query($con, "delete from tb_mobil where kode_mobil = '$kdmobil'") or die(mysqli_error($con));
?>

<script type="text/javascript">
	window.location.href="?page=mobil";
</script>