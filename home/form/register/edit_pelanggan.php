<?php 

$id=$_SESSION['id_user'];
		$q=mysqli_query($conn, "SELECT * from pelanggan  where id_pelanggan='$id'")or die(mysqli_error());
		$d=mysqli_fetch_array($q);

		 ?>

<div class="well">

	<form class="form-horizontal" action="form/register/simpanedit_pelanggan.php" method="post">
		<h4>Edit Data  Pelanggan</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">Nama</label>
			<div class="controls">
			  <input type="text" name="nama" class="form-control" style="width:500px" value="<?php echo $d['nama_pelanggan'] ?>">
			</div>
		 </div>
	
	
		<div class="control-group">
			<label class="control-label" for="inputFname1">Alamat</label>
			<div class="controls">
			  <input type="text" name="alamat" class="form-control" style="width:500px" value="<?php echo $d['alamat_pelanggan'] ?>">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label">Domisili <sup>*</sup></label>
			<div class="controls">
			<select class="form-control" style="width:500px" name="domisili">
				<?php 
					  $kec=mysqli_query($conn, "SELECT * from kecamatan")or die("salah");
					  while ($d_kec=mysqli_fetch_array($kec)) { ?>
	                  		<option value="<?php echo $d_kec['id_kecamatan'] ?>" <?php if($d['id_domisili']==$d_kec['id_kecamatan']){echo "selected";} ?>><?php echo $d_kec['nama_kecamatan'] ?></option>
	                  	<?php } ?>
			</select>
			</div>
			</div>
		<div class="control-group">
			<label class="control-label" for="inputFname1">No HP</label>
			<div class="controls">
			  <input type="text" name="nohp" class="form-control" style="width:500px" value="<?php echo $d['nohp_pelanggan'] ?>">
			</div>
		 </div>
	
		<div class="control-group">
			<label class="control-label" for="inputFname1">Username</label>
			<div class="controls">
			  <input type="text" name="username" class="form-control" style="width:500px" value="<?php echo $d['username'] ?>">
			</div>
		 </div>
	
	
		<div class="control-group">
			<label class="control-label" for="inputFname1">Password</label>
			<div class="controls">
			  <input type="password" name="password" class="form-control" style="width:500px" value="<?php echo $d['password'] ?>">
			</div>
		 </div>
	
	
		
		
	
	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-sm btn-success" type="submit" value="Simpan Perubahan">
			</div>
		</div>		
	</form>
</div>