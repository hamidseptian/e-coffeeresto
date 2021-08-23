<?php 
include "../../../../koneksi.php";

$id = $_POST['id'];
$bank=$_POST['bank'];
$kode=$_POST['kodebank'];
$rekening=$_POST['rekening'];


	$q1=mysqli_query($conn, "UPDATE rekening set 
		bank='$bank',
		kode_bank='$kode',
		no_rekening='$rekening'
		where id_rekening='$id'
		
		
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data rekening berhasil disimpan');
		window.location.href="../../../?m=rekening"

	</script>
