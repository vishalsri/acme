<?php
/*
Template Name: Artists Page
*/
?>
<?php get_header('pages'); 
 global $theme_options;
?>
<div class="container">
	<?php $args = array( 'post_type' => 'artist', 'posts_per_page' => -1 ); ?>
	<?php $artists = new WP_Query( $args ); ?>
	<?php if ( $artists->have_posts() ): ?>
	<div class="row">
		<div class="card-deck">
			<?php while ( $artists->have_posts() ) : $artists->the_post(); ?>
				<div class=" col-lg-3 col-md-3 col-xs-12 col-sm-6 wow padding-bottom">
					<div class="card">
						<?php get_template_part( 'partials/artist','card' ); ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<!--<a href="<?php echo get_post_type_archive_link('artist' ); ?>"class="button large white">View All</a>-->
	</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
<?php
get_template_part( 'template-parts/subscription' );
get_template_part( 'template-parts/sponsers' );
get_footer(); ?>