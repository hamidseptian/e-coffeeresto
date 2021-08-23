
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "UPDATE toko  set status='3' where id_toko='$id'") or die(mysqli_error()); 

?>

	<script type="text/javascript">
		alert('Toko di putus mitrakan');
		window.location.href="../../?a=toko"

	</script>