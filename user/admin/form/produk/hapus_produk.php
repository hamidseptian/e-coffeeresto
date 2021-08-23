
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];
$gb=$_GET['g'];

	$q1=mysqli_query($conn, "DELETE from produk where id_produk='$id'") or die(mysqli_error()); 
	if ($gb!='') {
		unlink("gambar/".$gb);
	}
?>

	<script type="text/javascript">
		alert('Data produk dihapus');
		window.location.href="../../?m=produk"

	</script>