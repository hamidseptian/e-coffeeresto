<?php 
session_start();
include "../assets/koneksi.php";


@$id=$_SESSION['id_user'];
    $q=mysqli_query($conn, "SELECT * from pelanggan  where id_pelanggan='$id'")or die(mysqli_error());
    $d=mysqli_fetch_array($q);
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>E-Commerse Restoran & Cofee Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
  <link rel="stylesheet/less" type="text/css" href="../assets/bootstrap_shop/themes/less/simplex.less">
  <link rel="stylesheet/less" type="text/css" href="../assets/bootstrap_shop/themes/less/classified.less">
  <link rel="stylesheet/less" type="text/css" href="../assets/bootstrap_shop/themes/less/amelia.less">  MOVE DOWN TO activate
  -->
  <!--<link rel="stylesheet/less" type="text/css" href="../assets/bootstrap_shop/themes/less/bootshop.less">
  <script src="../assets/bootstrap_shop/themes/js/less.js" type="text/javascript"></script> -->
  
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="../assets/bootstrap_shop/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="../assets/bootstrap_shop/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive --> 
  <link href="../assets/bootstrap_shop/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
  <link href="../assets/bootstrap_shop/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="../assets/adminlte/js/jquery.js"></script>
<!-- Google-code-prettify --> 
  <link href="../assets/bootstrap_shop/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="../assets/bootstrap_shop/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/bootstrap_shop/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/bootstrap_shop/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/bootstrap_shop/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/bootstrap_shop/themes/images/ico/apple-touch-icon-57-precomposed.png">
  <style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.html"><img src="../assets/logo.png" alt="Bootsshop" width="200px" /></a>
    <form class="form-inline navbar-search" method="post" action="?h=produk" >
    <input class="srchTxt" type="text" name="keyword" placeholder="Cari Produk" />
    
      <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
  <!--  <li class=""><a href="?h=daftar_akun">Buat Akun Pelanggan</a></li>
   <li class=""><a href="?h=daftar_toko">Daftarkan Toko</a></li> -->
   <?php if (isset($_SESSION['login'])==true) { ?>
   <a href="../user/logout.php"  style="padding-right:0"><span class="btn btn-large btn-success">Logout</span></a>
   <?php }else{ ?>
   <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
  <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3>Anda akan login sebagai.?</h3>
      </div>
      <div class="modal-body">
      
      <center>
        <a href="?h=login_pelanggan" class="btn btn-success btn-xs">Pelanggan</a>
      <a href="?h=login_toko" class="btn btn-success btn-xs">Pemilik Toko</a>
      <a href="?h=login_karyawan" class="btn btn-success btn-xs">Karyawan Toko</a>
      <a href="?h=login_admin" class="btn btn-success btn-xs">Admin</a>
      </center>
      </div>
  </div>
<?php } ?>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<?php   
    // include "form/home/carousel.php";
 ?>
<div id="mainBody">
  <div class="container">
  <div class="row">
<!-- Sidebar ================================================== -->
  <div id="sidebar" class="span3">
    
    
    <?php 
     if (isset($_SESSION['login'])==true &&isset($_SESSION['level'])=='Pelanggan') { ?>
      <div class="well well-small"><a id="myCart" href="#"><img  src="../assets/user.jpg" tyle="width:100%" alt="cart"><center><?php echo $d['nama_pelanggan'] ?></center></a></div>


    <ul id="sideManu" class="nav nav-tabs nav-stacked">
     
      <li><a href="index.php">Dashboard</a></li>
      <li><a href="?h=keranjang" >Keranjang</a></li>
      <li><a href="?h=riwayat_pesanan" >Riwayat Pemesanan</a></li>
      <li><a href="?h=edit_akun" >Edit Akun</a></li>
    </ul>
    <br>
  <?php } ?>
    <div class="well well-small">
      <form class="form-inline navbar-search" method="post" action="?h=data_toko" >
        <div class="input-group">
          <center>  
          </center>
            <input class="form-control" type="text" name="keyword" placeholder="Cari Toko" />
            <button type="submit" id="submitButton" class="btn btn-primary btn-block" style="margin-top:5px">Go</button>
        </div>
      </form>
    <div class="clearfix"></div>
    </div>
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
     
      <li><a href="?h=produk">Produk</a></li>
    </ul>

    <br>
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
      
      <li class="subMenu"><a> Daftar Restoran </a>
      <ul style="display:none">
        <?php   
            $q_resto = mysqli_query($conn, "SELECT * from toko where jenis_toko='Restoran' and status='1'");
            while ($d_resto=mysqli_fetch_array($q_resto)) { ?>
          <li><a href="?h=detail_toko&id=<?php echo $d_resto['id_toko'] ?>"><i class="icon-chevron-right"></i><?php echo  $d_resto['nama_toko'] ?></a></li>
        <?php   } ?>
                     
      </ul>
      </li>
      <li class="subMenu"><a> Daftar Cofee Shop</a>
        <ul style="display:none">
         <?php   
            $q_resto = mysqli_query($conn, "SELECT * from toko where jenis_toko='Coffee Shop' and status='1'");
            while ($d_resto=mysqli_fetch_array($q_resto)) { ?>
          <li><a href="?h=detail_toko&id=<?php echo $d_resto['id_toko'] ?>"><i class="icon-chevron-right"></i><?php echo  $d_resto['nama_toko'] ?></a></li>
        <?php   } ?>                       
      </ul>
      </li>
      <li><a href="?h=data_toko">Lihat Data toko</a></li>
     
    </ul>
    <br/>
    <?php if (isset($_SESSION['login'])!=true) { ?> 
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
      
 
      <li class="subMenu"><a> Register Akun</a>
        <ul style="display:none">
          <li><a href="?h=daftar_toko">Buat Toko</a></li>               
          <li><a href="?h=daftar_pelanggan">Buat Akun Pelanggan</a></li>               
        </ul>
      </li>
     
    </ul>
  <?php } ?>
    <br/>
     
  </div>
<!-- Sidebar end=============================================== -->
    <div class="span9">   
        <?php   
        if (isset($_GET['h'])) {
          include "template/konten.php";
        }else{
           if (isset($_SESSION['login'])==true &&isset($_SESSION['level'])=='Pelanggan') { 
              include "form/dashboard/dashboard_pelanggan.php";
            }else{
              include "form/produk/data_produk.php";
          }
        }
         ?>
        
    </div>
    </div>
  </div>
</div>
<!-- Footer ================================================================== -->
  <div  id="footerSection">
  <div class="container">
   
    <p class="pull-right">Aplikasi Marketplace Restourant Dan Coffee Shop Kota Padang </p>
  </div><!-- Container End -->
  </div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
  <script src="../assets/bootstrap_shop/themes/js/jquery.js" type="text/javascript"></script>
  <script src="../assets/bootstrap_shop/themes/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/bootstrap_shop/themes/js/google-code-prettify/prettify.js"></script>
  
  <script src="../assets/bootstrap_shop/themes/js/bootshop.js"></script>
    <script src="../assets/bootstrap_shop/themes/js/jquery.lightbox-0.5.js"></script>
  
  <!-- ../assets/bootstrap_shop/Themes switcher section ============================================================================================= -->

<span id="../assets/bootstrap_shop/themesBtn"></span>
</body>
</html>