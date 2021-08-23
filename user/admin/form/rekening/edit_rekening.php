<div class="box-header with-border">
  <h3 class="box-title">Edit Data Rekening</h3>

  <div class="box-tools pull-right">
    <a href="?a=data-pasien" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from rekening where id_rekening='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>

<br>

<form action="form/toko/rekening/simpanedit_rekening.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
                  <label>Bank</label>
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_rekening'] ?>">
                  <input type="text" name="bank" class="form-control" value="<?php echo $d1['bank'] ?>">
              </div> 
              <div class="form-group">
                  <label>Kode Bank</label>
                  <input type="text" name="kodebank" class="form-control" value="<?php echo $d1['kode_bank'] ?>">
              </div> 
              <div class="form-group">
                  <label>No rekening</label>
                  <input type="text" name="rekening" class="form-control" value="<?php echo $d1['no_rekening'] ?>">
              </div> 
             

             
              <div class="form-group">
                 <input type="submit" class="btn btn-info" onclick="return confirm('apakah data yang anda masukan sudah benar.?')" value="Simpan Perubahan Data">
              </div> 

              
          
</form>