<?php 

if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $id = $d_k['id_toko'];
}else{
  $id = $_SESSION['id_admin'];
}
 ?><div class="box-header with-border">
  <h3 class="box-title">Data Pesanan Baru</h3>
  <div class="pull-right">
    <!-- <a href="form/toko/pesanan/print_pesanan.php" target="_blank" class="btn btn-info btn-sm">Print Data Pesanan</a> -->
  </div>

  
</div>

<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from pesanan 
    join produk on pesanan.id_produk=produk.id_produk
    join pelanggan on pelanggan.id_pelanggan=pesanan.id_pelanggan
    join toko on produk.id_toko=toko.id_toko
    where produk.id_toko='$id' and pesanan.status_pesanan in ('Di batalkan','Selesai') group by pesanan.id_pelanggan");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Nama Pelangan</td>
        <td>Tanggal Pesan</td>
        <td>Status Pesanan</td>
       
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
    
    <td><?php echo $d1['nama_pelanggan'] ?></td>
   
    <td><?php echo $d1['tanggal_pesan'] ?></td>
    <td><?php echo $d1['status_pesanan'] ?></td>
    
    <td>
      
      <a href="?m=detail_pesanan&id=<?php echo $d1['id_pelanggan'] ?>&waktu=<?php echo $d1['tanggal_pesan'] ?>&status=<?php echo $d1['status_pesanan'] ?>" class="btn btn-info btn-xs">Detail Pesanan</a>    
    </td>
  </tr>
  <?php } ?>
</table>