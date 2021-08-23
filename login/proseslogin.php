<?php 
session_start();
include "../assets/koneksi.php";
$user=$_POST['username'];
$pass=$_POST['password'];
$level=$_POST['level'];
//$password= password_hash($pass, PASSWORD_DEFAULT);
//echo $user."<br>".$password;

// $sql= "insert into admin(nama_user, username, password, level) values ('Hamid', '$user', '$password', 'admin')";
// $execute=mysqli_query($conn, $sql);
if ($level=='Penduduk') {
	$sql= "SELECT * from penduduk where nik='$user' and password='$pass'";
}
elseif ($level=='Mitra') {
	$sql= "SELECT * from mitra where username='$user' and password='$pass'";
}
elseif ($level=='Admin') {
	$sql= "SELECT * from user where username='$user' and password='$pass' and level='Admin'";
}
else{
	$sql= "SELECT * from user where username='$user' and password='$pass' and level='Pimpinan'";
}
$execute=mysqli_query($conn, $sql) or die(mysqli_error());
//$x = mysqli_fetch_array($execute);
$jml=mysqli_num_rows($execute);
//echo $jml;
if ($jml==1) {
	$data=mysqli_fetch_array($execute);

		$_SESSION['login']=true;
	
		if ($level=='Penduduk') {
			$id_user=$data['id_penduduk'];
		}
		elseif ($level=='Mitra') {
			$id_user=$data['id_mitra'];
		}
		else{
			$id_user=$data['id_user'];
		}
		
		$_SESSION['id_user']=$id_user;
		$_SESSION['level']=$level;
		
		header("Location:../user/admin/");
	
	
}

else{

	echo "<script>
				alert('Username dan Password salah!');
			</script>
		";
    	echo "<meta http-equiv='refresh' content='0; url=http:../login/'>";
	
}



 ?>