<?php 	
		$id=$_GET['id'];
		$q=mysqli_query($conn, "SELECT * from toko  where id_toko='$id'")or die(mysqli_error());
		$d=mysqli_fetch_array($q);
		$iframe = $d['iframe'];
	include "form/toko/carousel.php";		
 ?>

<div class="row">	  
			<div id="gallery" class="span3">
            <a href="themes/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera">
				<img  src="../home/gambar/cafe.webp" style="width:100%" alt="<?php echo $d['nama_toko'] ?>">
            </a>
			</div>
			<div class="span6">
				<h3><?php echo $d['nama_toko'] ?></h3>
				<small><?php echo $d['jenis_toko'] ?> </small> <br>	
				Alamat : <?php echo $d['alamat_toko'] ?> <br>	
				No HP : <?php echo $d['nohp_toko'] ?>
				<hr class="soft">
				<?php echo $d['keterangan_toko'] ?>
			</div>
			
			

	</div>
			<hr class="soft">
















<?php 	
	$q=mysqli_query($conn, "SELECT * from produk b left join toko t on b.id_toko=t.id_toko where b.id_toko='$id'")or die(mysqli_error());
	$j=mysqli_num_rows($q);
?>



<h5>Produk <?php echo $d['nama_toko'] ?></h5>
			<div class="tab-content">
	<?php if ($j==0) { ?>
				<div class="alert alert-info">Belum ada data produk</div>
			<?php }else{ ?>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
		<?php 
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
				<a href="#"><img src="../user/admin/form/produk/gambar/<?php echo $gambar ?>" alt=""></a>
				<div class="caption">
				  <h5><?php echo $d['nama_produk'] ?></h5>
				 
				  <h4 style="text-align:center"><a class="btn" href="?h=detail_produk&id=<?php echo $d['id_produk'] ?>&id_toko=<?php echo $d['id_toko'] ?>" title="Lihat detail Produk" data-toggle="tooltip"> <i class="icon-zoom-in"></i></a> <a class="btn btn-primary" href="#" >Rp. <?php echo number_format($d['harga']) ?></a></h4>
				</div>
			  </div>
			</li>
		<?php 	} 
		 ?>
			
		  </ul>


	<hr class="soft">
	</div>
<?php } ?>
</div>

<hr class="soft">
<h4>Lokasi Toko</h4>
<?php echo $iframe ?>

<script type="text/javascript">
	$('iframe').attr('width','100%');
	$('iframe').attr('height','300');
</script>