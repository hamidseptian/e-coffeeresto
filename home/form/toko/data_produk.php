<div class="tab-content">
	

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
			<?php 	$q=mysqli_query($conn, "SELECT * from produk b left join toko t on b.id_toko=t.id_toko")or die(mysqli_error());
			$j=mysqli_num_rows($q);
			if ($j==0) { ?>
				<div class="alert alert-info">Belum ada data produk</div>
			<?php }else{
			while ($d=mysqli_fetch_array($q)) {
				if ($d['gambar_produk']=='') {
					$gambar='default.png';
					# code...
				}else{
					$gambar=$d['gambar'];
				}
			 ?>
			<li class="span3">
			  <div class="thumbnail">
				<a href="product_details.html"><img src="../user/admin/form/produk/gambar/<?php echo $gambar ?>" alt=""></a>
				<div class="caption">
				  <h5><?php echo $d['nama_produk'] ?></h5>
				  <p> 
					<?php echo $d['nama_toko'] ?>
				  </p>
				  <h4 style="text-align:center"><a class="btn" href="?h=detail_produk&id=<?php echo $d['id_produk'] ?>" title="Lihat detail Produk" data-toggle="tooltip"> <i class="icon-zoom-in"></i></a> <a class="btn btn-primary" href="#" >Rp. <?php echo number_format($d['harga']) ?></a></h4>
				</div>
			  </div>
			</li>
		<?php 	} 
			} ?>
			
		  </ul>


	<hr class="soft">
	</div>
</div>aaaaaaaaa