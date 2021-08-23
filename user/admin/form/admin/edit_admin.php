<div class="box-header with-border">
  <h3 class="box-title">Edit Akun</h3>

  <div class="box-tools pull-right">
    <a href="?a=produk" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$idadmin = $_SESSION['id_admin'];
$level = $_SESSION['level'];




  $qadmin = mysqli_query($conn, "SELECT * from admin where id_admin='$idadmin'")or die(mysqli_error());
  $dadmin = mysqli_fetch_array($qadmin);
  $adminname=$dadmin['nama_admin'];
  $password=$dadmin['password'];
  $username=$dadmin['username'];



 ?>

<br>

<form action="form/admin/simpanedit_admin.php" method="post" enctype="multipart/form-data">

  <div class="col-md-7">
    
                <div class="form-group">
                  <label>Nama Admin</label>
                  <input type="text" name="adminname" class="form-control" value="<?php echo $adminname ?>">
              </div> 
              
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" required class="form-control" value="<?php echo $username ?>">
              </div> 
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" required class="form-control" value="<?php echo $password ?>">
              </div> 
              
              
             
              <div class="form-group">
                 <input type="submit" class="btn btn-info" onclick="return confirm('apakah data yang anda masukan sudah benar.?')" value="Simpan Perubahan Data">
              </div> 

  </div>
             


              
          
</form>