
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "UPDATE toko  set status='1' where id_toko='$id'") or die(mysqli_error()); 

?>

	<script type="text/javascript">
		alert('Toko sudah dijadikan Mitra');
		window.location.href="../../?a=toko"

	</script>