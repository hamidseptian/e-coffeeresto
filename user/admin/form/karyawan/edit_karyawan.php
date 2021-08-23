<div class="box-header with-border">
  <h3 class="box-title">Edit Data karyawan</h3>

  <div class="box-tools pull-right">
    <a href="?m=karyawan" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);

 ?>

<br>

<form action="form/karyawan/simpanedit_karyawan.php" method="post" enctype="multipart/form-data">
  
  <div class="col-md-7">
    
                <div class="form-group">
                  <label>Nama karyawan</label>
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_karyawan'] ?>">
                  <input type="text" name="nama" class="form-control" value="<?php echo $d1['nama_karyawan'] ?>">
              </div> 
              <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" value="<?php echo $d1['alamat_karyawan'] ?>">
              </div> 
              
              <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" name="nohp" class="form-control" value="<?php echo $d1['nohp_karyawan'] ?>">
              </div> 
              
              <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" value="<?php echo $d1['jabatan_karyawan'] ?>">
              </div> 
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $d1['username'] ?>">
              </div> 
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" value="<?php echo $d1['password'] ?>">
              </div> 
              
             
              <div class="form-group">
                 <input type="submit" class="btn btn-info" onclick="return confirm('apakah data yang anda masukan sudah benar.?')" value="Simpan Perubahan Data">
              </div> 

  </div>
             


              
          
</form>