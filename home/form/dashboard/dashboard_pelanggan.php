<?php 	
		$id=$_SESSION['id_user'];
		$q=mysqli_query($conn, "SELECT * from pelanggan p left join kecamatan k on p.id_domisili=k.id_kecamatan where p.id_pelanggan='$id'")or die(mysqli_error());
		$d=mysqli_fetch_array($q);
			
 ?>
	<div class="alert alert-info">Selamat Datang di halaman user <?php echo $d['nama_pelanggan'] ?></div>

<div class="row">	  
			<div id="gallery" class="span3">
				<img  src="../assets/user.jpg" style="width:100%" alt="<?php echo $d['nama_pelanggan'] ?>">
			</div>
			<div class="span6">
				<h3><?php echo $d['nama_pelanggan'] ?></h3>
			
				Alamat : <?php echo $d['alamat_pelanggan'] ?> <br>	
				Domisili : <?php echo $d['nama_kecamatan'] ?> <br>	
				No HP : <?php echo $d['nohp_pelanggan'] ?>
				
			</div>
			
			

	</div>
			<hr class="soft">


<div class="row">	  
			<div class="span3">

				<div class="well well-small"><a id="myCart" href="?h=keranjang"><center>Lihat Keranjang</center></a></div>
				
			</div>
		
			<div class="span3">

				<div class="well well-small"><a id="myCart" href="?h=riwayat_pesanan"><center>Riwayat Pemesanan</center> </a></div>
				
			</div>
			<div class="span3">

				<div class="well well-small"><a id="myCart" href="?h=edit_akun"><center>Edit Akun</center> </a></div>
				
			</div>
		
			<div class="span3">

				
				
			</div>
		

	</div>













