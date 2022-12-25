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
  <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
</head>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Menü İşlemleri</h3>
      </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">


          <div class="x_panel">
            <div class="x_title">
              <h2>Menü Ekle</h2>

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

              <form action="../../islem.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Üst Menü</label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" required="" name="ust">
                      <option></option>
                      <option value="AK">Üdt Menü</option>
                      <?php
                      $menusor=$db->prepare("select * from menu where ust=:ust order by ad ASC");
                      $menusor->execute(array(
                        'ust'=>0
                      ));
                      while ($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <option value="<?php echo $menucek['id']; ?>"><?php echo $menucek['ad']; ?></option>
                      <?php } ?>

                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Adı: <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="ad">
                    </div>
                  </div>




                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Linki: <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name"  class="form-control col-md-7 col-xs-12" name="link">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Sırası: <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="sira">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durumu: <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="heard" class="form-control" name="durum" required>
                        <option value="1">Aktif</option>
                        <option value="0">Pasif</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success" name="menukaydet">Kaydet</button>
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
  <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Üst menü seçin",
        allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
    });
  </script>
  <?php include "footer.php"; ?>