 <?php 
include "../../../assets/koneksi.php";
session_start();
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$username = $_POST['username'];
$password = $_POST['password'];
$domisili = $_POST['domisili'];

$cek_username = mysqli_query($conn, "SELECT * from pelanggan where username='$username'");
$j_cek_username = mysqli_num_rows($cek_username);
if ($j_cek_username>0) { ?>
	<script type="">
		alert('Register gagal\nUsername sudah digunakan');
		window.location.href="../../?h=daftar_pelanggan"
	</script>
<?php }else{
$sql = "INSERT INTO pelanggan
set 
 nama_pelanggan='$nama',
alamat_pelanggan='$alamat',
id_domisili='$domisili',
nohp_pelanggan='$nohp',
username='$username',
password ='$password'
 ";
$query=mysqli_query($conn, $sql)or die(mysqli_error());

$_SESSION['pesan'] = '<div class="alert alert-info">Pendaftaran berhasil<br>Silahkan login</div>';

?>
<script type="">
	alert('Register berhasil');
	window.location.href="../../?h=login_pelanggan"
</script>
<?php 	} ?>