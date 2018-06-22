<?php /* Template Name: Galleries Posts Template */ ?>
<?php get_header('pages'); 
 global $theme_options;
?>
	<div class="container">
		<div class="row">
			<div class="card-deck news-posts">
				<?php 
						$counter = 0;
						$args = array('post_type'=>'galleries','posts_per_page'=>-1,'paged' => 3);
						$loop = new WP_Query($args);
						if ( $loop->have_posts() ) : 
							while ( $loop->have_posts() ) : $loop->the_post();
								$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
								$sub_heading = get_field( "sub_heading" );
								$images = get_field( "images" );
								
								// echo '<pre>';print_r($gallery_images);echo '</pre>';//die(__FILE__ . ": line " . __LINE__);
					?>
							  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 load_more_gallery  hvr-grow padding-bottom">
								  <div class="card gallery_card">
									<a href="<?php the_permalink(); ?>" >
									 <?php $count= 0; 
									 $img_count = count($images);
									// echo '<pre>';print_r(count($images));echo '</pre>';//die(__FILE__ . ": line " . __LINE__);
											foreach( $images as $gallery_images ): 
									?>
												<div class="<?php if($img_count == 1){echo 'col-lg-12 col-md-12 col-sm-12 col-xs-12 ';}else{echo 'col-lg-6 col-md-6 col-sm-6 col-xs-6';} ;?>" style="display: inline-block;">
													<div  class="<?php if($count < 1){echo 'card-block-galleries-single-img';}else{echo 'card-block-galleries-3-img';}  ;?>" style="
														background-image:url('<?php echo $gallery_images['url']; ?>');
														<?php if($img_count == 2){echo "min-height:310px;";}?>     
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
						 <?php 
							$counter++;
							if($counter%3==0){ ?>
						 </div><div class="card-deck news-posts">
						 <?php } ?>
						 <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php  endwhile; ?>
			<?php endif; ?>
			</div>	
			<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 pull-right top-buffer">
				<div class="more_button pull-right">
					<a href="#" class="hvr-shutter-out-horizontal offer_btn" id="loadMore_gallery">Load More</a>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			 // jQuery(function () {
				// jQuery(".load_more_gallery").slice(0, 3).show();
				// jQuery("#loadMore_gallery").on('click', function (e) {
					// e.preventDefault();
					// jQuery(".load_more_gallery:hidden").slice(0, 3).slideDown();
					// if (jQuery(".load_more_gallery:hidden").length == 0) {
						// jQuery("#load").fadeOut('slow');
					// }
					// jQuery('html,body').animate({
						// scrollTop: jQuery(this).offset().top
					// }, 1500);
				// });
			// }); 
		</script>
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
get_footer(); ?>