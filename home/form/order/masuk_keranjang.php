 <?php 
include "../../../assets/koneksi.php";
session_start();
$id = $_SESSION['id_user'];
$id_produk = $_POST['id_produk'];
$qty = $_POST['qty'];
$id_toko = $_POST['id_toko'];
$metode = $_POST['metode'];

$sql = "INSERT INTO pesanan
set 
  id_produk='$id_produk',
 jumlah_pesanan='$qty',
 id_pelanggan='$id',
 id_toko='$id_toko',
 status_pesanan ='Masuk Ke Keranjang'

 ";

 if ($metode=='pertoko') {
 	$redirect = '?h=detail_toko&id='.$id_toko;
 }else{
 	$redirect = '?h=produk';
 }
$query=mysqli_query($conn, $sql)or die(mysqli_error());
?>
<script type="">
	alert('Produk di masukkan ke keranjang');
	window.location.href="../../<?php echo $redirect ?>"
</script>