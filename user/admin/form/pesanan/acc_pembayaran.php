<?php 
session_start();
include "../../../../koneksi.php";
$idtoko = $_SESSION['id_admin'];
$id = $_POST['id'];

$tglp = $_POST['tglp'];
$tgls=date('Y-m-d');

  $q1=mysqli_query($conn, "UPDATE pembayaran set 
                  status_pembayaran='ACC'
                  where id_pelanggan='$id' and tanggal_pesan='$tglp' and id_toko='$idtoko'

                  ")or die(mysqli_error());

  $q2 = mysqli_query($conn, "UPDATE pesanan set status_pesanan ='Diantarkan' where id_pelanggan='$id' and tanggal_pesan='$tglp' and id_toko='$idtoko'");

 ?>
 <script type="text/javascript">
   alert('Data pembayaran berhasil disimpan');
   window.location.href="../../../?m=info_pembayaran&id=<?php echo $id ?>"
 </script>
