<div class="box-header with-border">
  <h3 class="box-title">Edit Data paket</h3>

  <div class="box-tools pull-right">
    <a href="?a=data-pasien" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from paket where id_paket='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>

<br>

<form action="form/paket/simpanedit_paket.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
                  <label>Nama Paket</label>
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_paket'] ?>">
                  <input type="text" name="nama" class="form-control" value="<?php echo $d1['nama_paket'] ?>">
                  <input type="hidden" name="gambarlama" class="form-control" value="<?php echo $d1['gambar'] ?>">
              </div> 
              <div class="form-group">
                  <label>Type Kamar</label>
                  <select name="tipe"  class="form-control" >
                    <option value=""<?php if($d1['type_kamar']==""){echo "selected";} ?>>Tidak Termasuk Kamar</option>
                    <?php $paket = ['Single','Double','Triple'];
                    foreach ($paket as $p) { ?>
                    <option value="<?php echo $p ?>"<?php if($d1['type_kamar']==$p){echo "selected";} ?>><?php echo $p ?></option>
                     <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Harga Sewa</label>
                  <input type="text" name="harga" class="form-control" value="<?php echo $d1['harga_paket'] ?>">
              </div> 
              <div class="form-group">
                  <label>Fasilitas</label>
                  <textarea class="ckeditor" name="fasilitas" id="ckeditor"><?php echo $d1['fasilitas'] ?></textarea>
              </div> 

             
              <div class="form-group">
                 <input type="submit" class="btn btn-info" onclick="return confirm('apakah data yang anda masukan sudah benar.?')"value="Simpan Perubahan Data">
              </div> 

              
          
</form>