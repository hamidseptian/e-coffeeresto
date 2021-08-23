<?php 
include "../../../../assets/koneksi.php";

session_start();
// $id = $_SESSION['id_admin'];
if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $id = $d_k['id_toko'];
}else{
  $id = $_SESSION['id_admin'];
}
$nama=$_POST['nama'];
$hj=$_POST['hj'];
$hj = str_replace(".", '', $hj);


//untuk upload file
$ekstensi_diperbolehkan	= array('jpg','png','gif');
$lokasifile=$_FILES['berkas']['tmp_name'];
$file=$_FILES['berkas']['name'];
$x = explode('.', $file);
$ekstensi = strtolower(end($x));
$ukuran=$_FILES['berkas']['size'];
$namafile=date('Ymdhis').$file;
$folder="gambar/".$namafile;

$tgls=date('Y-m-d');
$upload=move_uploaded_file($lokasifile, $folder);



	$q1=mysqli_query($conn, "INSERT into produk set 
		id_toko='$id',
		nama_produk='$nama',
		harga='$hj',
		gambar_produk='$namafile'
		
		
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data produk berhasil disimpan');
		window.location.href="../../?m=produk"

	</script>
