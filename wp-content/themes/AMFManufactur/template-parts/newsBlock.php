<?php  
	global $theme_options;
	$id = $theme_options['news_section_posts'];
	$args = array('post_type'=>'news','posts_per_page'=>4,'post__in'=>$id);
	$loop = new WP_Query($args);
	if($theme_options['full_news_section']== 'show'){ 
?>
	<div class="row newsblock">
		<div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 ">
			<div class="posts">
				<h1><?php echo $theme_options['news_title']; ?></h1>
			</div>
		</div>
		<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12  ">
			<div class="more_button pull-right" >
				<a href="<?php echo $theme_options['news_right_btn_text_link']; ?>" class="hvr-shutter-out-horizontal offer_btn btn_dul"><?php echo $theme_options['news_right_btn_text']; ?></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="card-deck">
		
			<?php
				$count=1;
				while ( $loop->have_posts() ) : $loop->the_post();
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
				$termID = wp_get_post_categories(get_the_ID());
				$terms = get_term($termID[0]);
				$color = get_term_meta($termID[0], 'cc_color', true);
				//echo '<pre>';print_r($color);echo '</pre>';die('here');
			?>
			  <div class=" col-lg-3 col-md-3 col-sm-12 wow fadeIn  hvr-grow" >
				  <div class="card" >
					<a href="<?php the_permalink(); ?>" >
						<img class="card-img-top" src="<?php echo $image[0]; ?>" alt="Card image cap">
						<div class="card-block card-block-news">
							<p class="cat_btn" style="background-color:<?php echo $color; ?>"><?php echo $terms->name; ?></p>
						  <span class="card-text"><?php the_excerpt(); ?></span>
						</div>
					</a>
				  </div>
			  </div>  
			<?php 
					$count++;
					endwhile;
			?>
		</div>
	</div>
	<?php } ?>