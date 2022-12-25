<?php 
include "header.php";
include "baglan.php";

?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">

			<div class="col-md-9">

				<h1 class="mt-xl mb-none">BİZDEN HABERLER</h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<div class="row">

					<?php 

					$sayfada=4;
					$haberlersor=$db->prepare("select * from haberler");
					$haberlersor->execute();
					$toplam_haber=$haberlersor->RowCount();
					$toplam_sayfa=ceil($toplam_haber/$sayfada);
					$sayfa=isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
					if ($sayfa<1) $sayfa=1;
					if ($sayfa>$toplam_sayfa) $sayfa=$toplam_sayfa;
					$limit=($sayfa-1)*$sayfada;



					$habersor=$db->prepare("select * from haberler where durum=:durum order by id DESC limit $limit, $sayfada");
					$habersor->execute(array(
					'durum'=>1
					));
					while ($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) { ?>

						<div class="col-md-12">

							<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
								<span class="thumb-info-side-image-wrapper p-none hidden-xs">
									<a title="" href="haber-detay.php?id=<?php echo $habercek['id']; ?>">
										<img src="img/<?php if (strlen($habercek['resim'])>0) {echo $habercek['resim'];} ?>" class="img-responsive" alt="" style="width: 295px;">
									</a>
								</span>
								<span class="thumb-info-caption">
									<span class="thumb-info-caption-text">
										<h2 class="mb-md mt-xs"><?php echo $habercek['baslik']; ?></h2>
										<span class="post-meta">
											<span><?php echo $habercek['zaman']; ?></span>
										</span>
										<p class=""><?php echo substr($habercek['detay'], 0,400) ?></p>
										<a class="mt-md" href="haber-detay/<?php echo seo($habercek['baslik']).'/'.$habercek['id']; ?>">Devamını Oku <i class="fa fa-long-arrow-right"></i></a>
									</span>
								</span>
							</span>

						</div>
					


					<?php } ?>

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

				<?php echo include "rightbar.php"; ?>
				</div>

			</div>
		</div>

		<?php include "footer.php"; ?>