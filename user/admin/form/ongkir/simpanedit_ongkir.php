<?php 
include "../../../../assets/koneksi.php";
session_start();
if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $id = $d_k['id_toko'];
}else{
  $id = $_SESSION['id_admin'];
}
$idkel=$_POST['idkel'];
$ongkir=$_POST['ongkir'];
$ongkir = str_replace(".", '', $ongkir);

$data = array_combine($idkel, $ongkir);
foreach ($data as $idk => $ongkir) {
	$q1=mysqli_query($conn, "UPDATE ongkir set 
		
		ongkir='$ongkir'
		where id_toko='$id' and
		id_domisili='$idk'
		
		
		")or die(mysqli_error()); 	
}

?>

	<script type="text/javascript">
		alert('Data ongkir berhasil diperbaharui');
		window.location.href="../../?m=ongkir"

	</script>
