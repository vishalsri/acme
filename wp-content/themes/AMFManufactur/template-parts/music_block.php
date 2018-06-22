<?php  global $theme_options; ?>
	<div class="row ">
		<div class="col-lg-7 col-md-7 wow fadeIn padding-bottom" data-wow-duration="1s">
			<div class="music_img">
				<img src="<?php echo $theme_options['music_image']['url']; ?>" alt="music_img" class="img-responsive">
			</div>
		</div>
		<div class="col-lg-5 col-md-5  text-center wow fadeIn padding-bottom" data-wow-duration="1s" >
			<div class="music_radio" style="background-color:<?php echo $theme_options['music_block_bg_color']; ?>">
				<div class="radio_heading" >
					<div class="playlist_heading">
						<h3><?php echo $theme_options['music_block_heading']; ?></h3>
					</div>
				</div>
				<div class="spotify_playlist">
					<?php echo $theme_options['music_block_iframe']; ?>
				</div>
			</div>
		</div>
	</div>
