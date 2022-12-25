<?php 
include "header.php"; 
$hakkimizdasor=$db->prepare("select * from hakkimizda where id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>

			<div role="main" class="main">
				<div class="container">
					<div class="row pt-xl">
						<div class="col-md-7">
							<h1 class="mt-xl mb-none"><?php echo $hakkimizdacek['baslik']; ?></h1>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>
							<p><?php echo $hakkimizdacek['icerik']; ?></p>
						</div>
						<div class="col-md-4 col-md-offset-1">

							<h4 class="mt-xl mb-none">Tanıtım Videomuz</h4>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>

							<div class="embed-responsive embed-responsive-16by9 mb-xl">
								<?php echo $hakkimizdacek['video']; ?>
							</div>

							<h4 class="mt-xlg">Misyonumuz</h4>

							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>

							<blockquote class="blockquote-secondary">
								<p class="font-size-lg"><?php echo $hakkimizdacek['misyon']; ?></p>
							</blockquote>

							<h4 class="mt-xlg">Vizyonumuz</h4>

							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>

							<blockquote class="blockquote-secondary">
								<p class="font-size-lg"><?php echo $hakkimizdacek['vizyon']; ?></p>
							</blockquote>

							


						</div>
					</div>
				</div>
			</div>

<?php include "footer.php"; ?>