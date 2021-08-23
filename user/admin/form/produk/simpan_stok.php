<?php 
session_start();
include "../../../../koneksi.php";
// $id = $_SESSION['id_admin'];
if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $id = $d_k['id_toko'];
}else{
  $id = $_SESSION['id_admin'];
}
$id_barang = $_POST['idb'];
$stok = $_POST['stok'];

$data = array_combine($id_barang, $stok);
foreach($data as $idb => $qty){
  $q1=mysqli_query($conn, "SELECT * from barang where id_barang='$idb' and id_toko='$id'");
  $d1=mysqli_fetch_array($q1);
  $stoklama = $d1['stok'];
  $stokbaru = $stoklama + $qty;

  $q2=mysqli_query($conn, "UPDATE barang set stok = '$stokbaru' where id_toko='$id' and id_barang='$idb'");
}
?>


  <script type="text/javascript">
    alert('Stok diperbaharu');
    window.location.href="../../?m=barang"

  </script>