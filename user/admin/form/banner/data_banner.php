<?php 

if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $id = $d_k['id_toko'];
}else{
  $id = $_SESSION['id_admin'];
}
  $q2=mysqli_query($conn, "SELECT * from banner where id_toko='$id'");
  $no=1;
 ?><div class="box-header with-border">
  <h3 class="box-title">Banner Toko</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addbanner">Tambah Banner Toko</a>
  </div>
</div>


<form action="form/toko/banner/simpan_stok.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addstok">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Banner Toko</h4>
              </div>
              <div class="modal-body">
                <table class="table">
                  <tr>
                    <td>banner</td>
                    <td>Harga</td>
                    <td>Stok Terkini</td>
                    <td>Tambah Stok</td>
                  </tr>
                  <?php while ($d2=mysqli_fetch_array($q2)) { ?>
                  <tr>
                    <td><?php echo $d2['nama_banner'] ?></td>
                    <td>Rp. <?php echo number_format($d2['harga_jual']) ?></td>
                    <td><?php echo $d2['stok'] ?> Unit</td>
                   
                    <td>
                      <input type="number" name="stok[]" class="form-control" >
                      <input type="hidden" name="idb[]" class="form-control" value="<?php echo  $d2['id_banner'] ?>" >
                    </td>
                  </tr>
                  <?php } ?>
                </table>
           
             
             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')">Simpan Banner Toko</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>




<form action="form/banner/simpan_banner.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addbanner">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Banner Toko</h4>
              </div>
              <div class="modal-body">
             
              <div class="form-group">
                  <label>Gambar</label>
                  <input type="file" name="berkas" required >
              </div> 
          
             
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')">Simpan Banner Toko</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from banner where id_toko='$id'");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Gambar</td>
     
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) {
  if ($d1['file']=='') {
          $gambar='default.png';
          # code...
        }else{
          $gambar=$d1['file'];
        } 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
    <td><img src="form/banner/gambar/<?php echo $gambar ?>" style="width:400px"></td>
   
    <td>
      <a href="form/banner/hapus_banner.php?id=<?php echo $d1['id_banner'] ?>&g=<?php echo $d1['file'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a> 
    </td>
  </tr>
  <?php } ?>
</table>