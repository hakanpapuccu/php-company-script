<?php 
include "header.php";
include "baglan.php";
$id=$_GET['id'];
$sayfasor=$db->prepare("select * from sayfalar where id=?");
$sayfasor->execute(array($id));
$sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC);
?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">

			<div class="col-md-12">

				<h1 class="mt-xl mb-none"><?php echo $sayfacek['baslik']; ?></h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<div class="row">



					<div class="col-md-12">

						<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
							
							<span class="thumb-info-caption">
								<span class="thumb-info-caption-text">
									
									<span class="post-meta">
										<span><?php echo $habercek['zaman']; ?></span>
									</span>
									<p class="font-size-md"><?php echo $sayfacek['icerik']; ?></p>

								</span>
							</span>
						</span>

					</div>




				</div>

			</div>

			
		</div>

	</div>
</div>

<?php include "footer.php"; ?>