<?php

	//Q from Nick D @ Manufactur: how do you edit the Redux settings? need to update the WP backend settings to point at the new post types.
	
	//ANS - We need to change in \wp-content\themes\AMFManufactur\inc\options\sample\sample-config.php .to update the new post type .Currently we update it.
	

	global $theme_options;
	$id = $theme_options['festivalinfo_section_posts'];
	//$args = array('post_type'=>'festivalinfo','posts_per_page'=>4,'post__in'=>$id);

	$args = array('post_type'=>'festival_info','posts_per_page'=>4);

	$loop = new WP_Query($args);
	if($theme_options['full_festival_section']== 'show'){
?>
<style>
.card-block-info::before {
    content: "";
    display: block;
    background: url(<?php echo $theme_options['ship_icon']['url'];?>) repeat-x left bottom;
    position: absolute;
    left: 0;
    right: 0;
    height: 50px;
    top: -50px;
}
</style>
	<div class="row infoblock">
		<div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 ">
			<div class="posts text-sm-center text-xs-center text-md-left padding-bottom">
				<h1><a href="<?php echo $theme_options['festivalinfo_right_btn_text_link']; ?>"><?php echo $theme_options['festivalinfo_title']; ?></a></h1>
			</div>
		</div>
		<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12 ">
			<div class="more_button pull-right hidden-sm hidden-xs">
				<a href="<?php echo $theme_options['festivalinfo_right_btn_text_link']; ?>" class="hvr-shutter-out-horizontal offer_btn btn_dul"><?php echo $theme_options['festivalinfo_right_btn_text']; ?></a>
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
				//echo '<pre>';print_r(get_term($term[0]));echo '</pre>';die('here');
			?>
				  <div class=" col-lg-3 col-md-3 col-xs-6 wow hvr-grow padding-bottom">
					  <div class="card">
						<a href="<?php the_permalink(); ?>" >
							<img class="card-img-top" src="<?php echo $image[0]; ?>" alt="Card image cap">
							<div class="card-block card-block-info">
								<p class="cat_btn" style="background-color:<?php echo $color; ?>"><?php echo $terms->name; ?></p>
							  <h3 class="card-title"><?php the_title(); ?></h3>
							  <p class="card-text"><?php //the_excerpt(); ?></p>
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
