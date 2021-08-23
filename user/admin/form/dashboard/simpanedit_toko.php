<?php 
session_start() ;
$id=$_SESSION['id_admin'];
include "../../../../assets/koneksi.php";
$nama =$_POST['nama'];
$pemilik =$_POST['pemilik'];
$alm =$_POST['alm'];
$hp =$_POST['hp'];
$jenis =$_POST['jenis'];
$ket =$_POST['ket'];
$domisili =$_POST['domisili'];
$iframe =$_POST['iframe'];
// $pass =$_POST['password'];



$q1 = mysqli_query($conn, "UPDATE toko set
                jenis_toko = '$jenis',
                nama_toko = '$nama',
                pemilik_toko='$pemilik',
                keterangan_toko='$ket',
                alamat_toko='$alm',
                id_domisili='$domisili',
                nohp_toko='$hp',
                iframe='$iframe'
                where id_toko='$id'
    ")or die(mysqli_error());
 ?>

 <script type="text/javascript">
     alert('Data toko anda berhasil diperbaharui');
     window.location.href="../../"
 </script>