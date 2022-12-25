<?php 
include "../../baglan.php";
include "header.php"; 
$hakkimizdasor=$db->prepare("select * from hakkimizda where id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>

<head>
  <script src="../../ckeditor/ckeditor.js" type="text/javascript"></script>
</head>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Sayfa Ayarları</h3>
              </div>

              <!--<div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Sayfada Ara...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Ara</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Hakkımızda Sayfası Ayarları</h2>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <?php 

               if ($_GET['durum']=="ok") { ?>
                  <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Güncelleme işlemi başarıyla tamamlandı...</strong>
                  </div>
                   <?php } elseif ($_GET['durum']=="no") { ?>
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Güncelleme işlemi başarısız...</strong>
                  </div>

              <?php }?>

                    <form action="../../islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Sayfa Başlığı <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $hakkimizdacek['baslik']; ?>" name="baslik">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Sayfa İçeriği <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="editor1" required="required" name="icerik"><?php echo $hakkimizdacek['icerik']; ?></textarea>

                          <script>
                            CKEDITOR.replace ('editor1');
                          </script>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tanıtım Videosu
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="first-name" class="form-control col-md-7 col-xs-12" value="<?php echo $hakkimizdacek['video']; ?>"  name="video">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Site Misyonu
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="first-name" class="form-control col-md-7 col-xs-12" value="<?php echo $hakkimizdacek['misyon']; ?>" name="misyon">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Site Vizyonu
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="first-name" class="form-control col-md-7 col-xs-12" value="<?php echo $hakkimizdacek['vizyon']; ?>" name="vizyon">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1">
                          <button type="submit" class="btn btn-success" name="hakkimizdaguncelle">Güncelle</button>
                        </div>
                      </div>

                    </form>

                    
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