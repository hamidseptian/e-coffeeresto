<?php 
if (isset($_POST['keyword'])) {
	$keyword = $_POST['keyword'];
 	$q=mysqli_query($conn, "SELECT t.*,  (SELECT sum(jumlah_pesanan) from pesanan where id_toko=t.id_toko ) as penjualan from  toko t  where t.nama_toko like '%$keyword%' and t.status='1' order by penjualan desc")or die(mysqli_error());
 	$caption_cari= ': '.$keyword;
 }else{
 	$q=mysqli_query($conn, "SELECT t.*,  (SELECT sum(jumlah_pesanan) from pesanan where id_toko=t.id_toko ) as penjualan from  toko t where t.status='1' order by penjualan desc")or die(mysqli_error());
 	$caption_cari= '';
 } ?>


<div class="tab-content">
	

	<div class="tab-pane  active" id="blockView">
		<h4>Daftar Toko
		<?php echo $caption_cari ?> </h4>
		<table class="table">
			<tr>
				<td>No</td>
				<td>Kategori</td>
				<td>Nama Toko</td>
				<td>Alamat</td>
				<td>No HP</td>
			</tr>
			<?php 
			$no=1; 
			while ($d=mysqli_fetch_array($q)) { ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $d['jenis_toko'] ?></td>
					<td><a href="?h=detail_toko&id=<?php echo $d['id_toko'] ?>" style="color:blue"><?php echo $d['nama_toko'] ?></a></td>
					<td><?php echo $d['alamat_toko'] ?></td>
					<td><?php echo $d['nohp_toko'] ?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>