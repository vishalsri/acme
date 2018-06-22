<?php $args = array( 'post_type' => 'instagram', 'posts_per_page' => 6 ); ?>

<?php $instagram = new WP_Query( $args ); ?>
<?php //echo '<pre>';print_r($instagram);echo '</pre>';//die(__FILE__ . ": line " . __LINE__);?>

<?php if ( $instagram->have_posts() ): ?>

<section id="social-section" class="text-center">

    <h1 class="white content-margin-large">
        <span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/instagram.svg"></span>
    </h1>

    <div class="grid-container">
        <div class="grid-x grid-margin-x instagram-container content-margin-large">
            
            <?php while ( $instagram->have_posts() ) : $instagram->the_post(); ?>
				
				<div class="cell medium-2 small-4 content-margin">
								<?php the_content(); ?>
				</div>

            <?php endwhile; ?>

        </div>
    </div>

    <a href="//instagram.com/<?php echo get_field( 'instagram_handle', 'option' ); ?>" target="_blank" class="button large white">Follow Us</a>

</section>

<?php endif; ?>

<?php wp_reset_query(); ?>