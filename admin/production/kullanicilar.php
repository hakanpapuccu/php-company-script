<?php 
include "../../baglan.php"; 
include "header.php"; 

if (isset($_POST['arama'])) {
  $aranan=$_POST['aranan'];
  $kullanicilarsor=$db->prepare("select * from user where kulladi like '%$aranan%'");
  $kullanicilarsor->execute();
}




?>


<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Kullanıcılar</h3>
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
              <h2>Kullanıcı Ayarları</h2>

              <div class="clearfix"></div>
            </div>

            <div class="x_content">
              <a href="kullanici-ekle.php" class="btn btn-success" style="margin-bottom:10px;"><i class="fa fa-plus"></i>Yeni Ekle</a>

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">

                      <th class="column-title">Kayıt Zamanı </th>
                      <th class="column-title">Kullanıcı Adı </th>
                      <th class="column-title">Ad Soyad</th>
                      <th class="column-title">Yetki</th>
                      <th class="column-title">Durum</th>
                      <th class="column-title"></th>
                      <th class="column-title"></th>
                      
                    </tr>
                  </thead>

                  <tbody>

                    <?php 

                    $sayfada=8;
                    $kullanicisayi=$db->prepare("select * from user");
                    $kullanicisayi->execute();
                    $toplam_haber=$kullanicisayi->RowCount();
                    $toplam_sayfa=ceil($toplam_haber/$sayfada);
                    $sayfa=isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                    if ($sayfa<1) $sayfa=1;
                    if ($sayfa>$toplam_sayfa) $sayfa=$toplam_sayfa;
                    $limit=($sayfa-1)*$sayfada;



                    $kullanicilarsor=$db->prepare("select * from user order by id DESC limit $limit, $sayfada");
                    $kullanicilarsor->execute();
                    while ($kullanicilarcek=$kullanicilarsor->fetch(PDO::FETCH_ASSOC)) {


                     ?>
                     <tr class="even pointer">

                      <td class=" "><?php echo $kullanicilarcek['zaman']; ?></td>
                      <td class=" "><?php echo $kullanicilarcek['kulladi']; ?></td>
                      <td class=" "><?php echo $kullanicilarcek['adsoyad']; ?></td>
                      <td class=" "><?php echo $kullanicilarcek['yetki']; ?></td>
                      <td class=" "><?php echo $kullanicilarcek['durum']; ?></td>
                      
                      <td class=" "><a href="kullanici-duzenle.php?id=<?php echo $kullanicilarcek['id']; ?>"><i class="success fa fa-pencil fa-2x"></i></a></td>

                      <td class=" "><a href="../../islem.php?kullanicisil=ok&id=<?php echo $kullanicilarcek['id']; ?>"><i class="success fa fa-close fa-2x" style="color:red;"></i></a></td>
                      
                      
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
                          <a href="kullanicilar.php?sayfa=<?php echo $s; ?>" class="page-link"><?php echo $s; ?></a>
                        </li>  

                      <?php  } else { ?>

                       <li class="page-item">
                        <a href="kullanicilar.php?sayfa=<?php echo $s; ?>" class="page-link"><?php echo $s; ?></a>
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