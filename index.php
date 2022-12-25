<?php 
include "header.php"; 
include "slider.php"; 



?>


<section class="section section-default section-no-border mt-none">
	<div class="container">
		<div class="row mb-xl">
			<div class="col-md-7">
				<h2 class="mt-xl mb-none"><?php echo $hakkimizdacek['baslik']; ?></h2>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>
				<p class="mt-lg"><?php echo substr($hakkimizdacek['icerik'], 0, 700)."..."; ?></p>

				<a class="mt-md" href="hakkimizda.php">Daha Fazla <i class="fa fa-long-arrow-right"></i></a>
			</div>
			<div class="col-md-4 col-md-offset-1">
				<h4 class="mt-xl mb-none">Misyonumuz</h4>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>
				<p class="mt-lg"><?php echo $hakkimizdacek['misyon']; ?></p>
			</div>
		</div>
	</div>
</section>






<div class="container">
	<div class="row">
		<div class="col-md-12 center">
			<h2 class="mt-xl mb-none">Bizden Haberler</h2>
			<div class="divider divider-primary divider-small divider-small-center mb-xl">
				<hr>
			</div>
		</div>
	</div>
	<div class="row mt-xl">
		<?php 
		$habersor=$db->prepare("select * from haberler order by id DESC limit 2");
		$habersor->execute();
		while ($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) { ?>

			<div class="col-md-6">

				<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mb-xl">
					<span class="thumb-info-side-image-wrapper p-none hidden-xs">
						<a title="" href="demo-law-firm-news-detail.html">
							<?php if (strlen($habercek['resim'])>0) {?>
								<img src="img/<?php echo $habercek['resim']; ?>" width=195  >
							<?php } ?>
						</a>
					</span>
					<span class="thumb-info-caption">
						<span class="thumb-info-caption-text">
							<h2 class="mb-md mt-xs"><?php echo $habercek['baslik'] ?></h2>
							<span class="post-meta">
								<span><?php echo $habercek['zaman'] ?></span>
							</span>
							<p class="font-size-md"><?php echo substr($habercek['detay'], 0 ,120); ?></p>
							<a class="mt-md" href="haber-detay.php?id=<?php echo $habercek['id']; ?>">Devamını Oku <i class="fa fa-long-arrow-right"></i></a>
						</span>
					</span>
				</span>

			</div>

		<?php } ?>

	</div>
</div>

<section class="section section-background section-footer" style="background-image: url(img/custom-header-bg-2.jpg); background-position: 50% 100%;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-6">
				<h2 class="mt-xl mb-none">Bize Ulaşın</h2>
				<p>Bizimle her türlü konu hakkında aşağıdaki form ile iletişime geçebilirsiniz.</p>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>
				<form id="contactForm" action="php/contact-form.php" method="POST">
					<div class="row">
						<div class="form-group">
							<div class="col-sm-6">
								<input type="text" value="" placeholder="Adınız" data-msg-required="Lütfen adınızı giriniz." maxlength="100" class="form-control" name="name" id="name" required>
							</div>
							<div class="col-sm-6">
								<input type="email" value="" placeholder="E posta adresiniz *" data-msg-required="E posta adresinizi giriniz." data-msg-email="Lütfen geçerli bir e posta adresi giriniz." maxlength="100" class="form-control" name="email" id="email" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<input type="text" value="" placeholder="Konu" data-msg-required="Lütfen konu giriniz." maxlength="100" class="form-control" name="subject" id="subject" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<textarea maxlength="5000" placeholder="Mesajınız *" data-msg-required="Lütfen Mesajınız giriniz." rows="3" class="form-control" name="message" id="message" required></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="submit" value="Gönder" class="btn btn-primary mb-xl" data-loading-text="Loading...">

							<div class="alert alert-success hidden" id="contactSuccess">
								Mesajınızı aldık. Size en kısa sürede dönüş yapacağız.
							</div>

							<div class="alert alert-danger hidden" id="contactError">
								Mesaj gönderilirken bir hata oluştu.
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</section>
</div>

<?php include "footer.php"; ?>


