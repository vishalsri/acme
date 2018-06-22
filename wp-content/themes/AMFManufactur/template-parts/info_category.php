<?php
 /*Template Name: New Template
 */
get_header("pages"); ?>
<?php $info_page = get_page_by_title( 'Info' ); ?>
      <div class="container">
		<div class="row">
			<div class="info_content content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
				<div class="info_heading col-lg-12 col-md-12" >
					<h2><?php echo get_the_title( $info_page); ?></h2>
					<h4><?php echo get_field( 'sub_heading', $info_page ); ?> </h4>
					<p><?php echo  get_field( 'description', $info_page ); ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card-deck">
				<?php 
					$terms = get_terms( "info_category" );
					$count = count( $terms );
						if ( $count > 0 ): 
							 foreach ( $terms as $term ) :
							 $get_term_link = get_term_link($term->term_id);
							 //echo '<pre>';print_r($term);echo '</pre>';//die(__FILE__ . ": line " . __LINE__);
				?>
				
					  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hvr-grow padding-bottom">
						  <div class="card">
							<a href="<?php echo $get_term_link; ?>" >
								<img class="card-img-top" src="<?php  if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url($term->term_id); ?>" alt="Card image cap">
								<div class="card-block card-block-info">
									<p class="cat_btn"><?php echo "category"; ?></p>
									<h3 class="card-title"><?php echo $term->name ; ?></h3>
								</div>
							</a>
						  </div>
					  </div>
					  
				<?php  endforeach; ?>
				<?php  endif; ?>
			</div>
		</div>
<?php wp_reset_query(); ?>
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
?>
<?php get_footer(); ?>