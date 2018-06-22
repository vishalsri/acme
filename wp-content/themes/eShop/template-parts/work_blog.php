			<div data-path='ethos' data-template="principles">
				<div data-name="menu">Ethos</div>
				<div data-name="frontpage">
					<div data-name="founded">
						eShopGenius® Studio is the Design Director duo of internationally recognized and awarded designers Sebastian Gram & Mathias Høst Normark.
					</div>
					<div data-name="body">At eShopGenius® we use 5 principles that guide and define the type of work we believe in. The principles function as our northern star and inform the choices we make throughout our creative process.</div>
				</div>
				<div data-name="sections">
					<?php 
						$args = array('post_type'=>'principles','posts_per_page'=>-1);
						$loop = new WP_Query($args);
						if ( $loop->have_posts() ) : 
							while ( $loop->have_posts() ) : $loop->the_post();
								$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
								$canvas_images = get_field( "canvas_name" );
								// echo '<pre>';print_r($post_year);echo '</pre>';//die(__FILE__ . ": line " . __LINE__);
					?>				
					<div data-name="section">
						<div data-name="headline"><?php the_title(); ?></div>
						<div data-name="body"><?php the_content(); ?></div>
						<div data-name="image"><?php echo $canvas_images ; ?></div>
					</div>
					<?php  endwhile; ?>
					<?php endif; ?>		
					
					
				</div>
			</div>
