<?php
/*
Template Name: Radio Page
*/
 get_header('pages'); 
 global $theme_options; 
?>
<div class="container">
	<div id="releases-section" class="row text-center padding-bottom">		
		<div class="card-deck news-posts">
			<?php 
				$args = array('post_type'=>'release','posts_per_page'=>-1);
				$loop = new WP_Query($args); 
					if ( $loop->have_posts() ) : 
						while ( $loop->have_posts() ) : $loop->the_post();
							// check if the flexible content field has rows of data
							if( have_rows('tracks',get_the_ID()) ):
							// loop through the rows of data
								while ( have_rows('tracks',get_the_ID()) ) : the_row(); 
									if( get_row_layout() == 'songs' ): 
					   // echo '<pre>';print_r($layout);echo '</pre>';//die(__FILE__ . ": line " . __LINE__);
			?>
				<?php $track_url = get_sub_field( 'track_url' ); ?>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 post-radio text-center load_more padding-bottom " id="<?php echo $track_url; ?>">
					<?php $featured_img_url = get_sub_field( 'album_cover' ); ?>
					<a href="<?php echo $track_url; ?>" id="track" style="display:none;"></a>
					<div class="card">
						<div class="image" style="background-image:url( <?php echo $featured_img_url; ?> );box-shadow: 0px 0px 10px 0px grey;">
							<i class="play-icon animate circle fa fa-play"></i>
						</div>
						<div class="preview-text text-center">
							<div class="inner">
								<h3 class="padding-bottom"><?php echo get_sub_field( 'title' ); ?></h3>
								<?php $artist_post_ID = get_sub_field( 'artist' ); ?>
								<?php $artist_name = get_the_title( $artist_post_ID ); ?>
								<h5><?php echo $artist_name; ?></h5>
							</div>
						</div>
					</div>
				</div>

			<!--a href="<?php //echo get_post_type_archive_link( 'release' ); ?>" class="button large white">View All</a-->


		<?php endif; ?> 
	<?php  endwhile; ?>
	<?php endif; ?>
		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	<?php  endwhile; ?>
	<?php endif; ?>

		</div>
	</div>
	<div class="row top-buffer">
		<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 pull-right ">
			<div class="more_button pull-right">
				<a href="#" class="hvr-shutter-out-horizontal offer_btn" id="loadMore">Load More</a>
			</div>
		</div>
	</div>

<?php
get_template_part( 'template-parts/subscription' );
get_template_part( 'template-parts/sponsers' );
get_footer(); ?>