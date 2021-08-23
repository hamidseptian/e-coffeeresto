
<?php 
$id_toko=$_GET['id'];
      $q=mysqli_query($conn, "SELECT * from banner where id_toko='$id_toko'");
      $j = mysqli_num_rows($q);
if ($j>0) { ?>
<div id="carouselBlk">
  <div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
      <?php 
      $no=0;
      while ($d_banner = mysqli_fetch_array($q)) { 
        $no++;?>



      <div class="item <?php if($no==1){echo "active";} ?>">
      <div class="container">
      <a href="#"><img style="width:100%" src="../user/admin/form/banner/gambar/<?php echo $d_banner['file'] ?>" alt="special offers"/></a>
      <div class="carousel-caption">
          <h4>Second Thumbnail label</h4>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        </div>
      </div>
      </div>
    <?php } ?>

      
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div> 
</div>
<hr>
<?php } ?>