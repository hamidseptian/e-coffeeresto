<ul class="breadcrumb">
		
		<li class="active"> Keranjang </li>
    </ul>
<?php 
$id_pelanggan = $_SESSION['id_user'];
$q_pel = mysqli_query($conn, "SELECT * from pelanggan where id_pelanggan='$id_pelanggan'");
$d_pel = mysqli_fetch_array($q_pel);
$id_domisili_pel = $d_pel['id_domisili'];
$q_toko=mysqli_query($conn, "SELECT distinct p.id_toko, nama_toko from pesanan p left join toko t on p.id_toko=t.id_toko where p.id_pelanggan='$id_pelanggan' and p.status_pesanan='Masuk ke Keranjang'")or die(mysqli_error());
$j=mysqli_num_rows($q_toko);
if ($j==0) { ?>
	<ul class="breadcrumb">
		
		<li ><b><h4>Keranjang Kosong</h4></b> </li>
    </ul>
<?php }else{
	$total_semuanya = 0;
	while ($d_toko = mysqli_fetch_array($q_toko)) { 
	$id_toko = $d_toko['id_toko'];
	$q_pesanan=mysqli_query($conn, "SELECT * from pesanan p left join produk pr on p.id_produk=pr.id_produk where p.id_pelanggan='$id_pelanggan' and p.id_toko='$id_toko' and p.status_pesanan='Masuk ke Keranjang'")or die(mysqli_error());

 ?>
    <table class="table table-bordered">
		<tbody>
			<tr>
				<th> <?php echo $d_toko['nama_toko'] ?></th>
			</tr>
		 <tr> 
		 <td>
			<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Nama Produk</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Total</th>
                  <td>Option</td>
				</tr>
              </thead>
              <tbody>
              	<?php 
              	$total_satu_toko = 0;
              	while ($d_pesanan = mysqli_fetch_array($q_pesanan)) { 
              		$total = $d_pesanan['jumlah_pesanan'] * $d_pesanan['harga'];
              		$total_satu_toko += $total?>
                <tr>
                  <td> 
                  	<?php if ($d_pesanan['gambar_produk']=='') { ?>
	                  	<img src="../user/admin/form/produk/gambar/default.png" alt="" width="60">
                  	<?php }else{ ?>
	                  	<img src="../user/admin/form/produk/gambar/<?php echo $d_pesanan['gambar'] ?>" alt="" width="60">
                  <?php } ?>
                  </td>
                  <td><?php echo $d_pesanan['nama_produk'] ?></td>
				  
                  <td><?php echo number_format($d_pesanan['jumlah_pesanan']) ?></td>
                  <td><?php echo number_format($d_pesanan['harga']) ?></td>
                  <td><?php echo number_format($total) ?></td>
                  <td>
                  	<a href="form/order/hapus_keranjang.php?id_pesanan=<?php echo $d_pesanan['id_pesanan'] ?>" class="btn btn-info btn-sm" title="Hapus produk"><i class="fa fa-trash"></i></a>
                  	<a href="#edit_produk_<?php echo $d_pesanan['id_pesanan'] ?>" role="button" data-toggle="modal"  class="btn btn-info btn-sm" title="Edit jumlah pesanan"><i class="fa fa-edit"></i></a>
                  </td>
                 
                </tr>
                <div id="edit_produk_<?php echo $d_pesanan['id_pesanan'] ?>" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5>Edit Jumlah Pesanan</h5>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal loginFrm" method="post" action="form/order/simpanedit_keranjang.php">
					  <div class="control-group">								
						<?php echo $d_pesanan['nama_produk'] ?>
					  </div>
					  <div class="control-group">
						<input type="number" name="qty" placeholder="Input jumlah pesanan" value="<?php echo $d_pesanan['jumlah_pesanan'] ?>">
						<input type="hidden" name="id_pesanan" placeholder="Password" value="<?php echo $d_pesanan['id_pesanan'] ?>">
					  </div>
					 
					<button type="submit" class="btn btn-success">Simpan</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					</form>		
				  </div>
			</div>
				<?php } 

				$q_cek_ongkir = mysqli_query($conn, "SELECT * from ongkir where id_toko='$id_toko' and id_domisili='$id_domisili_pel'");
				$d_cek_ongkir = mysqli_fetch_array($q_cek_ongkir);
				$ongkir = $d_cek_ongkir==''? 0 : $d_cek_ongkir['ongkir'];

				$total_belanja = $total_satu_toko + $ongkir;
				$total_semuanya +=$total_belanja;

				?>
                <tr>
                  <td colspan="4" style="text-align:right">Total Harga:	</td>
                  <td colspan="2"><?php echo number_format($total_satu_toko) ?></td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:right">Ongkir :	</td>
                  <td colspan="2"><?php echo number_format($ongkir) ?></td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:right">Total Belanja :	</td>
                  <td colspan="2"><?php echo number_format($total_belanja) ?></td>
                </tr>
				
				</tbody>
            </table>















            
		  </td>
		  </tr>
	</tbody>
</table>
<?php } ?>



<ul class="breadcrumb">
		
		<li ><b><h4>Total Semuanya : <?php echo number_format($total_semuanya) ?></h4></b> </li>
    </ul>
    <br>
    <a href="form/order/konfirmasi_pesanan.php" class="btn btn-info btn-sm" onclick="return confirm('Apakah anda yakin..??')">Konfirmasi Pesanan</a>
<?php } ?>