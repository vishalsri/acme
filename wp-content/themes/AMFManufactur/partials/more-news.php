<?php 
	$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
	$terms = wp_get_post_terms(get_the_ID(),'news_category');
	$termID = $terms[0]->term_id; 
	$color = get_term_meta($termID, 'cc_color', true);
?>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeIn  hvr-grow padding-bottom">
		<div class="card">
			<a href="<?php the_permalink(); ?>" >
				<img class="card-img-top" src="<?php echo $image[0]; ?>" alt="Card image cap">
					<div class="card-block card-block-news">
						<p class="cat_btn" style="background-color:<?php echo $color; ?>"><?php echo $terms[0]->name; ?></p>
						<span class="card-text"><?php the_excerpt(); ?></span>
					</div>
			</a>
		</div>
	</div>