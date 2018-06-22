<div class="red-section" id="work-next-red">
  <div class="container">
	 <div class="text">
		<h2>Latest Website Development Works</h2>
		<div class="row">
		<?php 
			$args = array('post_type'=>'work','posts_per_page'=>6);
			$loop = new WP_Query($args);
			if ( $loop->have_posts() ) : 
				while ( $loop->have_posts() ) : $loop->the_post();
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
					// $categories = get_the_terms( $next_post, 'info_category' ); 

					// $category_names = '';
					// foreach ( $categories as $category ) : 
					// $category_names .= $category->name . ', ' 
					// endforeach; 
					// $category_names = rtrim( $category_names, ', ' ); //trim traling ' ,'; 
		?>
		
		   <div class="col-md-6 col-sm-12 col-xs-12">
			  <div class="home-featured-item slideUp">
				 <div class="image">
					<img src="<?php echo $image[0]; ?>" alt="" class="img-responsive">
				 </div>
				 <div class="hfi-text">
					<div class="hfi-text-inner">
					   <h3><?php the_title(); ?></h3>
					   <div class="hfi-bottom">
						  <p><?php echo $category_names; ?></p>
						  <a href="<?php the_permalink(); ?>" class="btn btn-view">View Case Study</a>
					   </div>
					</div>
				 </div>
			  </div>
		   </div>
		<?php  endwhile; ?>
		<?php endif; ?>
		</div>
	 </div>
  </div>
</div>
