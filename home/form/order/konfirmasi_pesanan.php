 <?php 
include "../../../assets/koneksi.php";
session_start();
$id = $_SESSION['id_user'];
$tgls = date('Y-m-d H:i:s');
$sql = "UPDATE pesanan
set 
 tanggal_pesan='$tgls',
 status_pesanan ='Order'
 where id_pelanggan='$id' and status_pesanan='Masuk ke Keranjang'

 ";
$query=mysqli_query($conn, $sql)or die(mysqli_error());
?>
<script type="">
	alert('Pesanan dikonfirmasi');
	window.location.href="../../?h=detail_semua_pesanan&waktu=<?php echo $tgls ?>"
</script>