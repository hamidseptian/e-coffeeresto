<?php 
if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $id = $d_k['id_toko'];
}else{
  $id = $_SESSION['id_admin'];
}
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];
$caption_bulan = 'Bulan '.$namabulan[$bulan].' '.$tahun;
 ?><div class="box-header with-border">
  <h3 class="box-title">Data Penjualan <br><?php echo $caption_bulan  ?></h3>
  <div class="pull-right">
    <a href="form/penjualan/print_penjualan.php?bulan=<?php echo $bulan ?>&tahun=<?php echo $tahun ?>" target="_blank" class="btn btn-info btn-sm">Print</a>
      <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addproduk">Filter</a>
  </div>

 
<form action="" method="get" enctype="multipart/form-data">
<div class="modal fade" id="addproduk">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Filter</h4>
              </div>
              <div class="modal-body">
                 <div class="form-group">
                  <label>Bulan</label>
                    <input type="hidden" name="m" value="penjualan">
                   <select class="form-control" name="bulan">
                     <?php 
                     foreach($namabulan as $k=> $v){ ?>
                      <option value="<?php echo $k ?>" <?php if($bulan==$k){echo "selected";} ?>><?php echo $v ?></option>
                     <?php } ?>
                   </select>
                 </div>
                 <div class="form-group">
                  <label>Tahun</label>
               
                   <select class="form-control" name="tahun">
                     <?php 
                     for ($i=date('Y'); $i > 2010 ; $i--) {  ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
                     <?php } ?>
                   </select>
                 </div>
           
             
             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Filter</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form> 
</div>

<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from pesanan 
    join produk on pesanan.id_produk=produk.id_produk
    join pelanggan on pelanggan.id_pelanggan=pesanan.id_pelanggan
    join toko on produk.id_toko=toko.id_toko
    where produk.id_toko='$id' and pesanan.status_pesanan in ('Selesai')
    and month(tanggal_pesan)='$bulan' and year(tanggal_pesan)='$tahun'
    ");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Tanggal Pesan</td>
        <td>Produk</td>
        <td>Harga</td>
        <td>Banyak Pesanan</td>
        <td>Total</td>
      </tr>
    </thead>
  <?php 
  $totalharga = 0;
  while ($d1=mysqli_fetch_array($q1)) { 
    $total =  $d1['harga'] * $d1['jumlah_pesanan'];
    $totalharga += $total;
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
    
   
    <td><?php echo $d1['tanggal_pesan'] ?></td>
    <td><?php echo $d1['nama_produk'] ?></td>
    <td><?php echo number_format($d1['harga']) ?></td>
    <td><?php echo $d1['jumlah_pesanan'] ?></td>
    <td><?php echo number_format($total) ?></td>
    
   
  </tr>
  <?php } ?>
  <tfoot>
    <tr>
      <td colspan="5">Total</td>
      <td><?php echo number_format($totalharga) ?></td>
    </tr>
  </tfoot>
</table>