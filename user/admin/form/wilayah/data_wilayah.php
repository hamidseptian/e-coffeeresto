<?php 

 ?><div class="box-header with-border">
  <h3 class="box-title">Data Wilayah kecamatan</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addkel">Tambah Wilayah</a>
      <form action="form/wilayah/simpan_wilayah.php" method="post">
        <div class="modal fade" id="addkel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Wilayah kecamatan</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama kecamatan</label>
                  <input type="text" name="nama" class="form-control">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Wilayah</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </form>
  </div>
</div>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from kecamatan");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Nama kecamatan</td>
      
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
    <td><?php echo $d1['nama_kecamatan'] ?></td>
    <td>
      
      <a href="form/wilayah/hapus_wilayah.php?id=<?php echo $d1['id_kecamatan'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
        
     
    </td>
  </tr>
  <?php } ?>
</table>