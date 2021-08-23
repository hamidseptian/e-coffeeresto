
<?php 
include "../../../../koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from rekening where id_rekening='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data rekening dihapus');
		window.location.href="../../../?m=rekening"

	</script>