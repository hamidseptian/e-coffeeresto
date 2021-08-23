<?php 
session_start();
include "../../../../koneksi.php";
$idtoko= $_SESSION['id_admin']; 

$q1 = mysqli_query($conn, "SELECT * from toko where id_toko='$idtoko'")or die(mysqli_error());
$q2 = mysqli_query($conn, "SELECT * from barang where id_toko='$idtoko'")or die(mysqli_error());
$d1=mysqli_fetch_array($q1);

?>


    <h3>E-Konveksi </h3>
    <h2 style="margin-top:-15px">
      <?php echo $d1['nama_toko'] ?></h2>
      <p  style="margin-top:-20px">
<?php echo $d1['alamat_toko'] ?><br>
Telepon: <?php echo $d1['nohp_toko'] ?></p>


<div style="clear:both;"></div>
<hr>

<h3>Laporan Data Barang</h3>
<table style="width:100%; border-collapse: collapse;" border="1">
  <tr>
    <td>No</td>
    <td>Nama Barang</td>
    <td>Harga</td>
    <td>Stok Saat Ini</td>
    <td>Terjual</td>
  </tr>

  <?php 
  $no=1;
  while($d2=mysqli_fetch_array($q2)){
  $idb = $d2['id_barang'];
  $q3=mysqli_query($conn, "SELECT sum(jumlah_pesanan) as qty from pesanan where id_barang = '$idb' and status_pesanan='Selesai'")or die(mysqli_error());
  $d3=mysqli_fetch_array($q3);
  $terjual = $d3['qty'];
  if ($terjual=='') {
    $terjual = 0;
  }
  else {
    $terjual = $terjual;
  }

   ?>
  <tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $d2['nama_barang'] ?></td>
    <td>Rp. <?php echo number_format($d2['harga_jual']) ?></td>
    <td><?php echo $d2['stok'] ?> Unit</td>
    <td><?php echo $terjual ?> Unit</td>
    
  </tr>
  <?php } ?>
</table>

<script type="text/javascript">
  window.print()
</script>