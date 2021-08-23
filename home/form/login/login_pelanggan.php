<div class="well">
<?php 
if (isset($_SESSION['pesan'])) {
	echo $_SESSION['pesan'];
	unset($_SESSION['pesan']);
}
 ?>
	<form class="form-horizontal" action="form/login/proseslogin_pelanggan.php" method="post">
		<h4>Login Pelanggan</h4>
	
	
		<div class="control-group">
			<label class="control-label" for="inputFname1">Username</label>
			<div class="controls">
			  <input type="text" name="username" class="form-control" style="width:500px">
			</div>
		 </div>
	
	
		<div class="control-group">
			<label class="control-label" for="inputFname1">Password</label>
			<div class="controls">
			  <input type="password" name="password" class="form-control" style="width:500px">
			</div>
		 </div>
	
	
		
		
	
	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-sm btn-success" type="submit" value="Login">
			</div>
		</div>		
	</form>
</div>