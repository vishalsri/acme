<?php  global $theme_options; ?>
<?php $args = array( 'post_type' => 'instagram', 'posts_per_page' => 6 ); ?>
<?php $instagram = new WP_Query( $args ); ?>
<?php if ( $instagram->have_posts() ): ?>

<div class="row instagram text-center">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-bottom" >
		<img src="<?php echo get_template_directory_uri(); ?>/images/instagram.svg">
	</div>
	<div class="padding-bottom instagram-container" style="background-color:<?php //echo $theme_options['insta_block_bg_color']; ?>" >
            
			<?php while ( $instagram->have_posts() ) : $instagram->the_post(); ?>
				
				<div class="cell col-lg-2 col-md-4 col-sm-6 col-xs-6 padding-bottom">
						<?php the_content(); ?>
				</div>

			<?php endwhile; ?>

    </div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-bottom" >
		<a href="//instagram.com/<?php echo get_field( 'instagram_handle', 'option' ); ?>" target="_blank" class="button large white">
			<button type="button" class="btn btn-primary">Follow Us</button>
		</a>
	</div>

</div>
<?php endif; ?>
<?php wp_reset_query(); ?>
	
