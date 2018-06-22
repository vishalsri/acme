				<div data-path='projects' data-template="projects-0">
					<div data-name="menu">Projects</div>
					<?php 
						$args = array('post_type'=>'work','posts_per_page'=>-1);
						$loop = new WP_Query($args);
						if ( $loop->have_posts() ) : 
							while ( $loop->have_posts() ) : $loop->the_post();
								//Post slug for parallax
								$post_slug = get_post_field( 'post_name', get_post() );
								//Post Feature image
								$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
								//Post Other Images
								$images = get_field( "work_images" );
								//Post Videos
								$videos = get_field( "work_video" );
								//Post Date and Year
								$post_date = get_the_date( 'F j — Y' ); 
								$post_year = get_the_date( 'Y' ); 
								//Post Categories
								$categories = get_the_terms( $next_post, 'work_category' ); 
								$category_names = '';
								foreach ( $categories as $category ) : 
								$category_names .= $category->name . ', ' ;
								endforeach; 
								$category_names = rtrim( $category_names, ', ' ); //trim traling ' ,'; 
					?>
					<div data-path='<?php echo $post_slug; ?>' data-template="case-0" >
						<div data-name="info">
							<div data-name="headline"><?php the_title(); ?></div>
							<div data-name="client"><?php the_title(); ?></div>
							<div data-name="project"><?php echo $category_names; ?></div>
							<div data-name="year"><?php echo $post_year;?></div>
						</div>
						<div data-name="overviewimage"><?php echo $image[0]; ?></div>
						<div data-name="home">
							<div data-name="headline"><?php the_title(); ?></div>
							<div data-name="details"><?php the_tags('', ', </br>', '</br>'); ?></div>
							<div data-name="body"><?php the_content(); ?></div>
						</div>
						<div data-name="modules">
							<?php 
								if(!empty($videos)){
							?>
							<div data-name="moduleVideo" width="854" height="480">
								<div data-name="mode">MANUEL</div> /* MANUEL, AUTOPLAY, AUTOPLAY_ON_SCREEN */
								<div data-name="coverImage"><?php echo $image[0]; ?></div>
								<div data-name="source"><?php echo $videos['url']; ?></div>
							</div>
							<?php } ?>
							<div data-name="moduleText">
								<div data-name="mid">
									<?php the_content(); ?></div>
								<div data-name="bot">
									<?php the_excerpt(); ?>
								</div>
							</div>
							<?php 
								if(!empty($images)){
									foreach( $images as $gallery_images ): 
							?>
							<div data-name="moduleImage" width="3188" height="1800"><?php echo $gallery_images['url']; ?></div>
							
							<?php endforeach;}?>

						</div>
					</div>
					<?php  endwhile; ?>
					<?php endif; ?>	
				</div>
