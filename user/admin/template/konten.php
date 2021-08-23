<?php 
$menu= $_GET['a'];
if ($menu=='') {
	// echo "Selamat datand si halaman administrator";
	include "form/dashboard/dashboard_admin.php";
}
elseif ($menu=='toko') {
	
	include "form/toko/data_toko.php";
}
elseif ($menu=='pelanggan') {
	include "form/pelanggan/data_pelanggan.php";
}
elseif ($menu=='wilayah') {
	include "form/wilayah/data_wilayah.php";
}
elseif ($menu=='edit_admin') {
	include "form/admin/edit_admin.php";
}
else{
	echo "Fitur ini belum tersedia";
}

//
?>

