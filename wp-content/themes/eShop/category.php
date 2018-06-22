<?php
/**
* A Simple Category Template
*/
 
get_header('pages'); 
$current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
$slug = $current_page->category_nicename;
// echo '<pre>';print_r($current_page);echo '</pre>';die('here');  
global $theme_options;
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="col-lg-2 col-md-2"></div>
					<div class="cat_content col-lg-8 col-md-8"  style="background-color:<?php echo $theme_options['category_page_heading_color'];?>">
						<div class="cat_heading col-lg-12 col-md-12" >
							<h1><?php echo $theme_options['category_page_heading']; ?></h1>
							<h4><?php echo $theme_options['category_page_sub_heading']; ?> </h4>
						</div>
					</div>
				<div class="col-lg-2 col-md-2"></div>
			</div>
		</div>
		
		<?php 
			$no_of_post = $theme_options['no_of_post_cat'];
			$args = array('post_type'=>'festivalinfo','posts_per_page'=>$no_of_post,'category_name'=>$slug);
			$loop = new WP_Query($args);
			if ( $loop->have_posts() ) :
			$counter = 1;
			$count = 0;
			while ( $loop->have_posts() ) : $loop->the_post();
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
			if ($counter % 2 == 0): 
			
		?>
		
		<div class="row cat_posts">
			<div class="col-lg-12 col-md-12">
				<div class="col-lg-2 col-md-2"></div>
					<div class="cat_posts_content col-lg-8 col-md-8">
						<div class="col-lg-6 col-md-6 posts_image" >
							<img src="<?php echo $image[0]; ?>" alt="" class="img img-responsive" />
						</div>
						<div class="col-lg-9 col-md-9 content" >
							<div >
							<a href="<?php the_permalink(); ?>">
								<h2><?php the_title(); ?></h2> 
							</a>
								<?php the_content();?>
							</div>
						</div>
					</div>
				<div class="col-lg-2 col-md-2"></div>
			</div>
		</div>
		<?php else: ?>
			<div class="row cat_posts">
				<div class="col-lg-12 col-md-12">
					<div class="col-lg-2 col-md-2"></div>
						<div class="cat_posts_content col-lg-8 col-md-8">
							<div class="col-lg-9 col-md-9 content" >
								<div >
									<a href="<?php the_permalink(); ?>" >
										<h2><?php the_title(); ?></h2> 
									</a>
									<?php the_content();?>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 posts_image_right" >
								<img src="<?php echo $image[0]; ?>" alt="" class="img img-responsive" />
							</div>
						</div>
					<div class="col-lg-2 col-md-2"></div>
				</div>
			</div>
		<?php	
				endif;
				$count++ ;
				if($count%2==0){ 
		?>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="col-lg-2 col-md-2"></div>
								<div class="cat_sub_content col-lg-8 col-md-8"  style="background-color:<?php echo $theme_options['category_sub_text_background_color'];?>">
									<div class="cat_sub_heading col-lg-12 col-md-12 text-center" >
										<h4><?php echo $theme_options['category_page_sub_text']; ?> </h4>
									</div>
								</div>
							<div class="col-lg-2 col-md-2"></div>
						</div>
					</div>
		<?php }
				$counter++ ;
				endwhile;
				else: 
		?>
				<p class="text-center">Sorry, no posts matched your criteria.</p>
		<?php endif; ?>
		
		
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 get_tickets_block no-padding" style="background-color:<?php echo $theme_options['plan_background_color'];?>">
						<div class="col-lg-4 col-md-4 no-padding" style="background-image:url('<?php echo $theme_options['plan_images']['url'];?>');min-height: 174px;background-position: 100% 29%;background-repeat: no-repeat;background-size: cover;">							
						</div>
						<div class="col-lg-7 col-md-7 padding40">
							<h2><?php echo $theme_options['plan_next_text']; ?></h2>
							<h3><a href="<?php echo $theme_options['plan_text_link']; ?>"><?php echo $theme_options['plan_text']; ?></a></h3>
						</div>
						<div class="col-lg-1 col-md-1 top_padding40">
							<span><a href="<?php echo $theme_options['plan_text_link']; ?>"><i class="fa fa-chevron-right fa-3x" aria-hidden="true"></i></a></span>
						</div>
					</div>
				<div class="col-lg-2 col-md-2"></div>
			</div> 
		</div> 
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
get_footer(); ?>