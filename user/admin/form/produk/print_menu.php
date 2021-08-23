<?php
session_start();
include "../../../../assets/koneksi.php";
require_once("../../../../assets/dompdf/src/Autoloader.php");
Dompdf\Autoloader::register();
use Dompdf\Dompdf;

// $id_toko = $_SESSION['id_admin'];
if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $id_toko = $d_k['id_toko'];
}else{
  $id_toko = $_SESSION['id_admin'];
}
$q_toko = mysqli_query($conn, "SELECT * from toko where id_toko='$id_toko'");
$d_toko = mysqli_fetch_array($q_toko);
$html = '

<div style="width: 100px;float: left; margin-right:10px">
  <img src="../../../../assets/logo.png" style="width: 100px;">
</div>

<div style="width: 700px; float:left;margin-top:-20px">
 
    <h4>
     '.$d_toko['nama_toko'].'
    </h4>
      <p style="font-size:12px; margin-top:-15px">
Alamat : '.$d_toko['alamat_toko'].'<br>No HP : '.$d_toko['nohp_toko'].'</p>


</div>

<div style="clear:both;"></div>
<hr>
<br>
<center>
<p style="margin-top:-5px; font-size:15px">
Daftar Menu
</center
</p>



<table style=" font-size:11px;border-collapse: collapse; width: 100%;" border=1>
   <thead>
      <tr>
        <td>No</td>
        <td>Nama produk</td>
        <td>Harga</td>
      </tr>
    </thead>
               
';
$no1 = 1;
 
   $q1=mysqli_query($conn, "SELECT * from produk where id_toko='$id_toko'
    ");
  $no=1;
   $kumpulkan_data = [];
      $totalharga = 0;
  while ($d1=mysqli_fetch_array($q1)) { 
    $html .='<tr>
    <td>'.$no++.'</td>
    <td>'.$d1['nama_produk'].'</td>
    <td>Rp. '.number_format($d1['harga']).'</td>
  </tr>';
    }
 
$html .= '
</table>';

$dompdf = new Dompdf();
// $customPaper = array(0,0,200,360);
// $dompdf->set_paper($customPaper);
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('Daftar Menu.pdf', ['Attachment'=>0]);

?>
<p style="font-size: "></p>

