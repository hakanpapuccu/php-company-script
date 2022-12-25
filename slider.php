<div role="main" class="main">
	<div class="slider-container rev_slider_wrapper" style="height: 650px;">
		<div id="revolutionSlider" class="slider rev_slider manual">
			<ul>
				
				<?php 

				$slidersor=$db->prepare("select * from slider where durum=:durum");
				$slidersor->execute(array(
				'durum'=>1
				));
				while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {


				?>

					<li data-transition="fade" data-title="<?php echo $ayarcek['ayar_author']; ?>" data-thumb="img/<?php echo $slidercek['yol']; ?>">

						<img src="img/<?php echo $slidercek['yol']; ?>"  
						alt=""
						data-bgposition="center center" 
						data-bgfit="cover" 
						data-bgrepeat="no-repeat"
						class="rev-slidebg">
					</li>

				<?php } ?>

				</ul>

			</div>
		</div>
	</div>