
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from kecamatan where id_kecamatan='$id'") or die(mysqli_error()); 

?>

	<script type="text/javascript">
		alert('Data wilayah dihapus');
		window.location.href="../../?a=wilayah"

	</script>