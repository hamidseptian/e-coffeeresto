<?php 
$id = $_SESSION['id_admin'];

  $q2=mysqli_query($conn, "SELECT * from karyawan where id_toko='$id'");
  $no=1;
 ?><div class="box-header with-border">
  <h3 class="box-title">Data karyawan</h3>

  <div class="box-tools pull-right">
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addkaryawan">Tambah Data karyawan</a>
  </div>
</div>





<form action="form/karyawan/simpan_karyawan.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addkaryawan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data karyawan</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                  <label>Nama karyawan</label>
                  <input type="text" name="nama" class="form-control" required>
              </div> 
              
              <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" required>
              </div> 
              
              <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" name="nohp" class="form-control" required>
              </div> 
              
              <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" required>
              </div> 
              
          
             
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')">Simpan Data karyawan</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from karyawan where id_toko='$id'");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Nama karyawan</td>
        <td>Alamat</td>
        <td>No HP</td>
        <td>Jabatan</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) {

    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
    <td><?php echo $d1['nama_karyawan'] ?></td>
    <td><?php echo $d1['alamat_karyawan'] ?></td>
    <td><?php echo $d1['nohp_karyawan'] ?></td>
    <td><?php echo $d1['jabatan_karyawan'] ?></td>
   
    <td>
      <a href="form/karyawan/hapus_karyawan.php?id=<?php echo $d1['id_karyawan'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?m=edit_karyawan&id=<?php echo $d1['id_karyawan'] ?>" class="btn btn-warning btn-xs">Edit</a>    
    </td>
  </tr>
  <?php } ?>
</table>