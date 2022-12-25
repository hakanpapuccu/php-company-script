<?php 
include "header.php";
include "baglan.php";
$id=$_GET['id'];
$habersor=$db->prepare("select * from haberler where id=?");
$habersor->execute(array($id));
$habercek=$habersor->fetch(PDO::FETCH_ASSOC);
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



					<div class="col-md-12">

						<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
							<span class="thumb-info-side-image-wrapper p-none hidden-xs">
								<img src="img/<?php if (strlen($habercek['resim'])>0) {echo $habercek['resim'];} ?>" class="img-responsive" alt="" style="">

							</span>
							<span class="thumb-info-caption">
								<span class="thumb-info-caption-text">
									<h2 class="mb-md mt-xs"><?php echo $habercek['baslik']; ?></h2>
									<span class="post-meta">
										<span><?php echo $habercek['zaman']; ?></span>
									</span>
									<p class="font-size-md"><?php echo $habercek['detay']; ?></p>

								</span>
							</span>
						</span>

					</div>




				</div>

			</div>

			<?php echo include "rightbar.php"; ?>
		</div>

	</div>
</div>

<?php include "footer.php"; ?>