<?php 
$id = $_SESSION['id_admin']; 
  $q1=mysqli_query($conn, "SELECT * from kecamatan ")or die(mysqli_error());
  $j1=mysqli_num_rows($q1);
  $no=1;

 

 ?>
<form action="form/ongkir/simpan_ongkir.php" method="post">
 <div class="box-header with-border">
  <h3 class="box-title">Data Ongkir</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <button class="btn btn-info btn-sm">Simpan Ongkir</button>
    <a href="?m=ongkir" class="btn btn-info btn-sm">Kembali</a>
  </div>
</div>
<hr>

 <table class="table table-striped table-bordered" id="">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Wilayah</td>
        <td>Ongkir</td>
      
        
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    <td><?php echo $d1['nama_kecamatan'] ?></td>
   
    <td>
      <input type="hidden" name="idtoko" class="form-control" value="<?php echo $id ?>">
      <input type="hidden" name="idkel[]" class="form-control" value="<?php echo $d1['id_kecamatan'] ?>">
      <input type="number" name="ongkir[]" class="form-control">
    </td>
    
    
  </tr>
  <?php } ?>
</table>
</form>