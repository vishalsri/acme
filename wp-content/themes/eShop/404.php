<?php 
/*The template for displaying 404 pages (not found)*/
get_header('pages'); 
 global $theme_options;
?>
	<div class="container">
		<div class="row wow slideInDown">
			<div class="col-lg-12 col-md-12">
				<div class="col-lg-2 col-md-2"></div>
					<div class="contact_content col-lg-8 col-md-8">
						<section class="error-404 not-found text-center">
							<header class="page-header">
								<h1 class="page-title black"><?php _e( 'Oops! That page can&rsquo;t be found.', 'AMF_Manufactur' ); ?></h1>
							</header>

							<div class="page-content">
								<p class="large-black"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'AMF_Manufactur' ); ?></p>

								<?php get_search_form(); ?>
							</div>
						</section>
					</div>
				<div class="col-lg-2 col-md-2"></div>
			</div>
		</div>
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
	get_footer(); 
?>


			
