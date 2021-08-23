<?php 
// session_start();
// $id = $_SESSION['id_admin'];
if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $id = $d_k['id_toko'];
}else{
  $id = $_SESSION['id_admin'];
}
 ?><div class="box-header with-border">
  <h3 class="box-title">Data Pesanan</h3>

  
</div>

<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from pesanan 
    join barang on pesanan.id_barang=barang.id_barang
    join pelanggan on pelanggan.id_pelanggan=pesanan.id_pelanggan
    join toko on barang.id_toko=toko.id_toko
    where barang.id_toko='$id' and pesanan.status_pesanan='Diantarkan' group by pesanan.id_pelanggan");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Nama Pelangan</td>
        <td>Tanggal Pesan</td>
       
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
    
    <td>
      
      <a href="?m=detail_pesanan_acc&id=<?php echo $d1['id_pelanggan'] ?>" class="btn btn-info btn-xs">Detail Pesanan</a>    
    </td>
  </tr>
  <?php } ?>
</table>