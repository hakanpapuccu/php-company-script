<?php 
include "../../baglan.php"; 
include "header.php"; 

if (isset($_POST['arama'])) {
  $aranan=$_POST['aranan'];
  $slidersor=$db->prepare("select * from slider where ad like '%$aranan%'");
  $slidersor->execute();
}

else {
  $slidersor=$db->prepare("select * from slider");
  $slidersor->execute();
}


?>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Slider İşlemleri</h3>
      </div>
      
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

          <form action="" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Ara..." name="aranan">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="arama">Ara</button>
              </span>
            </div>
          </form>
        </div>
      </div>   



    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">


          <div class="x_panel">
            <div class="x_title">
              <h2>Slider İşlemleri</h2>

              <div class="clearfix"></div>
            </div>

            <div class="x_content">
              <a href="slider-ekle.php" class="btn btn-success" style="margin-bottom:10px;"><i class="fa fa-plus"></i>Yeni Ekle</a>

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">

                      <th class="column-title">Slider Resim </th>
                      <th class="column-title">Slider Ad </th>
                      <th class="column-title">Slider Sıra</th>
                      <th class="column-title">Slider Durum </th>
                      <th class="column-title"></th>
                      
                    </tr>
                  </thead>

                  <tbody>

                    <?php 

                    
                    while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {


                     ?>
                     <tr class="even pointer">

                      <td class=" "><img width="200" height="100" src="../../img/<?php echo $slidercek['yol']; ?>" alt=""></td>
                      <td class=" "><?php echo $slidercek['ad']; ?></td>
                      <td class=" "><?php echo $slidercek['sira']; ?></td>
                      <td class=" "><?php echo $slidercek['durum']; ?></td>
                      
                      

                      <td class=" "><a href="../../islem.php?slidersil=ok&id=<?php echo $slidercek['id']; ?>"><i class="success fa fa-close fa-2x" style="color:red;"></i></a></td>
                      
                      
                    </tr>

                  <?php } ?>

                </tbody>
              </table>
            </div>




          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->

<!-- footer content -->
<?php include "footer.php"; ?>