<?php 
include "../../../../koneksi.php";
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$alm=$_POST['alm'];
$hp=$_POST['hp'];
$username = date('ymdhis');


	$q1=mysqli_query($conn, "INSERT into toko set 
		nama_toko='$nama',
		jenis_konveksi='$jenis',
		alamat_toko='$alm',
		nohp_toko='$hp',
		username='$username',
		password='123'
		
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data toko berhasil disimpan');
		window.location.href="../../../?a=toko"

	</script>
