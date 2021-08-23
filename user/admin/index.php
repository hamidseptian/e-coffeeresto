<?php 
session_start();
if ($_SESSION['login']!=true) {
   header('location:../../');
}
elseif ($_SESSION['level']=='') {
  echo "<script>
      alert('Akun anda sedang di nonaktifkan');
    </script>
  ";

  echo "<meta http-equiv='refresh' content='0; url=http:../../'>";
   //header('location:../../');
}
else{
  include "../../assets/koneksi.php";
  //error_reporting(0);
  $idus= $_SESSION['id_admin'];
  $level= $_SESSION['level'];
  // echo $idus;

  if ($level=='Admin') {
    $q1=mysqli_query($conn, "SELECT * From admin where id_admin='$idus'")or die(mysql_error());
    $d1=mysqli_fetch_array($q1);
    $namauser=$d1['nama_admin'];

  }
  elseif ($level=='Toko') {
    $q1=mysqli_query($conn, "SELECT * From toko where id_toko='$idus'")or die(mysql_error());
    $d1=mysqli_fetch_array($q1);
    $namauser=$d1['pemilik_toko'];
    $namatoko=$d1['nama_toko'];
  }
  else {
    $q1=mysqli_query($conn, "SELECT * From toko t left join karyawan k on t.id_toko=k.id_toko where id_karyawan='$idus'")or die(mysqli_error());
    $d1=mysqli_fetch_array($q1);
    $namauser=$d1['nama_karyawan'];
    $namatoko=$d1['nama_toko'];
  }






 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  
<script src="../../assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/adminlte/dist/css/AdminLTE.min.css">

 <script type="text/javascript" src="../../assets/adminlte/js/jquery.js"></script>
 <script type="text/javascript" src="../../library/ckeditor/ckeditor.js"></script>
    <script src="../sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../sweetalert/dist/sweetalert.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../assets/adminlte/dist/css/skins/_all-skins.min.css">
<script type="text/javascript" src="pemisahangka.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../assets/adminlte/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-bars"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E-CofeeResto</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../assets/user.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $namauser; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../assets/user.jpg" class="img" alt="User Image">

                <p>
                  <?php echo $namauser; ?>  <br>
                  <?php if($level!='Admin'){
                    echo "Admin Toko ". $namatoko;
                  } ?>
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="?a=edit-akun" class="btn btn-default btn-flat">Ganti Password</a> -->
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../assets/user.jpg" class="img" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $namauser; ?></p>
          <a href="#"><?php echo $level ?> 
            <?php if($level=='Toko'){
                    echo "- ".$namatoko;
                  }
                  elseif($level=='Karyawan'){
                    echo "- Toko ".$namatoko;
                  } ?> </a>
        </div>
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">Kegiatan Khuruj</li> -->
       <!--  <li><a href="#khuruj_diusulkan"><i class="fa fa-book"></i> <span>Usulan Khuruj </span></a></li> -->
       <!-- 
        <li><a href="#khuruj_disetujui"><i class="fa fa-book"></i> <span>Usulan Khuruj Disetujui</span></a></li>
        <li><a href="#khuruj_berlangsung"><i class="fa fa-book"></i> <span>Jadwal Khuruj Berlangsung</span></a></li> -->
        <!-- <li><a href="#kegiatan_khuruj"><i class="fa fa-book"></i> <span>Kegiatan Khuruj</span></a></li> -->
        <!-- <li><a href="#kota&idp=1"><i class="fa fa-book"></i> <span>Data Kota</span></a></li> -->
        <li class="header">Main Navigation</li>
      <?php 
      if ($level=='Admin') { ?>
        <li><a href="?a=toko"><i class="fa fa-book"></i> <span style="color:aqua">Data Toko</span></a></li>
        <!-- <li><a href="?a=pelanggan"><i class="fa fa-book"></i> <span>Data Pelanggan</span></a></li> -->
        <li><a href="?a=wilayah"><i class="fa fa-book"></i> <span style="color:aqua">Data Wilayah</span></a></li>
        <li><a href="?a=edit_admin&id=<?php echo $_SESSION['id_admin'] ?>"><i class="fa fa-book"></i> <span style="color:aqua">Edit Akun Admin</span></a></li>
        <?php }
      elseif ($level=='Toko') { ?>
         
        <li><a href="?m=karyawan"><i class="fa fa-book"></i> <span style="color:aqua">Data Karyawan</span></a></li>
        
        <!-- <li><a href="?m=ongkir"><i class="fa fa-book"></i> <span>Data Ongkir</span></a></li> -->
        <!-- <li><a href="?m=rekening"><i class="fa fa-book"></i> <span>Data Rekening</span></a></li> -->

        

          <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span  style="color:aqua">Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="?m=penjualan&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i> <span style="color:aqua">Data Penjualan</span></a></li>
              <li><a href="?m=penjualan_produk_terbanyak&bulan=<?php echo date('m') ?>&tahun=<?php echo date('Y') ?>"><i class="fa fa-book"></i> <span style="color:aqua">Data Penjualan Produk Terbanyak</span></a></li>

          </ul>
        </li>

        <li><a href="?m=edit_toko"><i class="fa fa-book"></i> <span style="color:aqua">Perbaharui Data Toko</span></a></li>
        <!-- <li><a href="?m=catatan"><i class="fa fa-book"></i> <span>Catatan</span></a></li> -->
        
        <?php }else{ ?>
        	<li><a href="?m=produk"><i class="fa fa-book"></i> <span style="color:aqua">Data Produk</span></a></li>
        <li><a href="?m=ongkir"><i class="fa fa-book"></i> <span style="color:aqua">Data Ongkir</span></a></li>
        <li><a href="?m=banner"><i class="fa fa-book"></i> <span style="color:aqua">Banner Toko</span></a></li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span  style="color:aqua">Data Pesanan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="?m=pesanan"><i class="fa fa-book"></i> <span  style="color:aqua">Pesanan Baru & Dalam Proses</span></a></li>
              <li><a href="?m=pesanan_selesai"><i class="fa fa-book"></i> <span  style="color:aqua">Pesanan Selesai</span></a></li>

          </ul>
        </li>
        <?php   } ?>
       
           
        







      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title" id="judul_konten">Wellcome To Administrator Page</h3>
              <h3 class="box-title" id="btn_tambah" style="float:right;"></h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body" >
             <?php 
             if ($level=='Toko' || $level=='Karyawan') {
             include "template/konten_toko.php";
             }else{
             include "template/konten.php" ;
             }
             ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/adminlte/dist/js/demo.js"></script>
<!-- page script -->

<script>
  $(function () {
    $('#example1').DataTable();
    $('#example3').DataTable()
    $('#tabelscrol').DataTable( {
    "scrollX": true
    } );
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>

<?php } ?>