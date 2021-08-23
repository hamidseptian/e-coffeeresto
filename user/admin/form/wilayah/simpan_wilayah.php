
<?php 
include "../../../../assets/koneksi.php";
$nama=$_POST['nama'];

	$q1=mysqli_query($conn, "INSERT INTO kecamatan set nama_kecamatan='$nama'") or die(mysqli_error()); 

?>

	<script type="text/javascript">
		alert('Data wilayah disimpan');
		window.location.href="../../?a=wilayah"

	</script>