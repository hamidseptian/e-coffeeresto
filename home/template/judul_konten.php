<?php 
	//error_reporting(0)	;
$menu = $_GET['h'];

if ($menu=='daftar_penduduk'){ 
	echo "Pendaftaran Penduduk";
}
elseif ($menu=='daftar_mitra'){ 
	echo "Pendaftaran Mitra Toko";
}
elseif ($menu=='profile'){ 
	echo "Profile";
}
elseif ($menu=='berita'){ 
	echo "Berita";
}
elseif ($menu=='visi_misi'){ 
	echo "Visi Misi";
}
elseif ($menu=='baca_berita'){ 
	echo "Baca Berita";
}
elseif ($menu=='pengumuman'){ 
	echo "Pengumuman";
}
elseif ($menu=='produk'){ 
	echo "Produk Nagari";
}
elseif ($menu=='login'){ 
	echo "Silahkan masukan username dan password untuk login";
}
else 
{
	echo "Fitur belum tersedia";
}

 ?>