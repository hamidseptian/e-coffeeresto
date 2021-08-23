<?php 
$id=$_GET['id'];
$waktu=$_GET['waktu'];
$status=$_GET['status'];
// $idtoko = $_SESSION['id_admin'];
if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $idtoko = $d_k['id_toko'];
}else{
  $idtoko = $_SESSION['id_admin'];
}
 ?>
 <?php 
  $q1=mysqli_query($conn, "SELECT * from pesanan 
    join produk on pesanan.id_produk=produk.id_produk
    join pelanggan on pelanggan.id_pelanggan=pesanan.id_pelanggan
    join toko on produk.id_toko=toko.id_toko
    where produk.id_toko='$idtoko' and pesanan.id_pelanggan='$id' and pesanan.tanggal_pesan='$waktu'");


  $q2=mysqli_query($conn, "SELECT * from pelanggan p left join kecamatan k on p.id_domisili=k.id_kecamatan  where id_pelanggan='$id'");
  $d2=mysqli_fetch_array($q2);
  $idkel = $d2['id_domisili'];
  $q3=mysqli_query($conn, "SELECT * from ongkir  where id_domisili='$idkel'");
  $d3=mysqli_fetch_array($q3);
  $ongkir = $d3['ongkir'];
  $no=1;
 ?>

<div class="col-md-8">
  <div class="box-header with-border">
  <h3 class="box-title">Detail Pesanan </h3>

  
</div>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>produk</td>
        <td>Jumlah Pesanan </td>
        <td>Harga Perunit</td>
        <td>Total Harga</td>

      </tr>
    </thead>
  <?php 
  $nol=0;
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
    
    <td><?php echo $d1['nama_produk'] ?></td>
    <td><?php echo $d1['jumlah_pesanan'] ?> Unit</td>
    <td>Rp. <?php echo number_format($d1['harga']) ?></td>
   
    <td>Rp. <?php $totbel = $d1['harga']* $d1['jumlah_pesanan'];
    echo number_format($totbel);
    $totalbelanja = $nol+=$totbel;
     ?></td>
    

  </tr>
  <?php } ?>
  <tr>
    <td colspan="4">Total Belanja</td>
    <td colspan="1">Rp. <?php echo number_format($totalbelanja) ?></td>
  </tr>
  <tr>
    <td colspan="4">Ongkir</td>
    <td colspan="1">Rp. <?php echo number_format($ongkir) ?></td>
  </tr>
  <tr>
    <td colspan="4">Total Pembayaran</td>
    <td colspan="2">Rp. <?php echo number_format($ongkir + $totalbelanja) ?></td>
  </tr>
</table>
</div>
<div class="col-md-4">
  <div class="box-header with-border">
    <h3 class="box-title">Identitas Pelanggan</h3>
  </div>
  <table class="table">
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><?php echo $d2['nama_pelanggan'] ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?php echo $d2['alamat_pelanggan'] ?></td>
    </tr>
    <tr>
      <td>Domisili</td>
      <td>:</td>
      <td><?php echo $d2['nama_kecamatan'] ?></td>
    </tr>
    <tr>
      <td>No HP</td>
      <td>:</td>
      <td><?php echo $d2['nohp_pelanggan'] ?></td>
    </tr>
    <tr>
      <td>Status Pesanan</td>
      <td>:</td>
      <td><?php echo $status ?></td>
    </tr>
  </table>

<?php 
  if ($status=='Order') {
    $caption = 'Proses Pesanan';
    $pilihan = ['Di batalkan','Proses'];
    $hidden = '';
    $kembali = '?m=pesanan';
  }
  else if ($status=='Proses') {
    $caption = 'Distribusikan  Pesanan';
    $pilihan = ['Di antarkan','Di jemput pelanggan'];
    $hidden = '';
    $kembali = '?m=pesanan';
  }
  else if ($status=='Di antarkan' || $status=='Di jemput pelanggan') {
    $caption = 'Selesai Distribusikan  Pesanan';
    $pilihan = ['Selesai'];
    $hidden = '';
    $kembali = '?m=pesanan';
  }else{
     $caption = '';
    $pilihan = [];
    $hidden = 'style="display:none"';
    $kembali = '?m=pesanan_selesai';
    // $pilihan = [];
  }


?>

    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addproduk" <?php echo $hidden ?>><?php echo $caption ?></a>

  <a href="<?php echo $kembali ?>" class="btn btn-info btn-sm">Kembali</a>


<form action="form/pesanan/simpanedit_status_pesanan.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addproduk">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo $caption ?></h4>
              </div>
              <div class="modal-body">
                 <div class="form-group">
                  <label>Pilih Action</label>
                  <input type="hidden" name="status_sebelumnya" value="<?php echo $status ?>">
                  <input type="hidden" name="id_pelanggan" value="<?php echo $id ?>">
                  <input type="hidden" name="waktu" value="<?php echo $waktu ?>">
                   <select class="form-control" name="status">
                     <?php foreach($pilihan as $p){ ?>
                      <option value="<?php echo $p ?>"><?php echo $p ?></option>
                     <?php } ?>
                   </select>
                 </div>
           
             
             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')">Simpan</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>

</div>
<div class="clearfix"></div>
<br>
