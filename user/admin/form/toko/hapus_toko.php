
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from toko where id_toko='$id'") or die(mysqli_error()); 

?>

	<script type="text/javascript">
		alert('Data toko dihapus');
		window.location.href="../../?a=toko"

	</script>