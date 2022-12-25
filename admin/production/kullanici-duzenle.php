<?php 
include "../../baglan.php";
include "header.php"; 
$ayarsor=$db->prepare("select * from ayarlar where id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
$id=$_GET['id'];
$kullanicilarsor=$db->prepare("select * from user where id=?");
$kullanicilarsor->execute(array($id));
$kullanicilarcek=$kullanicilarsor->fetch(PDO::FETCH_ASSOC);

?>
<!-- /top navigation -->

<!-- page content -->


<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Kullanıcılar</h3>
      </div>


    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">


          <div class="x_panel">
            <div class="x_title">
              <h2>Kullanıcı Düzenle</h2>

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
                  <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Kayıt Zamanı: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="zaman " value="<?php echo $kullanicilarcek['zaman']; ?>" disabled="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Kullanıcı Adı: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="kulladi" value="<?php echo $kullanicilarcek['kulladi']; ?>">
                  </div>
                </div>


                


                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Adı Soyadı: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name"  class="form-control col-md-7 col-xs-12" name="adsoyad" value="<?php echo $kullanicilarcek['adsoyad']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Şifre: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" id="first-name" class="form-control col-md-7 col-xs-12" name="kullpass">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Yetki: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="yetki" value="<?php echo $kullanicilarcek['yetki']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Haber Durumu: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="heard" class="form-control" name="durum" required>
                      <?php 

                      if ($kullanicilarcek['durum']==1) { ?>

                        <option value='1'>Aktif</option>
                        <option value='0'>Pasif</option>


                      <?php  } else { ?>

                       <option value='0'>Pasif</option> 
                       <option value='1'>Aktif</option>

                     <?php } ?>
                   </select>
                 </div>
               </div>

               <input type="hidden" name="id" value="<?php echo $kullanicilarcek['id']; ?>">

               <div class="form-group">
                <div class="col-md-1 col-sm-1 col-xs-12 col-md-offset-1">
                  <button type="submit" class="btn btn-success" name="kullaniciguncelle">Kaydet</button>
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