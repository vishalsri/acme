<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package AMF Manufactur
 * @subpackage AMF_Manufactur
 */
 
get_header('pages'); 
// $current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
// $slug = $current_page->category_nicename;
// echo '<pre>';print_r($current_page);echo '</pre>';die('here');  
global $theme_options; 
global $post;
$current_post_id = get_the_ID();
?>
	<div class="container">
		<div class="row">
			<div class="cat_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2"  style="background-color:<?php echo $theme_options['category_page_heading_color'];?>">
				<div class="cat_heading " >
					<h2><?php echo $theme_options['category_page_heading']; ?></h2>
					<h4><?php echo $theme_options['category_page_sub_heading']; ?> </h4>
				</div>
			</div>
		</div>
		
		<?php 
			/* $no_of_post = $theme_options['no_of_post_cat'];
			$args = array('post_type'=>'festivalinfo','posts_per_page'=>$no_of_post,'category_name'=>$slug);
			$loop = new WP_Query($args);
			if ( $loop->have_posts() ) :
			$counter = 1;
			$count = 0;
			while ( $loop->have_posts() ) : $loop->the_post();
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');*/
			//echo '<pre>';print_r($values);echo '</pre>';die('here');  
			$values = rwmb_meta( 'posts_list' );
			$counter = 1;
			$count = 0;
			if(!empty($values)){
			foreach ( $values as $value ) {
					//echo $value[0]; // Title
					//echo $value[1]; // Text
					//echo $value[2]; // Images
			if ($counter % 2 == 0):   
		?>
		
		<div class="row cat_posts top-buffer">
			<div class="cat_posts_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
				<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 posts_image" >
					<img src="<?php echo $value[2]; ?>" alt="<?php echo $value[2]; ?>" class="img img-responsive" />
				</div>
				<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 content right_content" >
					<div class="posts_cont">
						<h2><?php echo $value[0]; ?></h2> 
						<p class="black"><?php echo $value[1];?></p>
					</div>
				</div>
			</div>
		</div>
		<?php else: ?>
			<div class="row cat_posts top-buffer">
				<div class="cat_posts_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
					<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 content" >
						<div class="posts_cont">
							<h2><?php echo $value[0];  ?></h2> 
							<p class="black"><?php echo $value[1]; ?></p>
						</div>
					</div>
					<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 posts_image_right" >
						<img src="<?php echo $value[2];  ?>" alt="" class="img img-responsive" />
					</div>
				</div>
			</div>
		<?php	
				endif;
				$count++ ;
				if($count == 2){  
		?>
					<div class="row top-buffer">
						<div class="cat_sub_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 "  style="background-color:<?php echo $theme_options['category_sub_text_background_color'];?>">
							<div class="cat_sub_heading col-lg-12 col-md-12 text-center" >
								<h4><?php echo $theme_options['category_page_sub_text']; ?> </h4>
							</div>
						</div>
					</div>
		<?php  /*  break;  */}
				$counter++ ; 
			} }else{
		?>
			<div class="row top-buffer">
				<div class="cat_sub_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 " >
					<div class="cat_sub_heading col-lg-12 col-md-12 text-center" >
						<h1><?php echo __('Sorry !! No Data is Available to Show .');?></h1>
					</div>
				</div>
			</div>
			<?php } ?>
		<?php
			$next_post =  get_next_post_id( $current_post_id );
			$previous_post =  get_previous_post_id( $current_post_id );
			$image = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post), 'full');
			//echo'<pre>';print_r($next_post);echo'</pre>';
			if ( !empty($previous_post ) ) { ?>	
				<div class="row pre top-buffer">	
					<div>	
					<a href="<?php echo get_permalink( $previous_post ); ?>">
						<div class="col-lg-8 col-md-8  col-lg-offset-2 col-md-offset-2 get_tickets_block no-padding " style="background-color:<?php echo $theme_options['plan_background_color'];?>">
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 no-padding bg_image" style="background-image:url('<?php echo $image[0]; ?>');">			
								</div>
								
								<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 padding40">
									<h2><?php echo $theme_options['plan_next_text']; ?></h2>
									<h3><?php echo get_the_title( $previous_post ); ?></h3>
								</div>
								
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 top_padding40">
									<span><i class="fa fa-chevron-right fa-5x" aria-hidden="true"></i></span>
								</div>
						</div>	
					</a>		
					</div>	
				</div>
			<?php }else{ ?>
		<?php $image_nxt = wp_get_attachment_image_src(get_post_thumbnail_id($next_post), 'full'); ?>
			<div class="row nxt top-buffer">
				<div>	
					<a href="<?php echo get_permalink( $next_post ); ?>">
						<div class="col-lg-8 col-md-8  col-lg-offset-2 col-md-offset-2 get_tickets_block no-padding " style="background-color:<?php echo $theme_options['plan_background_color'];?>">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 no-padding bg_image" style="background-image:url('<?php echo $image_nxt[0]; ?>');">							
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 padding40">
								<h2><?php echo $theme_options['plan_next_text']; ?></h2>
								<h3><a href="<?php echo get_permalink( $next_post ); ?>"><?php echo get_the_title( $next_post ); ?></a></h3>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 top_padding40">
								<span><a href="<?php echo get_permalink( $next_post ); ?>"><i class="fa fa-chevron-right fa-5x" aria-hidden="true"></i></a></span>
							</div>
						</div>	
					</a>		
				</div>	
			</div>
			<?php } ?>
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
get_footer(); ?>
