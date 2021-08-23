<?php 
$id = $_SESSION['id_admin']; 
  $q1=mysqli_query($conn, "SELECT * from ongkir join kecamatan on kecamatan.id_kecamatan=ongkir.id_domisili where ongkir.id_toko='$id'")or die(mysqli_error());
  $j1=mysqli_num_rows($q1);
  $no=1;

 

 ?><div class="box-header with-border">
  <h3 class="box-title">Data Ongkir</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <?php if ($j1<=0) { ?>
    <a href="?m=addongkir" class="btn btn-info btn-sm">Kelola Data Ongkir</a>
      
    <?php }
    else { ?>
    <a href="?m=editongkir" class="btn btn-info btn-sm">Kelola Data Ongkir</a>
    <?php } ?>
  </div>
</div>
<hr>

 <table class="table table-striped table-bordered" id="example1">
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
   
    <td>Rp. <?php echo number_format($d1['ongkir']) ?></td>
    
   
  </tr>
  <?php } ?>
</table>