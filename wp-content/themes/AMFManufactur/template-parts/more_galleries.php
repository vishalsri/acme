		<div class="row top-buffer">
			<div class="card-deck news-posts">
				<div class="col-lg-12">
					<h2>More Galleries</h2>
				</div>
			</div>
			<div class="card-deck news-posts">
				<?php 
				global $post;
				$current_post_id[] = get_the_ID();
				// echo '<pre>';print_r($current_post_id);echo '</pre>';//die(__FILE__ . ": line " . __LINE__);
						$counter = 0;
						$args = array('post_type'=>'galleries','posts_per_page'=>3,'post__not_in' => $current_post_id);
						$loop = new WP_Query($args);
						if ( $loop->have_posts() ) : 
							while ( $loop->have_posts() ) : $loop->the_post();
								$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
								$sub_heading = get_field( "sub_heading" );
								$images = get_field( "images" );
								
								 // echo '<pre>';print_r($gallery_images);echo '</pre>';//die(__FILE__ . ": line " . __LINE__);
					?>
							  <div class="col-lg-4 col-md-4 col-sm-12 wow fadeIn  hvr-grow">
								  <div class="card">
									<a href="<?php the_permalink(); ?>" >
									 <?php $count= 0; 
									 $img_count = count($images);
										foreach( $images as $gallery_images ): 
									?>
												<div class="<?php if($img_count == 1){echo 'col-lg-12 col-md-12 ';}else{echo 'col-lg-6 col-md-6 ';} ;?>" style="display: inline-block;">
													<div  class="<?php if($count < 1){echo 'card-block-galleries-single-img';}else{echo 'card-block-galleries-3-img';} ;?>" style="
														background-image:url('<?php echo $gallery_images['url']; ?>');     
														">
													</div>
												</div>
										<?php $count++; ?>
													
										<?php if($count ==3 )break; endforeach; ?>
										<div class="card-block card-block-galleries text-center">
											 <h3 class="card-text"><?php the_title(); ?></h3>
											 <span class="card-text"><?php echo $sub_heading; ?></span>
										</div>
									</a>
								  </div>
							  </div>
						 <?php 
							$counter++;
							if($counter%4==0){ ?>
						 </div><div class="col-lg-12 card-deck my-posts">
						 <?php } ?>
						 <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php  endwhile; ?>
			<?php endif; ?>
			</div>		
		</div>