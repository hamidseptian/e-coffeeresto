<?php 
include "../../../../assets/koneksi.php";

session_start();


$id = $_SESSION['id_admin'];
$level = $_SESSION['level'];


$username = $_POST['username'];
$password = $_POST['password'];
$q1=mysqli_query($conn, "UPDATE admin set 
		
	username='$username',
		password='$password'
		where id_admin='$id'
		
		
		")or die(mysqli_error());?>
	<script type="text/javascript">
		alert('Data admin diperbaharui');
		window.location.href="../../"

	</script>