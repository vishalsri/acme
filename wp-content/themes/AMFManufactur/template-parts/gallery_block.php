<?php global $theme_options;
//echo '<pre>';print_r($theme_options['gallery_image']);echo '</pre>';
?>
	<div class="row gallery_section">
		<div class="col-lg-4 col-md-4 col-sm-12 text-center wow fadeIn padding-bottom">
			<div class="gallery_box" style="background-image: url('<?php echo $theme_options['gallery_image']['background-image']; ?>'); background-position: <?php echo $theme_options['gallery_image']['background-position']; ?>; background-size: <?php echo $theme_options['gallery_image']['background-size']; ?>;">
				<!-- Hidden for now - need to make it so you can link to posts here -->
				<!-- <div class="gallery_heading">
					<h2><?php echo get_the_title($theme_options['gallery_page']); ?></h2>
				</div>
				<a href="<?php echo get_the_permalink($theme_options['gallery_page']);  ?>" class="hvr-shutter-out-horizontal offer_btn btn-pad">View</a> -->
			</div>
		</div>
		<div class="col-lg-8 col-md-8  wow fadeIn padding-bottom" id="gallery_video" >
		<?php if($theme_options['video_section'] == 'video'){?>
			<div class="gallery_video" >
				<div class="video_bg" style="background-image: url('<?php echo $theme_options['video_block_image']['background-image']; ?>'); background-position: <?php echo $theme_options['video_block_image']['background-position']; ?>; background-size: <?php echo $theme_options['video_block_image']['background-size']; ?>;">
				</div>
				<div class="video-overlay-banner">

					<div id="play" >
						<?php if(!empty($theme_options['play_img']['url'])){ ?>
							<img class="play_svg_org" src="<?php echo $theme_options['play_img']['url']; ?>" alt="play" />
							<img class="play_svg_hover" src="<?php echo $theme_options['play_img_hover']['url']; ?>" alt="play" />
						<?php }else{ ?>
							<i class="fa fa-play-circle fa-2x"></i>
						<?php } ?>
					</div>
					<h3><?php echo $theme_options['video_title']; ?></h3>

				</div>
				<div id="videosList" class="video embed-responsive embed-responsive-4by3">
					<iframe src="<?php echo $theme_options['gallery_block_iframe']; ?>" class="embed-responsive-item" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
				</div>

			</div>
		<?php }else{ ?>
			<div class="gallery_video" >
				<div class="video_bg" style="background-image: url('<?php echo $theme_options['video_block_image']['background-image']; ?>'); background-position: <?php echo $theme_options['video_block_image']['background-position']; ?>; background-size: <?php echo $theme_options['video_block_image']['background-size']; ?>;">
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
