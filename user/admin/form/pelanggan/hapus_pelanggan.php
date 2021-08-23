
<?php 
include "../../../../koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from pelanggan where id_pelanggan='$id'") or die(mysqli_error()); 

?>

	<script type="text/javascript">
		alert('Data toko dihapus');
		window.location.href="../../../?a=pelanggan"

	</script>