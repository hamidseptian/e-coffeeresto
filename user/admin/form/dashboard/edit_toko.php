<div class="box-header with-border">
  <h3 class="box-title">Perbarui Data Toko</h3>


</div>


<?php   
$idus= $_SESSION['id_admin'];
  
  $prt=mysqli_query($conn, "SELECT * from toko where id_toko='$idus'")or die("salah");
  $kec=mysqli_query($conn, "SELECT * from kecamatan")or die("salah");
  
  $data=mysqli_fetch_array($prt);
  $toko=$data['nama_toko'];
  $owner=$data['pemilik_toko'];
  $alm=$data['alamat_toko'];
  $hp=$data['nohp_toko'];
  $user=$data['username'];
  $pass = $data['password'];
  $iframe = $data['iframe'];
 

 ?>


<form action="form/dashboard/simpanedit_toko.php" method="post">

  <div class="col-md-6"> 
             <div class="form-group">
                  <label>Jenis Toko</label>
                  <select name="jenis" class="form-control" >
                    <option value="Restoran" <?php if($data['jenis_toko']=='Restoran'){echo "selected";} ?>>Restoran</option>
                    <option value="Coffee shop" <?php if($data['jenis_toko']=='Coffee shop'){echo "selected";} ?>>Coffee shop</option>
                    
                  </select>
              </div> 
              <div class="form-group">
                  <label>Nama Toko</label>
                  <input type="text" name="nama" class="form-control"  value="<?php echo $toko ?>">
              </div> 
              <div class="form-group">
                  <label>Pemilik Toko</label>
                  <input type="text" name="pemilik" class="form-control"  value="<?php echo $owner ?>">
              </div>
               <div class="form-group">
                  <label>Keterangan</label>
                    
                  <!-- <input type="text" name="ket" class="form-control" value="<?php echo $data['keterangan_toko'] ?>"> -->
                  <textarea name="ket" class="form-control" rows="4"><?php echo $data['keterangan_toko'] ?></textarea>
              </div> 
             
            
    </div>
      <div class="col-md-6">
         
              <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alm" class="form-control" value="<?php echo $alm ?>">
              </div> 
              <div class="form-group">
                  <label>Domisili</label>
                  <select name="domisili" class="form-control" value="<?php echo $data['id_domisili'] ?>">
                  	<?php while ($d_kec=mysqli_fetch_array($kec)) { ?>
                  		<option value="<?php echo $d_kec['id_kecamatan'] ?>" <?php if($d_kec['id_kecamatan']==$data['id_domisili']){echo "selected";} ?>><?php echo $d_kec['nama_kecamatan'] ?></option>
                  	<?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>No HP</label>
                  <input type="text" name="hp" class="form-control" value="<?php echo $hp ?>">
              </div> 

               <div class="form-group">
                  <label>I Frame Google Maps</label>
                    
                  <!-- <input type="text" name="ket" class="form-control" value="<?php echo $data['keterangan_toko'] ?>"> -->
                  <textarea name="iframe" class="form-control" rows="4">
                  	<?php echo $data['iframe'] ?>
                  </textarea>
              </div> 

           
             
  </div>   
  <div class="clearfix"> </div>     
              
              <div class="form-group">
                  <input type="submit" value="Simpan Perubahan Data" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')" class="btn btn-info">
              </div> 

              
</form>

<hr>  






<form action="form/dashboard/simpanedit_password.php" method="post">
  
  <div class="col-md-6"> 
	<div class="box-header with-border">
	  <h3 class="box-title">Perbarui Password</h3>
	</div>
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder=" masukan password baru anda" value="<?php echo   $user ?>">
              </div> 
              <div class="form-group">
                  <label>Password Lama</label>
                  <input type="hidden" name="passdb" class="form-control"  value="<?php echo $pass ?>">
                  <input type="password" name="passlama" class="form-control" placeholder=" Masukan Passwoed Lama Anda">
              </div> 
              <div class="form-group">
                  <label>Password Baru</label>
                  <input type="password" name="passbaru" class="form-control" placeholder=" masukan password baru anda">
              </div> 
            
    
              
              <div class="form-group">
                  <input type="submit" value="Simpan Perubahan Data" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')" class="btn btn-info">
              </div> 
  </div>
       
  <div class="col-md-6"> 
	<div class="box-header with-border">
	  <h3 class="box-title">I Frame Maps</h3>
	</div>
              <div class="form-group">
                 <?php echo $data['iframe'] ?>
              </div> 
             
  </div>
      

  <div class="clearfix"> </div>     

              
</form>
