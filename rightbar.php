<div class="col-md-3">
					<aside class="sidebar">
						<div id="combinationFilters" class="filters">

							<h4 class="mt-xl mb-md">Son Haberler:</h4>
							<ul class="nav nav-list mb-xlg sort-source team-filter-group" data-filter-group="group1">

								<?php 
								$haberlersor=$db->prepare("select * from haberler where durum=:durum order by id DESC limit 10");
								$haberlersor->execute(array(
								'durum'=>1
								));
								while ($haberlercek=$haberlersor->fetch(PDO::FETCH_ASSOC)) { ?>

									<li><a href="haber-detay.php?id=<?php echo $haberlercek['id']; ?>"><?php echo $haberlercek['baslik']; ?></a></li>

								<?php } ?>


								

							</div>

							<h4 class="mt-xl mb-md">Bize Ulaşın</h4>
							<p>Bizimle aşağıdaki form aracılığıyla iletişime geçebilirsiniz.</p>

							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>

							<form id="contactForm" action="php/contact-form.php" method="POST">
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Adınız *</label>
											<input type="text" value="" data-msg-required="Lütfen adınızı giriniz." maxlength="100" class="form-control" name="name" id="name" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>E-posta adresiniz *</label>
											<input type="email" value="" data-msg-required="Lütfen e-posta adresinizi giriniz." data-msg-email="Lütfen geçerli bir e-posta adresi giriniz." maxlength="100" class="form-control" name="email" id="email" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Konu</label>
											<input type="text" value="" maxlength="200" class="form-control" name="subject" id="subject" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Mesaj *</label>
											<textarea maxlength="5000" data-msg-required="Lütfen mesajınızı giriniz." rows="3" class="form-control" name="message" id="message" required></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="submit" value="Gönder" class="btn btn-primary" data-loading-text="Loading...">

										<div class="alert alert-success hidden" id="contactSuccess">
											Mesajınızı aldık. Size en kısa zamanda dönüş yapacağız.
										</div>

										<div class="alert alert-danger hidden" id="contactError">
											Mesaj gönderilirken bir hata oluştu..
										</div>
									</div>
								</div>
							</form>

						</aside>
					</div>