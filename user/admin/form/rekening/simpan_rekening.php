<?php 
include "../../../../koneksi.php";

session_start();
$id = $_SESSION['id_admin'];
$bank=$_POST['bank'];
$kode=$_POST['kodebank'];
$rekening=$_POST['rekening'];


	$q1=mysqli_query($conn, "INSERT into rekening set 
		id_toko='$id',
		bank='$bank',
		kode_bank='$kode',
		no_rekening='$rekening'
		
		
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data rekening berhasil disimpan');
		window.location.href="../../../?m=rekening"

	</script>
