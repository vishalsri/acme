<?php 
	global $theme_options;
	$args = array( 'post_type' => 'work', 'posts_per_page' => 4 );
	$work = new WP_Query( $args );
	if ( $work->have_posts() ): 
?>
				  <div class="homepage-featured" id="home-featured">
					 <div class="container">
						<div class="text">
						   <h2 class="secondary"><?php echo $theme_options['center_heading']; ?></h2>
						   <div class="sub-title">
							  <p><span class=""><?php echo $theme_options['center-section-text']; ?></span></p>
						   </div>
						</div>
					 </div>
					 <div class="container-fluid">
						<div class="home-featured row" style="height: auto !important">
						   <!-- <div class="row"> -->
						   <?php while ( $work->have_posts() ) : $work->the_post(); 
								$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
								$terms = wp_get_post_terms(get_the_ID(),'work_category');
								$termID = $terms[0]->term_id; 
							?>
						   <div class="homepage-featured-box box cell-buffer col-xs-6" onclick="void(0)" style="position: relative !important">
							  <div class="image">
								 <img src="<?php echo $featured_img_url; ?>" alt="portfolio_images" class="img-responsive visible-xs visible-sm visible-md visible-lg">
								 <!--<img src="" alt="" class="img-responsive visible-xs"> -->
							  </div>
							  <div class="hfi-text">
								 <div class="hfi-text-inner">
									<h3><?php the_title(); ?></h3>
									<div class="hfi-bottom">
									   <p><?php echo $terms[0]->name; ?></p>
									   <a href="<?php the_permalink(); ?>" class="btn btn-view">View Case Study</a>
									</div>
								 </div>
							  </div>
						   </div>
						   <?php endwhile; ?>					   
						   <!-- </div> -->
						</div>
						
						<div class="row">
						   <!--<a href="https://www.eshop.com/work/" class="btn btn-view brandtender-btn col-xs-offset-2 col-xs-8 col-md-offset-4 col-md-4">View Our Work</a>-->
						   <a href="#" class="btn btn-view brandtender-btn col-xs-offset-2 col-xs-8 col-md-offset-4 col-md-4">Talk to a Brandtender</a>
						</div>
					 </div>
					 <a href="#home-approach" class="go-down-arrow grey bounce"></a>
				  </div>
<?php endif; ?>