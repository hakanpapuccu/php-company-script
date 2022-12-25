<?php 
include "../../baglan.php";
include "header.php"; 
$ayarsor=$db->prepare("select * from ayarlar where id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

?>
<!-- /top navigation -->

<!-- page content -->

<head>
  <script src="../../ckeditor/ckeditor.js" type="text/javascript"></script>
</head>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Sayfa Ayarları</h3>
      </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">


          <div class="x_panel">
            <div class="x_title">
              <h2>Sayfa Ekle</h2>

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

              <form action="../../islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

               

                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Sayfa Başlığı: <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="baslik">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Sayfa İçeriği <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <textarea id="editor1" required="required" name="icerik"></textarea>

                    <script>
                      CKEDITOR.replace ('editor1',
                       
                       );

                    </script>
                  </div>
                </div>


                

                

                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Haber Durumu: <span class="required">*</span>
                  </label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <select id="heard" class="form-control" name="durum" required>
                      <option value="1">Aktif</option>
                      <option value="0">Pasif</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-1 col-sm-1 col-xs-12 col-md-offset-1">
                    <button type="submit" class="btn btn-success" name="sayfaekle">Kaydet</button>
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