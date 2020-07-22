<?php
$ID = @$_GET['ID'];

mysqli_query($con, "delete from tb_pelanggan where no_identitas = '$ID'") or die(mysqli_error($con));
?>

<script type="text/javascript">
	window.location.href="?page=pelanggan";
</script>