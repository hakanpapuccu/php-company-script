<?php 
include "header.php";
include "baglan.php";
if (isset($_POST['arama'])) {

	
	$arama=$db->prepare("select * from haberler or sayfalar where baslik like %aranan% order by id DESC limit $limit, $sayfada");
	$arama->execute();

}



?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">

			<div class="col-md-9">

				<h1 class="mt-xl mb-none">ARAMA SONUÇLARI</h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<div class="row">

					<?php 

					while ($getir=$arama->fetch(PDO::FETCH_ASSOC)) { ?>

						<div class="col-md-12">

							<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
								
								<span class="thumb-info-caption">
									<span class="thumb-info-caption-text">
										<h2 class="mb-md mt-xs"><?php echo $getir['baslik']; ?></h2>
										
										
										
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