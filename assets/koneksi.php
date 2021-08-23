<?php 
  // $conn = mysqli_connect('sql211.epizy.com','epiz_29292143','tOwiQNmIaV','epiz_29292143_cofee_resto');
  $conn = mysqli_connect('localhost','root','','ecommerse_cofeeresto');
  date_default_timezone_set('Asia/Jakarta');
  error_reporting(0);
  $namabulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );


  $status_toko = array('Pendaftaran','Mitra','Suspend','Putus Mitra','Ditolak')
 ?>