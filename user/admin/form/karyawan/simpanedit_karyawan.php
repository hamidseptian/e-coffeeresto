<?php 
include "../../../../assets/koneksi.php";

session_start();
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$jabatan = $_POST['jabatan'];

$username = $_POST['username'];
$password = $_POST['password'];

$cek_username = mysqli_query($conn, "SELECT * from karyawan where username='$username' and id_karyawan !='$id'");
$j_cek_username = mysqli_num_rows($cek_username);
if ($j_cek_username>0) { ?>
	<script type="">
		alert('Penambahan karyawan gagal\nUsername sudah digunakan');
		window.location.href="../../?m=karyawan"
	</script>
<?php }else{
	$q1=mysqli_query($conn, "UPDATE karyawan set 
		 nama_karyawan='$nama',
		alamat_karyawan='$alamat',
		nohp_karyawan='$nohp',
		jabatan_karyawan ='$jabatan',
	username ='$username',
		password ='$password'
		where id_karyawan='$id'	
		
		
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data karyawan berhasil diperbaharui');
		window.location.href="../../?m=karyawan"

	</script>
<?php 	} ?>