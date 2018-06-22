<?php /* Template Name: News Posts Template */ ?>
<?php get_header('pages'); 
	global $theme_options;
?>
	<div class="container">
		<div class="row">
			<div class="card-deck news-posts">
				<?php 									 
					$counter = 0;
					$args = array('post_type'=>'news','posts_per_page'=>-1,'paged' => 4);
					$loop = new WP_Query($args);
						if ( $loop->have_posts() ) : 
							while ( $loop->have_posts() ) : $loop->the_post();
								$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
								$terms = wp_get_post_terms(get_the_ID(),'news_category');
								$termID = $terms[0]->term_id; 
								$color = get_term_meta($termID, 'cc_color', true);
					?>
							  <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6 wow fadeIn  hvr-grow load_more padding-bottom " >
								  <div class="card">
									<a href="<?php the_permalink(); ?>" >
										<img class="card-img-top" src="<?php echo $image[0]; ?>" alt="Card image cap">
										<div class="card-block card-block-news">
											<p class="cat_btn" style="background-color:<?php echo $color; ?>"><?php echo $terms[0]->name; ?></p>
											 <span class="card-text"><?php the_excerpt(); ?></span>
										</div>
									</a>
								  </div>
							  </div>
						 <?php 
							$counter++;
							if($counter%4==0){ ?>
						 </div><div class="col-lg-12 card-deck my-posts">
						 <?php } ?>
				<?php  endwhile; ?>
			<?php endif; ?>
			</div>	
			<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 pull-right">
				<div class="more_button pull-right">
					<a href="#" class="hvr-shutter-out-horizontal offer_btn" id="loadMore">Load More</a>
				</div>
			</div>		
		</div>
		<script type="text/javascript">
			/* jQuery(function () {
				jQuery(".load_more").slice(0, 4).show();
				jQuery("#loadMore").on('click', function (e) {
					e.preventDefault();
					jQuery(".load_more:hidden").slice(0, 4).slideDown();
					if (jQuery(".load_more:hidden").length == 0) {
						jQuery("#load").fadeOut('slow');
					}
					jQuery('html,body').animate({
						scrollTop: jQuery(this).offset().top
					}, 1500);
				});
			}); */
		</script>
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
get_footer(); ?>