<?php 
session_start();
include "../../../assets/koneksi.php";
$user=$_POST['username'];
$pass=$_POST['password'];
//$password= password_hash($pass, PASSWORD_DEFAULT);
//echo $user."<br>".$password;

// $sql= "insert into admin(nama_user, username, password, level) values ('Hamid', '$user', '$password', 'admin')";
// $execute=mysqli_query($conn, $sql);

$sql= "SELECT * from admin where username='$user'";
$execute=mysqli_query($conn, $sql)or die(mysqli_error());
//$x = mysqli_fetch_array($execute);
$jml=mysqli_num_rows($execute);
//echo $jml;
if ($jml>0) {
	$data=mysqli_fetch_array($execute);
	$passdb=$data['password'];
//	$verivikasi=password_verify($pass, $passdb);
	if ($passdb == $pass) {
		$_SESSION['login']=true;
	
		
		$_SESSION['id_admin']=$data['id_admin'];
		$_SESSION['level']="Admin";
		
		header("Location:../../../user/admin/");
	}
	else{
		echo "<script>
				alert('Password Salah. Silahkan coba lagi');
			</script>
		";

    	echo "<meta http-equiv='refresh' content='0; url=http:../../?h=login_admin'>";
		
	}
	
}

else{

	echo "<script>
				alert('Username dan password salah');
			</script>
		";
    	echo "<meta http-equiv='refresh' content='0; url=http:../../?h=login_admin'>";
	
}



 ?>