<style type="text/css">
	a{
		color:blue;
	}
</style>

<?php 
$id = $_SESSION['id_user'];
$q=mysqli_query($conn, "SELECT distinct p.tanggal_pesan from pesanan p 
	
	where p.id_pelanggan='$id'")or die(mysqli_error());
$j=mysqli_num_rows($q);
 	?>


<div class="tab-content">
	
<?php if ($j>0) { ?>
	<div class="tab-pane  active" id="blockView">
		<h4>Pesanan</h4>
		<table class="table table-bordered">
			<tr>
				<td>No</td>
				<td>Waktu Pesanan</td>
				<td>Detail Pesanan</td>
			
			</tr>
			<?php 
			$no=1; 
			while ($d=mysqli_fetch_array($q)) { 
				$tgl_pesan = $d['tanggal_pesan'];
				
				?>
				<tr>
					<td style="width:20px"><?php echo $no++ ?></td>
					<td style="width:100px">
						<?php echo $d['tanggal_pesan'] ?> <br>
						<a href="?h=detail_semua_pesanan&waktu=<?php echo $tgl_pesan ?>">Lihat Semua Pesanan</a>
						
					</td>
					
					
					<td>
						<table class="table table-bordered">
							<tr>
								<td>Toko</td>
								<td>Banyak Produk</td>
								<td>Status Pesanan</td>
								<td>Option</td>
							</tr>
						<?php 
						$q2=mysqli_query($conn, "SELECT distinct p.id_toko, t.nama_toko, plg.id_domisili, p.status_pesanan from pesanan p 
						left join toko t on p.id_toko=t.id_toko
						left join pelanggan plg on p.id_pelanggan=plg.id_pelanggan
						where p.id_pelanggan='$id' and p.tanggal_pesan='$tgl_pesan'")or die(mysqli_error());
						while ($d2=mysqli_fetch_array($q2)) {
							$id_toko = $d2['id_toko'];
							$q_jproduk = mysqli_query($conn, "SELECT sum(jumlah_pesanan) as qty from pesanan where id_toko='$id_toko' and tanggal_pesan='$tgl_pesan' and id_pelanggan='$id'");
							$d_jproduk = mysqli_fetch_array($q_jproduk); ?>
							<tr>
								<td><?php echo $d2['nama_toko'] ?></td>
								<td><?php echo $d_jproduk['qty'] ?></td>
								<td><?php echo $d2['status_pesanan'] ?></td>
								<td>
									<a href="?h=detail_pesanan&id_toko=<?php echo $id_toko ?>&waktu_pesan=<?php echo $tgl_pesan ?>&id_pelanggan=<?php echo $id ?>&id_domisili=<?php echo $d2['id_domisili'] ?>&nama_toko=<?php echo $d2['nama_toko'] ?>&status=<?php echo $d2['status_pesanan'] ?>">Detail Pesanan</a>
								</td>
							</tr>
						<?php } ?>
						</table>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
<?php }else{ ?>
	<ul class="breadcrumb">
		
		<li ><b><h4>Tidak ada data pesanan</h4></b> </li>
    </ul>
<?php } ?>
</div>