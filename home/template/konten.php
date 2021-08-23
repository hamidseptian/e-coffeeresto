<?php 
$menu = $_GET['h'];

if ($menu=='daftar_toko'){ 
	include "form/register/daftar_toko.php";
}
elseif ($menu=='daftar_pelanggan'){ 
	include "form/register/daftar_pelanggan.php";
}
elseif ($menu=='edit_akun'){ 
	include "form/register/edit_pelanggan.php";
}
elseif ($menu=='login_toko'){ 
	include "form/login/login_toko.php";
}
elseif ($menu=='login_karyawan'){ 
	include "form/login/login_karyawan.php";
}
elseif ($menu=='login_admin'){ 
	include "form/login/login_admin.php";
}
elseif ($menu=='login_pelanggan'){ 
	include "form/login/login_pelanggan.php";
}
elseif ($menu=='detail_produk'){ 
	include "form/produk/detail_produk.php";
}
elseif ($menu=='produk'){ 
	include "form/produk/data_produk.php";
}
elseif ($menu=='keranjang'){ 
	include "form/order/keranjang.php";
}
elseif ($menu=='detail_semua_pesanan'){ 
	include "form/order/detail_semua_pesanan.php";
}
elseif ($menu=='detail_toko'){ 
	include "form/toko/detail_toko.php";
}
elseif ($menu=='data_toko'){ 
	include "form/toko/data_toko.php";
}
elseif ($menu=='riwayat_pesanan'){ 
	include "form/order/riwayat_pesanan.php";
}
elseif ($menu=='detail_pesanan'){ 
	include "form/order/detail_pesanan.php";
}
else 
{
	echo "Fitur belum tersedia";
}

 ?>