<?php 
session_start();
include "../../../assets/koneksi.php";
$user=$_POST['username'];
$pass=$_POST['password'];
//$password= password_hash($pass, PASSWORD_DEFAULT);
//echo $user."<br>".$password;

// $sql= "insert into admin(nama_user, username, password, level) values ('Hamid', '$user', '$password', 'admin')";
// $execute=mysqli_query($conn, $sql);

$sql= "SELECT * from toko where username='$user'";
$execute=mysqli_query($conn, $sql)or die(mysqli_error());
//$x = mysqli_fetch_array($execute);
$jml=mysqli_num_rows($execute);
//echo $jml;
if ($jml>0) {
	$data=mysqli_fetch_array($execute);
	$passdb=$data['password'];
//	$verivikasi=password_verify($pass, $passdb);
	if ($passdb == $pass) {
		if ($data['status']==0) {
				echo "<script>
				alert('Toko anda saat ini masih status menunggu persetujuan admin.');
			</script>
		";
			echo "<meta http-equiv='refresh' content='0; url=http:../../../home/?h=login_toko'>";
		}
		elseif ($data['status']==2) {
			echo "<script>
				alert('Toko anda saat ini sedang di suspend.\nSilahkan hubungi admin untuk mengaktifkan kembali');
			</script>
		";
			echo "<meta http-equiv='refresh' content='0; url=http:../../../home/?h=login_toko'>";
		}
		else{

			$_SESSION['login']=true;
		
			
			$_SESSION['id_admin']=$data['id_toko'];
			$_SESSION['level']="Toko";
			
			header("Location:../../../user/admin/");
		}
	}
	else{
		echo "<script>
				alert('Password Salah');
			</script>
		";

    	echo "<meta http-equiv='refresh' content='0; url=http:../../../home/?h=login_toko'>";
		
	}
	
}

else{

	echo "<script>
				alert('Username dan password salah');
			</script>
		";
    	echo "<meta http-equiv='refresh' content='0; url=http:../../../home/?h=login_toko'>";
	
}



 ?>