<?php 
session_start();
include "../../../../assets/koneksi.php";
$id_pelanggan=$_POST['id_pelanggan'];
$waktu=$_POST['waktu'];
$status_sebelumnya=$_POST['status_sebelumnya'];
$status=$_POST['status'];

// $idtoko = $_SESSION['id_admin'];
if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $idtoko = $d_k['id_toko'];
}else{
  $idtoko = $_SESSION['id_admin'];
}

$q = mysqli_query($conn, "UPDATE pesanan set 
  status_pesanan='$status'
  where id_pelanggan='$id_pelanggan' and tanggal_pesan='$waktu' and status_pesanan='$status_sebelumnya' and id_toko='$idtoko'
  ");

?>
<script type="text/javascript">
  alert('Pesanan di <?php echo $status ?>');
  <?php if ($status=='Selesai') { ?>
    window.location.href="../../?m=pesanan";
  <?php }else{ ?>
    window.location.href="../../?m=detail_pesanan&id=<?php echo $id_pelanggan ?>&waktu=<?php echo $waktu ?>&status=<?php echo $status ?>";
  <?php } ?>
</script>