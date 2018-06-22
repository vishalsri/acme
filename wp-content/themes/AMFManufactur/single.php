<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package AMF Manufactur
 * @since AMF Manufactur 1.0
 */
 
get_header('pages'); ?>
	<div class="container">
		<div class="row">
			<div class="info_content content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
				<div class="info_heading col-lg-12 col-md-12" >
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="contact_heading col-lg-12 col-md-12 " >
							<h2><?php the_title(); ?></h2>
								<?php the_date( 'd F Y', '<h4>', '</h4>', true ); ?>
								<?php the_content(); ?>
								<div class="share-btn text-center">
								<?php 
									$pagename = get_query_var('pagename');  	
									if ( !$pagename && $id > 0 ) {  
										// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object  
										$post = $wp_query->get_queried_object();  
										$pagename = $post->post_name;
									}
								?>
									<a class="twitter-share-button" id="container" target="_parent"
									  href="https://twitter.com/intent/tweet?text=<?php echo $pagename; ?>&url=<?php the_permalink(); ?>" data-size="large">
									<button type="button" class="btn btn-primary-black"><?php  echo 'Tweet' ; ?></button></a>
								
									<!-- AddToAny BEGIN -->
									<a class="a2a_dd" href="https://www.addtoany.com/share"><button type="button" class="btn btn-primary-black"><?php  echo 'Share' ; ?></button></a>
									<script>
									var a2a_config = a2a_config || {};
									a2a_config.onclick = 1;
									a2a_config.num_services = 8;
									</script>
									<script async src="https://static.addtoany.com/menu/page.js"></script>
									<!-- AddToAny END -->
								</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>

<?php 
	get_template_part( 'template-parts/custom_pagination' );
	get_template_part( 'template-parts/more_posts' );
	get_template_part( 'template-parts/sponsers' );
	get_footer(); 
?>
