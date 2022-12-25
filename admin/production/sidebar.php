<?php 
ob_start();
session_start();
 ?>
<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Yönetim Paneli</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldin,</span>
                <h2><?php echo $_SESSION['kulladi']; ?></h2>
                
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa </a></li>
                  <li><a href="hakkimizda.php"><i class="fa fa-book"></i> Hakkımızzda Sayfası </a></li>
                  <li><a href="menuler.php"><i class="fa fa-list"></i> Menüler</a></li>
                  <li><a href="slider.php"><i class="fa fa-image"></i> Slider Ayarları </a></li>
                  <li><a><i class="fa fa-cog"></i> Ayarlar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="genel-ayar.php">Genel Ayarlar</a></li>
                      <li><a href="iletisim-ayar.php">İletişim Ayarları</a></li>
                      <li><a href="api-ayar.php">Api Ayarları</a></li>
                      <li><a href="sosyal-ayar.php">Sosyal Medya Ayarları</a></li>
                      <li><a href="mail-ayar.php">Mail Ayarları</a></li>
                    </ul>
                  </li>

                  <li><a href="haberler.php"><i class="fa fa-newspaper-o"></i>Haberler</a></li>
                  <li><a href="sayfalar.php"><i class="fa fa-newspaper-o"></i>Sayfalar</a></li>
                  <li><a href="kullanicilar.php"><i class="fa fa-users"></i>Kullanıcılar</a></li>
                  
                 
                 
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons 
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> 
            /menu footer buttons -->
          </div>
        </div>