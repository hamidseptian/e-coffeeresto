<?php 

if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $idtoko = $d_k['id_toko'];
}else{
  $idtoko = $_SESSION['id_admin'];
}

  $q2=mysqli_query($conn, "SELECT * from produk where id_toko='$id'");
  $no=1;
 ?><div class="box-header with-border">
  <h3 class="box-title">Data produk</h3>

  <div class="box-tools pull-right">
    <a href="form/produk/print_menu.php" class="btn btn-info btn-sm"  target="_blank">Print Daftar Menu</a>
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addproduk">Tambah Data produk</a>
  </div>
</div>


<form action="form/toko/produk/simpan_stok.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addstok">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data produk</h4>
              </div>
              <div class="modal-body">
                <table class="table">
                  <tr>
                    <td>produk</td>
                    <td>Harga</td>
                    <td>Stok Terkini</td>
                    <td>Tambah Stok</td>
                  </tr>
                  <?php while ($d2=mysqli_fetch_array($q2)) { ?>
                  <tr>
                    <td><?php echo $d2['nama_produk'] ?></td>
                    <td>Rp. <?php echo number_format($d2['harga_jual']) ?></td>
                    <td><?php echo $d2['stok'] ?> Unit</td>
                   
                    <td>
                      <input type="number" name="stok[]" class="form-control" >
                      <input type="hidden" name="idb[]" class="form-control" value="<?php echo  $d2['id_produk'] ?>" >
                    </td>
                  </tr>
                  <?php } ?>
                </table>
           
             
             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')">Simpan Data produk</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>




<form action="form/produk/simpan_produk.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addproduk">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data produk</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                  <label>Nama produk</label>
                  <input type="text" name="nama" class="form-control">
              </div> 
              
              <div class="form-group">
                  <label>Harga Jual</label>
                  <input type="text" name="hj" required class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
              </div> 
              <div class="form-group">
                  <label>Gambar</label>
                  <input type="file" name="berkas" required >
              </div> 
          
             
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')">Simpan Data produk</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from produk where id_toko='$id'");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Gambar</td>
        <td>Nama produk</td>
        <td>Harga</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) {
  if ($d1['gambar_produk']=='') {
          $gambar='default.png';
          # code...
        }else{
          $gambar=$d1['gambar_produk'];
        } 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
    <td><img src="form/produk/gambar/<?php echo $gambar ?>" style="width:200px"></td>
    <td><?php echo $d1['nama_produk'] ?></td>
   
    <td>Rp. <?php echo number_format($d1['harga']) ?></td>
    <td>
      <a href="form/produk/hapus_produk.php?id=<?php echo $d1['id_produk'] ?>&g=<?php echo $d1['gambar_produk'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?m=edit_produk&id=<?php echo $d1['id_produk'] ?>" class="btn btn-warning btn-xs">Edit</a>    
    </td>
  </tr>
  <?php } ?>
</table>