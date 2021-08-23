<?php 

include "../assets/koneksi.php";
 ?>	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>NAGARI GALUGUA</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="../assets/desain/css/linearicons.css">
			<link rel="stylesheet" href="../assets/desain/css/font-awesome.min.css">
			<link rel="stylesheet" href="../assets/desain/css/bootstrap.css">
			<link rel="stylesheet" href="../assets/desain/css/magnific-popup.css">
			<link rel="stylesheet" href="../assets/desain/css/nice-select.css">							
			<link rel="stylesheet" href="../assets/desain/css/animate.min.css">
			<link rel="stylesheet" href="../assets/desain/css/jquery-ui.css">			
			<link rel="stylesheet" href="../assets/desain/css/owl.carousel.css">
			<link rel="stylesheet" href="../assets/desain/css/main.css">
			<script type="text/javascript" src="../assets/desain/js/jquery.js"></script>


 <script type="text/javascript" src="../assets/adminlte/js/jquery.js"></script>
		</head>
		<body>	
			  <header id="header" id="home">
		  		<div class="header-top">
		  			<div class="container">
				  		<div class="row align-items-center">
				  			<div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
				  				Sistem Informasi Nagari Galugua Berbasis Web 
				        		<!-- <a href="index.html"><img src="../assets/desain/img/logo.png" alt="" title="" / style="width:100%"></a>			 -->
				  			</div>
				  			<div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
								<!-- <a class="btns" href="tel:+953 012 3654 896">+953 012 3654 896</a>
				  				<a class="btns" href="mailto:support@colorlib.com">support@colorlib.com</a> -->	
				  						
				  				<a href="../login" class="btns" >Login</a>		
				  				<a class="icons" href="tel:+953 012 3654 896">
				  					<span class="lnr lnr-phone-handset"></span>
				  				</a>
				  				<a class="icons" href="mailto:support@colorlib.com">
				  					<span class="lnr lnr-envelope"></span>
				  				</a>
				  				<a class="icons" href="../login/dokter">
				  					<span class="lnr lnr-user"></span>
				  				</a>		
				  			</div>
				  		</div>			  					
		  			</div>
				</div>
			    <div class="container main-menu">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home (ok)</a></li>
				          <li class=""><a href="?h=profile">Profile (OK)</a></li>
				          <li class=""><a href="?h=berita">Berita (ok)</a></li>
				          <!-- <li class=""><a href="?h=pengumuman">Pengumuman</a></li> -->
				          <li class=""><a href="?h=produk">Produk Nagari (ok)</a></li>
				         <!--  <li class="menu-active"><a href="index.html">About</a></li>
				          <li class="menu-active"><a href="index.html">Layanan</a></li> -->
				          <li class="menu-has-children"><a href="">Pendaftaran</a>
				            <ul>
				              <li><a href="?h=daftar_penduduk">Penduduk (OK)</a></li>
				              <li><a href="?h=daftar_mitra">Mitra (OK)</a></li>
					          <!-- <li class="menu-has-children"><a href="">Level 2</a>
					            <ul>
					              <li><a href="#">Item One</a></li>
					              <li><a href="#">Item Two</a></li>
					            </ul>
					          </li> -->					              
				            </ul>
				          </li>	
				                	          
				          
				          <!-- <li><a href="contact.html">Pendaftaran Pasien</a></li> -->
				        </ul>
				      </nav><!-- #nav-menu-container -->
			        		
			    	</div>
			    </div>
			  </header><!-- #header -->

			<!-- start banner Area -->
			<?php if (!isset($_GET['h'])) { ?>
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex justify-content-center align-items-center">
						<div class="banner-content col-lg-9 col-md-12 justify-content-center">
							<h6 class="text-uppercase">Selamat datang di website </h6>
							<h1>
								NAGARI GALUGUA
							</h1>
							<p class="text-white mx-auto">
								<!-- ALAMAT KANTOR -->

							</p>
							<!-- <a href="#" class="primary-btn header-btn text-uppercase mt-10">Get Started</a> -->
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<?php } 
			else { ?>
				<section class="banner-area relative about-banner" id="home" style="background: url('gambar/banner.jpg');  background-repeat: no-repeat; background-size: 100%;">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								<?php include "template/judul_konten.php"; ?>
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="opening-hour.html"> Opening Hour</a></p> -->
						</div>	
					</div>
				</div>
			</section>

			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						
						<?php include "template/konten.php"; ?>
						
					</div>
				</div>	
			</section>

		<?php } ?>
			<!-- End open-hour Area -->
			
			
			<!-- Start feature Area -->
		
			<!-- End feature Area -->

			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<!-- <div class="col-lg-2  col-md-6">
							<div class="single-footer-widget">
								<h6>Top Products</h6>
								<ul class="footer-nav">
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing Service</a></li>
								</ul>
							</div>
						</div> -->
						<div class="col-lg-12  col-md-6">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Hubungi Kami</h6>
								<p>
									Alamat
								</p>
								<h3>No HP</h3>
							</div>
							<br>
						</div>		

						<div class="col-lg-12  col-md-12">
							<div class="single-footer-widget newsletter">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15957.384714423737!2d100.38348995!3d-0.88145785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c36ee611ff5c364!2sKampus%20Proklamator%20II%20Universitas%20Bung%20Hatta!5e0!3m2!1sid!2sid!4v1618644057312!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							</div>
						</div>					
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
</p>
						<!-- <div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div> -->
					</div>
				</div>
			</footer>
			<!-- End footer Area -->

			<script src="../assets/desain/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="../assets/desain/js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="../assets/desain/js/easing.min.js"></script>			
			<script src="../assets/desain/js/hoverIntent.js"></script>
			<script src="../assets/desain/js/superfish.min.js"></script>	
			<script src="../assets/desain/js/jquery.ajaxchimp.min.js"></script>
			<script src="../assets/desain/js/jquery.magnific-popup.min.js"></script>	
 			<script src="../assets/desain/js/jquery-ui.js"></script>			
			<script src="../assets/desain/js/owl.carousel.min.js"></script>						
			<script src="../assets/desain/js/jquery.nice-select.min.js"></script>							
			<script src="../assets/desain/js/mail-script.js"></script>	
			<script src="../assets/desain/js/main.js"></script>	





		</body>
	</html>