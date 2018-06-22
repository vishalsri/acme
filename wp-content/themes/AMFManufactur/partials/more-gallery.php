<?php 
	$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
	$sub_heading = get_field( "sub_heading" );
	$images = get_field( "images" );
	// echo '<pre>';print_r($gallery_images);echo '</pre>';//die(__FILE__ . ": line " . __LINE__);
?>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn  hvr-grow padding-bottom">
		<div class="card gallery_card">
			<a href="<?php the_permalink(); ?>" >
			<?php 
				$count= 0; 
				$img_count = count($images);
					foreach( $images as $gallery_images ): 
			?>
					<div class="<?php if($img_count == 1){echo 'col-lg-12 col-md-12 col-sm-12 col-xs-12 ';}else{echo 'col-lg-6 col-md-6 col-sm-6 col-xs-6';} ;?>" style="display: inline-block;">
						<div  class="<?php if($count < 1){echo 'card-block-galleries-single-img';}else{echo 'card-block-galleries-3-img';} ;?>" style="
							background-image:url('<?php echo $gallery_images['url']; ?>');<?php if($img_count == 2){echo "min-height:310px;";}?>						
							">
						</div>
					</div>
			<?php $count++; ?>
			<?php if($count ==3 )break; endforeach; ?>
				<div class="card-block card-block-galleries text-center">
					<h3 class="card-text"><?php the_title(); ?></h3>
					<span class="card-text"><?php echo $sub_heading; ?></span>
				</div>
			</a>
		</div>
	</div>