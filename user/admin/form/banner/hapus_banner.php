
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];
$gb=$_GET['g'];

	$q1=mysqli_query($conn, "DELETE from banner where id_banner='$id'") or die(mysqli_error()); 
	if ($gb!='') {
		@unlink("gambar/".$gb);
	}
?>

	<script type="text/javascript">
		alert('Data banner dihapus');
		window.location.href="../../?m=banner"

	</script>