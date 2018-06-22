	<?php 
		$args = array( 'post_type' => 'services', 'posts_per_page' => -1 );
		$services = new WP_Query( $args );
		if ( $services->have_posts() ): 
	?>
	<div class="homepage-services">
		<?php while ( $services->have_posts() ) : $services->the_post(); 
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>
			<div class="service-img-container">
				<a href="<?php the_permalink(); ?>">
				   <img class="service-img" src="<?php echo $featured_img_url; ?>"/>
				   <div class="service-text"><?php echo str_replace(' ', '<br />', get_the_title()); ?></div>
				</a>
			</div>
		<?php endwhile; ?>
	</div>
		<?php endif; ?>