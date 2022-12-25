<?php 
include "../../baglan.php"; 
include "header.php"; 

if (isset($_POST['arama'])) {
  $aranan=$_POST['aranan'];
  $habersor=$db->prepare("select * from sayfalar where baslik like '%$aranan%'");
  $habersor->execute();

} else {
 $sayfada=8;
 $sayfalarsor=$db->prepare("select * from sayfalar");
 $sayfalarsor->execute();
 $toplam_sayfalar=$sayfalarsor->RowCount();
 $toplam_sayfa=ceil($toplam_sayfalar/$sayfada);
 $sayfa=isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
 if ($sayfa<1) $sayfa=1;
 if ($sayfa>$toplam_sayfa) $sayfa=$toplam_sayfa;
 $limit=($sayfa-1)*$sayfada;



 $sayfasor=$db->prepare("select * from sayfalar order by id DESC limit $limit, $sayfada");
 $sayfasor->execute();
}




?>


<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Sayfa Ayarları</h3>
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
              <h2>Sayfa Ayarları</h2>

              <div class="clearfix"></div>
            </div>

            <div class="x_content">
              <a href="sayfa-ekle.php" class="btn btn-success" style="margin-bottom:10px;"><i class="fa fa-plus"></i>Yeni Ekle</a>

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">

                      <th class="column-title">Sayfa İD </th>
                      <th class="column-title">Sayfa Başlığı </th>
                      <th class="column-title">Sayfa Linki </th>
                      <th class="column-title">Sayfa Durumu </th>
                      <th class="column-title"></th>
                      <th class="column-title"></th>
                      
                    </tr>
                  </thead>

                  <tbody>

                    <?php 

                    
                    while ($sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC)) {


                     ?>
                     <tr class="even pointer">

                      <td class=" "><?php echo $sayfacek['id']; ?></td>
                      <td class=" "><?php echo $sayfacek['baslik']; ?></td>
                      <td class=" "><?php echo seo($sayfacek['baslik']).'/'.$sayfacek['id']; ?></td>
                      <td class=" "><?php echo $sayfacek['durum']; ?></td>
                      
                      <td class=" "><a href="sayfa-duzenle.php?id=<?php echo $sayfacek['id']; ?>"><i class="success fa fa-pencil fa-2x"></i></a></td>

                      <td class=" "><a href="../../islem.php?sayfasil=ok&id=<?php echo $sayfacek['id']; ?>"><i class="success fa fa-close fa-2x" style="color:red;"></i></a></td>
                      
                      
                    </tr>

                  <?php } ?>

                  

                </tbody>
              </table>

              <ul class="pagination">

                <?php 

                $s=0;
                while ($s<$toplam_sayfa) {
                  $s++; ?>

                  <?php 

                  if ($s==$sayfa) { ?>

                    <li class="page-item">
                      <a href="haberler.php?sayfa=<?php echo $s; ?>" class="page-link"><?php echo $s; ?></a>
                    </li>  

                  <?php  } else { ?>

                   <li class="page-item">
                    <a href="haberler.php?sayfa=<?php echo $s; ?>" class="page-link"><?php echo $s; ?></a>
                  </li> 

                <?php   } } ?>


                

              </ul>
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