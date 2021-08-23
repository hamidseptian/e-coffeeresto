 <?php 
include "../../../assets/koneksi.php";
$id_pesanan = $_POST['id_pesanan'];
$qty = $_POST['qty'];
$sql = "UPDATE  pesanan set jumlah_pesanan='$qty' where id_pesanan='$id_pesanan'

 ";
$query=mysqli_query($conn, $sql)or die(mysqli_error());
?>
<script type="">
	alert('Data pesanan dalam keranjang diperbaharui');
	window.location.href="../../?h=keranjang"
</script>