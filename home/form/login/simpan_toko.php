 <?php 
include "../../../assets/koneksi.php";

$jenis = $_POST['jenis'];
$nama = $_POST['nama'];
$ket = $_POST['ket'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$username = $_POST['username'];
$password = $_POST['password'];

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
jenis_toko='$jenis',
keterangan_toko='$ket',
alamat_toko='$alamat',
nohp_toko='$nohp',
username='$username',
password ='$password'
 ";
$query=mysqli_query($conn, $sql)or die(mysqli_error());
?>
<script type="">
	alert('Register berhasil');
	window.location.href="../../?h=login_toko"
</script>
<?php 	} ?>