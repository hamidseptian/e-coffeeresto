<?php 

 ?><div class="box-header with-border">
  <h3 class="box-title">Data Pelanggan</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#addballroom">Print Data Pelanggan</a>
  </div>
</div>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from pelanggan");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Nama</td>
        <td>Alamat Toko</td>
        <td>No HP Toko</td>
        <td>Email</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
    <td><?php echo $d1['nama_pelanggan'] ?></td>
    <td><?php echo $d1['alamat_pelanggan'] ?></td>
    <td><?php echo $d1['nohp_pelanggan'] ?></td>
    <td><?php echo $d1['email_pelanggan'] ?></td>
    <td>
      
      <a href="form/admin/toko/hapus_pelanggan.php?id=<?php echo $d1['id_toko'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
        
     
    </td>
  </tr>
  <?php } ?>
</table>