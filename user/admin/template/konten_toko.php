<?php 
@$menu= $_GET['m'];
if ($menu=='') {
	if ($_SESSION['level']=='Toko') {
	
		 include "form/dashboard/dashboard.php";
	}else{
		 include "form/dashboard/dashboard_karyawan.php";
	}
}
elseif ($menu=='produk') {
	include "form/produk/data_produk.php";
}
elseif ($menu=='banner') {
	include "form/banner/data_banner.php";
}
elseif ($menu=='karyawan') {
	include "form/karyawan/data_karyawan.php";
}
elseif ($menu=='edit_karyawan') {
	include "form/karyawan/edit_karyawan.php";
}
elseif ($menu=='pesanan') {
	include "form/pesanan/data_pesanan.php";
}
elseif ($menu=='pesanan_selesai') {
	include "form/pesanan/pesanan_selesai.php";
}
elseif ($menu=='detail_pesanan') {
	include "form/pesanan/detail_pesanan.php";
}
elseif ($menu=='detail_pesanan_acc') {
	include "form/pesanan/detail_pesanan_acc.php";
}
elseif ($menu=='edit_toko') {
	include "form/dashboard/edit_toko.php";
}
elseif ($menu=='edit_produk') {
	include "form/produk/edit_produk.php";
}
elseif ($menu=='checkout_pesanan') {
	include "form/pesanan/checkout.php";
}
elseif ($menu=='info_pembayaran') {
	include "form/pesanan/info_pembayaran.php";
}
elseif ($menu=='ongkir') {
	include "form/ongkir/data_ongkir.php";
}
elseif ($menu=='rekening') {
	include "form/rekening/data_rekening.php";
}
elseif ($menu=='edit_rekening') {
	include "form/rekening/edit_rekening.php";
}
elseif ($menu=='addongkir') {
	include "form/ongkir/add_ongkir.php";
}
elseif ($menu=='editongkir') {
	include "form/ongkir/edit_ongkir.php";
}
elseif ($menu=='penjualan') {
	include "form/penjualan/data_penjualan.php";
}
elseif ($menu=='penjualan_produk_terbanyak') {
	include "form/penjualan/penjualan_produk_terbanyak.php";
}
elseif ($menu=='detail_transaksi') {
	include "form/transaksi/detail_transaksi.php";
}
elseif ($menu=='pesanan_otw') {
	include "form/pesanan/pesanan_diantarkan.php";
}
elseif ($menu=='catatan') {
	include "form/catatan.php";
}
else{
	echo "Fitur ini belum tersedia";
}

//
?>

