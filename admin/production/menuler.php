<?php 
include "../../baglan.php"; 
include "header.php"; 

if (isset($_POST['arama'])) {
   $aranan=$_POST['aranan'];
  $Menüsor=$db->prepare("select * from menu where ad like '%$aranan%'");
  $Menüsor->execute();
}




?>


<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Menü İşlemleri</h3>
      </div>
      
    <!--  <div class="title_right">
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
      </div>  -->



    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">


          <div class="x_panel">
            <div class="x_title">
              <h2>Menü Sayfası</h2>

              <div class="clearfix"></div>
            </div>

            <div class="x_content">
              <a href="menu-ekle.php" class="btn btn-success" style="margin-bottom:10px;"><i class="fa fa-plus"></i>Yeni Ekle</a>

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">

                      
                      <th class="column-title">Menü Adı </th>
                      <th class="column-title">Menü Link</th>
                      <th class="column-title">Menü Sıra </th>
                      <th class="column-title">Menü Durum</th>
                      <th class="column-title">Üst Menü</th>
                      <th class="column-title"></th>
                      <th class="column-title"></th>
                      
                    </tr>
                  </thead>

                  <tbody>

                    <?php 

                    $sayfada=8;
                    $menulersor=$db->prepare("select * from menu");
                    $menulersor->execute();
                    $toplam_menu=$menulersor->RowCount();
                    $toplam_sayfa=ceil($toplam_menu/$sayfada);
                    $sayfa=isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                    if ($sayfa<1) $sayfa=1;
                    if ($sayfa>$toplam_sayfa) $sayfa=$toplam_sayfa;
                    $limit=($sayfa-1)*$sayfada;



                    $menusor=$db->prepare("select * from menu where ust=:ust order by sira ASC limit $limit, $sayfada");
                    $menusor->execute(array(
                    'ust'=>0
                    ));
                    while ($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {
                      $id=$menucek['id'];
                    ?>
                     <tr class="even pointer">

                      <td class=" "><?php echo $menucek['ad']; ?></td>
                      <td class=" "><?php echo $menucek['link']; ?></td>
                      <td class=" "><?php echo $menucek['sira']; ?></td>
                      <td class=" "><?php echo $menucek['durum']; ?></td>
                      <td class=" "><?php echo $menucek['ust']; ?></td>
                      
                      <td class=" "><a href="menu-duzenle.php?id=<?php echo $menucek['id']; ?>"><i class="success fa fa-pencil fa-2x"></i></a></td>

                      <td class=" "><a href="../../islem.php?menusil=ok&id=<?php echo $menucek['id']; ?>"><i class="success fa fa-close fa-2x" style="color:red;"></i></a></td>
                      
                      
                    </tr>
                    <?php 

                    $altmenusor=$db->prepare("select * from menu where ust=:id order by sira ASC");
                    $altmenusor->execute(array(
                    'id'=>$id
                    ));
                    while ($altmenucek=$altmenusor->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                     <tr class="even pointer">

                      <td class=" "><i class="fa fa-level-up"></i>&nbsp;<?php echo $altmenucek['ad']; ?></td>
                      <td class=" "><?php echo $altmenucek['link']; ?></td>
                      <td class=" "><?php echo $altmenucek['sira']; ?></td>
                      <td class=" "><?php echo $altmenucek['durum']; ?></td>
                      <td class=" "><?php echo $altmenucek['ust']; ?></td>
                      
                      <td class=" "><a href="menu-duzenle.php?id=<?php echo $altmenucek['id']; ?>"><i class="success fa fa-pencil fa-2x"></i></a></td>

                      <td class=" "><a href="../../islem.php?menusil=ok&id=<?php echo $altmenucek['id']; ?>"><i class="success fa fa-close fa-2x" style="color:red;"></i></a></td>
                      
                      
                    </tr>

                  <?php } }?>

                  

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
                          <a href="menuler.php?sayfa=<?php echo $s; ?>" class="page-link"><?php echo $s; ?></a>
                        </li>  

                      <?php  } else { ?>

                       <li class="page-item">
                        <a href="menuler.php?sayfa=<?php echo $s; ?>" class="page-link"><?php echo $s; ?></a>
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