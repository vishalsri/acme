<?php  
global $theme_options; 
?>
			<div data-path='ethos' data-template="principles">
				<div data-name="menu">Ethos</div>
				<div data-name="frontpage">
					<div data-name="founded"><?php echo $theme_options['top_left_text']; ?></div>
					<div data-name="body"><?php echo $theme_options['shoet_desc']; ?></div>
				</div>
				<div data-name="sections">
					<?php 
						$args = array('post_type'=>'principles','posts_per_page'=>-1);
						$loop = new WP_Query($args);
						if ( $loop->have_posts() ) : 
							while ( $loop->have_posts() ) : $loop->the_post();
								$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
								$canvas_images = get_field( "canvas_name" );
					?>				
					<div data-name="section">
						<div data-name="headline"><?php the_title(); ?></div>
						<div data-name="body"><?php the_content(); ?></div>
						<div data-name="image"><?php echo ($canvas_images != '')? $canvas_images : $image; ?></div>
					</div>
					<?php  endwhile; ?>
					<?php endif; ?>						
				</div>
			</div>
