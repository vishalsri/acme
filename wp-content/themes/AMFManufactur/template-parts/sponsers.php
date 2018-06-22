<?php  global $theme_options; ?>
	<div class="row sponsers">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="sponsers_slider text-center" >
				<h3><?php echo $theme_options['sponsers_block_title']; ?></h3>
					 <section class="regular slider">
						<?php $counter=0; ?>
						<?php foreach($theme_options['sponsers_block_images'] as $slide){ ?>
							<div class="sponsor">
							  <img src="<?php echo $slide['image']; ?>">
							</div>
						<?php $counter++; } ?>
					  </section>			
			</div>
		</div>
	</div>
	<script>
		/* jQuery(".regular").slick({
			dots: false,
			infinite: false,
			slidesToShow: <?php echo $theme_options['sponsers_block_no_of_images']; ?>,
			slidesToScroll: <?php echo $theme_options['sponsers_block_no_of_images']; ?>,
			prevArrow: false,
			nextArrow: false
		}); */
	</script>