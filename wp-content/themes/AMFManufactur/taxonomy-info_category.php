<?php get_header('pages'); 
	global $theme_options;
	$current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
	$slug = $current_page->slug;
	$category 	= get_term_by('slug', $slug, 'info_category');

?>
	<div class="container">
		<div class="row">
			<div class="info_content content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
				<div class="info_heading col-lg-12 col-md-12" >
					<h2><?php echo $category->name ; ?></h2>
					<h4><?php echo $category->taxonomy ; ?> </h4>
					<p><?php echo  $category->description ; ?></p>
				</div>
			</div>
		</div>
		<?php wp_reset_query(); ?>
		<div class="row">
			<div class="card-deck">
				<?php 					 
					$counter = 0;
					if ( have_posts() ) : 
						while ( have_posts() ) : the_post();
							$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
							$termID = wp_get_post_categories(get_the_ID());
							$terms = get_term($termID[0]); 
						?>
							  <div class=" col-lg-3 hvr-grow">
								  <div class="card">
									<a href="<?php the_permalink(); ?>" >
										<img class="card-img-top" src="<?php echo $image[0]; ?>" alt="Card image cap">
										<div class="card-block card-block-info">
											<p class="cat_btn"><?php echo $category->name; ?></p>
											<h3 class="card-title"><?php the_title(); ?></h3>
										</div>
									</a>
								  </div>
							  </div>
						 <?php 
							$counter++;
							if($counter%4==0){ ?>
						 </div><div class="col-lg-12 card-deck">
						 <?php } ?>
				<?php  endwhile; ?>
			<?php endif; ?>
			</div>
		</div>
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
get_footer(); ?>