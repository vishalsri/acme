<?php  global $theme_options; ?>
<div class="container">
	<div class="row pull-up">
		<div class="col-lg-7 col-md-7 col-sm-7 wow fadeIn padding-bottom" data-wow-duration="1s" >
			<div class="col7block" style="background-color:<?php echo $theme_options['block_bg_color']; ?>">
				<h1><?php echo $theme_options['first_center_block_heading']; ?></h1>
				<h2><?php echo $theme_options['left-section-subheading']; ?></h2>
				<p class="large"><?php echo $theme_options['left-section-text']; ?></p>
			</div>
		</div>
		<div class="col-lg-5 col-md-5  col-sm-5  wow fadeIn padding-bottom" data-wow-duration="1s" >
			<div class="col4block" style="background-color:<?php echo $theme_options['block_bg_color']; ?>" >
				<?php echo $theme_options['right-section']; ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 text-md-center wow fadeIn padding-bottom" data-wow-duration="1s" >
			<div class="col2block"  style="background-color:<?php echo $theme_options['offer_block_bg_color']; ?>">
				<h1 class=""><?php echo $theme_options['offer_block_heading']; ?></h1>
				<h3><?php echo $theme_options['offer_block_subheading']; ?></h3>
			</div>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-9  wow fadeIn padding-bottom" data-wow-duration="1s" >
			<div class="col10block"  style="background-color:<?php echo $theme_options['offer_block_bg_color']; ?>">
				<div class="col-lg-8 col-md-8  col-sm-8 padding-bottom">
					<h3 class=""><?php echo $theme_options['offer_right_block_heading']; ?></h3>
					<p><?php echo $theme_options['offer_right_block_text']; ?></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
						<a href="<?php echo $theme_options['offer_right_btn_text_link']; ?>" class="hvr-shutter-out-horizontal offer_btn"><?php echo $theme_options['offer_right_btn_text']; ?></a>
				</div>
			</div>
		</div>
	</div>
