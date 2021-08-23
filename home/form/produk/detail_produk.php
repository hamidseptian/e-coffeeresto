<?php 	
		$id=$_GET['id'];

if (isset($_GET['id_toko'])) {
	$metode = 'pertoko';
}else{
	$metode = 'gabungan';

}
		$q=mysqli_query($conn, "SELECT * from produk b left join toko t on b.id_toko=t.id_toko where b.id_produk='$id'")or die(mysqli_error());
		$d=mysqli_fetch_array($q);
			if ($d['gambar_produk']=='') {
					$gambar='default.png';
					# code...
				}else{
					$gambar=$d['gambar_produk'];
				}
 ?>

<div class="row">	  
			<div id="gallery" class="span3">
            <a href="themes/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera">
				<img  src="../user/admin/form/produk/gambar/<?php echo $gambar ?>" style="width:100%" alt="<?php echo $d['nama_produk'] ?>">
            </a>
			</div>
			<div class="span6">
				<h3><?php echo $d['nama_produk'] ?></h3>
				<small>Dari <?php echo $d['jenis_toko'] ?> : <?php echo $d['nama_toko'] ?></small>
				<hr class="soft">
				<form class="form-horizontal qtyFrm" action="form/order/masuk_keranjang.php" method="post">
				  <div class="control-group">
					<label class="control-label"><span>Rp. <?php echo number_format($d['harga']) ?></span></label>
					<div class="controls">
					<input type="hidden" class="span1" placeholder="Qty." name="id_toko" value="<?php echo $d['id_toko'] ?>">
					<input type="hidden" class="span1" placeholder="Qty." name="metode" value="<?php echo $metode ?>">
					<input type="hidden" class="span1" placeholder="Qty." name="id_produk" value="<?php echo $d['id_produk'] ?>">
					<input type="number" class="span1" placeholder="Qty." name="qty" required>
					<?php if (isset($_SESSION['login'])==true &&isset($_SESSION['level'])=='Pelanggan') {  ?>
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Tambah ke keranjang <i class=" icon-shopping-cart"></i></button>
					<?php }else{
						echo "<br>Silahkan login dulu agar bisa memesan produk";
					} ?>
					</div>
				  </div>
				</form>
				
	
			<hr class="soft">
			</div>
			
			

	</div>