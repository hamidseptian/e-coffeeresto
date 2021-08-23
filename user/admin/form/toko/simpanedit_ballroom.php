<?php 
include "../../../../koneksi.php";
$id=$_POST['id'];
$nama=$_POST['nama'];
$kapasitas=$_POST['kapasitas'];
$gambarlama=$_POST['gambarlama'];
$harga=$_POST['harga'];
//untuk upload file
if ($_FILES['file']['tmp_name']!='') {
	# code...
$ekstensi_diperbolehkan	= array('pdf');
$lokasifile=$_FILES['file']['tmp_name'];
$file=$_FILES['file']['name'];
$x = explode('.', $file);
$ekstensi = strtolower(end($x));
$ukuran=$_FILES['file']['size'];
$namafile=date('Ymdhis').$file;
$folder="gambar/".$namafile;
$tgls=date('Y-m-d');
unlink("gambar/".$gambarlama);
$upload=move_uploaded_file($lokasifile, $folder);
$q1=mysqli_query($conn, "UPDATE ballroom set 
		nama_ballroom='$nama',
		kapasitas_ballroom='$kapasitas',
		harga_sewa='$harga',
		gambar='$namafile'
		where id_ballroom='$id';
		
		")or die(mysqli_error()); 
}
else{
	$q1=mysqli_query($conn, "UPDATE ballroom set 
		nama_ballroom='$nama',
		kapasitas_ballroom='$kapasitas',
		harga_sewa='$harga'
		where id_ballroom='$id';
		
		")or die(mysqli_error()); 

}

	
?>

	<script type="text/javascript">
		alert('Data ballroom berhasil disimpan');
		window.location.href="../../?a=ballroom"

	</script>
