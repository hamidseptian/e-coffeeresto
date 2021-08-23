<?php 
session_start();
include "../../../../koneksi.php";
// $idtoko = $_SESSION['id_admin'];

if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $idtoko = $d_k['id_toko'];
}else{
  $idtoko = $_SESSION['id_admin'];
}


$id = $_POST['id'];
$total = $_POST['total'];
$tglp = $_POST['tglp'];
$jml = $_POST['jml'];
$jml = str_replace('.','', $jml);
$tgls=date('Y-m-d');
$kembalian = $jml - $total;
if ($total > $jml) {?>
  <script type="text/javascript">
    alert('Pembayaran gagal diproses\njumlah pembayaran kurang dari jumlah belanja');
    window.location.href="../../../?m=checkout_pesanan&id=<?php echo $id ?>"

  </script>
<?php }
else{
  $q1=mysqli_query($conn, "INSERT INTO pembayaran set 
                  id_pelanggan='$id',
                  tanggal_pesan='$tglp',
                  tanggal_bayar='$tgls',
                  jumlah_pembayaran='$jml',
                  kembalian='$kembalian',
                  pembayaran_via='Tunai'

                  ")or die(mysqli_error());

  $q2 = mysqli_query($conn, "UPDATE pesanan set status_pesanan ='Selesai' where id_pelanggan='$id' and tanggal_pesan='$tglp' and id_toko='$idtoko'");

 ?>
 <script type="text/javascript">
   alert('Data pembayaran berhasil disimpan');
   window.location.href="../../../?m=info_pembayaran&id=<?php echo $id ?>"
 </script>
 <?php } ?>