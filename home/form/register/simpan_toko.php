 <?php 
include "../../../assets/koneksi.php";
session_start();
$jenis = $_POST['jenis'];
$nama = $_POST['nama'];
$pemilik = $_POST['pemilik'];
$ket = $_POST['ket'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$username = $_POST['username'];
$password = $_POST['password'];
$domisili = $_POST['domisili'];
$iframe = $_POST['iframe'];

$cek_username = mysqli_query($conn, "SELECT * from toko where username='$username'");
$j_cek_username = mysqli_num_rows($cek_username);
if ($j_cek_username>0) { ?>
	<script type="">
		alert('Register gagal\nUsername sudah digunakan');
		window.location.href="../../?h=daftar_toko"
	</script>
<?php }else{
$sql = "INSERT INTO toko
set 
 nama_toko='$nama',
 pemilik_toko='$pemilik',
jenis_toko='$jenis',
keterangan_toko='$ket',
alamat_toko='$alamat',
id_domisili='$domisili',
nohp_toko='$nohp',
username='$username',
password ='$password',
iframe ='$iframe',
status='0'
 ";
 $_SESSION['pesan'] = '<div class="alert alert-info">Pendaftaran berhasil<br>Silahkan login</div>';
$query=mysqli_query($conn, $sql)or die(mysqli_error());
?>
<script type="">
	alert('Register berhasil');
	window.location.href="../../?h=login_toko"
</script>
<?php 	} ?>