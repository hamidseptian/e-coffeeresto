<?php 
if (isset($_POST['keyword'])) {
	$keyword = $_POST['keyword'];
 	$q=mysqli_query($conn, "SELECT * from produk b left join toko t on b.id_toko=t.id_toko where b.nama_produk like '%$keyword%'")or die(mysqli_error());
 	$caption_cari= ': '.$keyword;
 }else{
 	$q=mysqli_query($conn, "SELECT * from produk b left join toko t on b.id_toko=t.id_toko")or die(mysqli_error());
 	$caption_cari= '';
 } ?>


<div class="tab-content">
	

	<div class="tab-pane  active" id="blockView">
		<h4>Produk
		<?php echo $caption_cari ?> </h4>
		<ul class="thumbnails">
			<?php 	
			while ($d=mysqli_fetch_array($q)) {
				if ($d['gambar_produk']=='') {
					$gambar='default.png';
					# code...
				}else{
					$gambar=$d['gambar_produk'];
				}
			 ?>
			<li class="span3">
			  <div class="thumbnail" >
				<a href="product_details.html"><img src="../user/admin/form/produk/gambar/<?php echo $gambar ?>" style="height: 100px; margin-top:10px"></a>
				<div class="caption">
				  <h5><?php echo $d['nama_produk'] ?></h5>
				  <p> 
					<?php echo $d['nama_toko'] ?>
				  </p>
				  <h4 style="text-align:center"><a class="btn" href="?h=detail_produk&id=<?php echo $d['id_produk'] ?>" title="Lihat detail Produk" data-toggle="tooltip"> <i class="icon-zoom-in"></i></a> <a class="btn btn-primary" href="#" >Rp. <?php echo number_format($d['harga']) ?></a></h4>
				</div>
			  </div>
			</li>
		<?php 	} ?>
			
		  </ul>


	<hr class="soft">
	</div>
</div>