 <?php 
include "../../../assets/koneksi.php";
$id_pesanan = $_GET['id_pesanan'];
$sql = "DELETE from  pesanan where id_pesanan='$id_pesanan'

 ";
$query=mysqli_query($conn, $sql)or die(mysqli_error());
?>
<script type="">
	alert('Data pesanan dalam keranjang dihapus');
	window.location.href="../../?h=keranjang"
</script>