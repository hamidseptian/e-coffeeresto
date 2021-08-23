<?php 
session_start() ;
$id=$_SESSION['id_admin'];
include "../../../../assets/koneksi.php";
$passdb =$_POST['passdb'];
$passlama    =$_POST['passlama'];
$passbaru   =$_POST['passbaru'];
$username   =$_POST['username'];
echo $id;
$cek_username = mysqli_query($conn, "SELECT * from toko where username='$username' and id_toko!='$id'");
$j_cek_username = mysqli_num_rows($cek_username);
// echo $j_cek_username;
if ($j_cek_username>0) { ?>
	<script type="">
		alert('Register gagal\nUsername sudah digunakan');
		window.location.href="../../?m=edit_toko"
	</script>
<?php }else{
	if ($passlama==$passdb) {
	    $q1 = mysqli_query($conn, "UPDATE toko set
	               
	                password='$passbaru'
	                where id_toko='$id'
	    ")or die(mysqli_error());
	 ?>

	 <script type="text/javascript">
	     alert('Password diperbaharui');
	     window.location.href="../../"
	 </script>
	<?php   }
	else{ ?>
	 <script type="text/javascript">
	     alert('Password gagal diperbaharui\npassword yama anda tidak cocok dengan password yang tersimpan');
	     window.location.href="../../?m=edit_toko"
	 </script>
<?php 
	}
} 
?>

