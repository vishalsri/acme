<?php 
	global $post;
	$post_type = get_post_type(get_the_ID());
	$post_type_data = get_post_type_object( $post_type );
    $post_type_slug = $post_type_data->name;
	$current_post_id[] = get_the_ID();
?>				
		<div class="row top-buffer">
			<div class="card-deck news-posts">
				<div class="col-lg-12">
					<h3>More <?php echo $post_type; ?></h3>
				</div>
			</div>
			<div class="card-deck news-posts">
				<?php 
					$counter = 0;
					$args = array('post_type'=>$post_type_slug,'posts_per_page'=>($post_type_slug == 'galleries')?3:4,'post__not_in' => $current_post_id);
					$loop = new WP_Query($args);
					if ( $loop->have_posts() ) : 
						while ( $loop->have_posts() ) : $loop->the_post();
				?>
				<?php if($post_type_slug == 'galleries'): ?>
					<?php get_template_part( 'partials/more','gallery' ); ?>
				<?php else : //if($post_type_slug == 'news'): ?>
					<?php get_template_part( 'partials/more','news' ); ?>
				<?php endif; ?>
						
				 <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				 <?php $counter++; ?>
					<?php  endwhile; ?>
				<?php endif; ?>
			</div>		
		</div>