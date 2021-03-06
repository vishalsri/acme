<?php /* Template Name: Info Posts Template */ ?>
<?php get_header('pages'); 
 global $theme_options;
?>
	<div class="container">
		<div class="row">
			<div class="info_content content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
				<div class="info_heading col-lg-12 col-md-12" >
					<h2><?php echo $theme_options['info_page_heading']; ?></h2>
					<h4><?php echo $theme_options['info_page_sub_heading']; ?> </h4>
					<p><?php echo $theme_options['info_page_sub_text']; ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card-deck">
				<?php 
					//$id = $theme_options['festivalinfo_section_posts'];
					/* $categories = get_categories( array(
						'orderby' => 'name',
						'parent'  => 0
					) ); */
					 
					$counter = 0;
					// foreach ( $categories as $category ) {
						/* printf( '<a href="%1$s">%2$s</a><br />',
							esc_url( get_category_link( $category->term_id ) ),
							esc_html( $category->description )
						); */
					
					// echo '<pre>';print_r();echo '</pre>';die('here'); 
					//  $no_of_post = $theme_options['no_of_post'];
					/*<div class="card col-lg-3">
						<a href="<?php echo get_category_link( $category->term_id ); ?>" >
							<img class="card-img-top" src="<?php echo z_taxonomy_image_url($category->term_id); ?>" alt="Card image cap">
							<div class="card-block card-block-info">
								<p class="cat_btn"><?php echo $category->name; ?></p>
								<h3 class="card-title"><?php echo $category->description; ?></h3>
							</div>
						</a>
					  </div> */
					$args = array('post_type'=>'festival_info','posts_per_page'=>-1);
					$loop = new WP_Query($args);
					while ( $loop->have_posts() ) : $loop->the_post();
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
					$termID = wp_get_post_categories(get_the_ID());
					$terms = get_term($termID[0]); 
				?>
					  <div class=" col-lg-3 hvr-grow">
						  <div class="card">
							<a href="<?php the_permalink(); ?>" >
								<img class="card-img-top" src="<?php echo $image[0]; ?>" alt="Card image cap">
								<div class="card-block card-block-info">
									<p class="cat_btn"><?php echo $terms->name; ?></p>
									<h3 class="card-title"><?php the_title(); ?></h3>
								</div>
							</a>
						  </div>
					  </div>
				 <?php 
					$counter++;
					if($counter%4==0){ ?>
				 </div><div class="col-lg-12 card-deck">
				 <?php }//} ?>
				<?php  endwhile; ?>
			</div>
		</div>
			<div class="row"> 
				<a href="<?php echo $theme_options['service_text_link']; ?>">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 get_tickets_block no-padding" style="background-color:<?php echo $theme_options['service_background_color'];?>">
						<div class="col-lg-2 col-md-2 no-padding" style="background-image:url('<?php echo $theme_options['service_images']['url'];?>');background-position: center center;background-repeat: no-repeat;background-size: cover;">			 				
						</div>
						<div class="col-lg-9 col-md-9 padding40">
							<h2><?php echo $theme_options['service_next_text']; ?></h2>
							<h3><?php echo $theme_options['service_text']; ?></h3>
						</div>
						<div class="col-lg-1 col-md-1 top_padding40">
							<span><i class="fa fa-chevron-right fa-5x" aria-hidden="true"></i></span>
						</div>
					</div>
				</a>
		</div> 
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
get_footer(); ?>