
<?php
include "../../../../koneksi.php";


$username		= $_POST['username'];
$pass			= password_hash($_POST['pass'], PASSWORD_DEFAULT);
$id_p		= $_POST['id_p'];
$lv		= 'Penjabat Penilai';



$join="SELECT * from admin join penjabat_penilai on penjabat_penilai.id_penjabat_penilai=admin.id_user where admin.id_user='$id_p' and admin.level='Penjabat Penilai'";
$pjoin=mysqli_query($conn, $join);
$tampil=mysqli_fetch_array($pjoin);
{
	$nmp=$tampil['nama_penjabat_penilai'];
}
$id_png="SELECT * FROM admin where id_user='$id_p'";
$jm_id_p=mysqli_query($conn, $id_png);

$adminnm="SELECT * FROM admin where username='$username'";
$jm_adminnm=mysqli_query($conn, $adminnm);
$jml_adminnm=mysqli_num_rows($jm_adminnm);


$jml_idp=mysqli_num_rows($jm_id_p);
if($jml_idp==1){
	 echo "<script type='text/javascript'>
    		alert('Penambahan Admin Gagal. $nmp Sudah Menjadi Admin ');
    </script>";

    echo "<meta http-equiv='refresh' content='0; url=http:../../index.php?m=admindata'>";
}
elseif($jml_adminnm==1){

	 echo "<script type='text/javascript'>
    		alert('Penambahan Admin Gagal. Username sudah dipakai ');
    </script>";

    echo "<meta http-equiv='refresh' content='0; url=http:../../index.php?m=admindata'>";
}
else{

			$sql = "insert into admin (id_user, username, password, level)
			 values('$id_p',  '$username', '$pass','$lv')";

			$result	= mysqli_query($conn, $sql)or die(mysqli_error());

			if($result){
			    echo "<script type='text/javascript'>
			    		alert('Admin telah Ditambahkan');
			    </script>";

			    echo "<meta http-equiv='refresh' content='0; url=http:../../index.php?m=admindata'>";

			}else{
			echo "<script type='text/javascript'>
				onload =function(){
				alert('Data Gagal Disimpan!');
				}
				</script>";
			}
}
?>