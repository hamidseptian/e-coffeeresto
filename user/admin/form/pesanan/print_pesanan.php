<?php 
session_start();
include "../../../../koneksi.php";
// $idtoko= $_SESSION['id_admin']; 

if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $idtoko = $d_k['id_toko'];
}else{
  $idtoko = $_SESSION['id_admin'];
}
$q1 = mysqli_query($conn, "SELECT * from toko where id_toko='$idtoko'")or die(mysqli_error());
$q2 = mysqli_query($conn, "SELECT * from pesanan 
    join barang on pesanan.id_barang=barang.id_barang
    join pelanggan on pelanggan.id_pelanggan=pesanan.id_pelanggan
    join toko on barang.id_toko=toko.id_toko
    where barang.id_toko='$idtoko' and pesanan.status_pesanan='Order'")or die(mysqli_error());
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

<h3>Laporan Data Pesanan</h3>
<table style="width:100%; border-collapse: collapse;" border="1">
  <tr>
    <td>No</td>
    <td>Tanggal Pesan</td>
    <td>Nama Barang</td>
    <td>Harga</td>
    <td>Banyak Pesanan</td>
    <td>Total</td>
  </tr>

  <?php 
  $no=1;
  $nol=0;
  while($d2=mysqli_fetch_array($q2)){
    $pt = explode('-', $d2['tanggal_pesan']);
    $tglp = $pt[2].'-'.$pt[1].'-'.$pt[0];
    $total = $d2['harga_jual'] * $d2['jumlah_pesanan'];
    $totalpendapatan = $nol +=$total;
   ?>
  <tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $tglp ?></td>
    <td><?php echo $d2['nama_barang'] ?></td>
    <td>Rp. <?php echo number_format($d2['harga_jual']) ?></td>
    <td><?php echo $d2['stok'] ?> Unit</td>
    <td>Rp. <?php echo number_format($total) ?></td>
    
  </tr>
  <?php } ?>
  <tr>
    <td colspan="5">Total Pendapatan</td>
    <td>Rp. <?php echo number_format($totalpendapatan) ?></td>
  </tr>
</table>

<script type="text/javascript">
  window.print()
</script>