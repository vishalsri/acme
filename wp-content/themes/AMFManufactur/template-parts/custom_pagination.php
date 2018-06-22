<?php
			$next_post 		= get_adjacent_post( false, '', false );//get_next_post_id( $current_post_id );
			$previous_post 	= get_adjacent_post(false, '', true ) ; //get_previous_post_id( $current_post_id );
			$image 			= wp_get_attachment_image_src(get_post_thumbnail_id( $previous_post ), 'full');
			//echo'<pre>';print_r($next_post);echo'</pre>';
			if ( !empty($previous_post ) ) : ?>
				<div class="row pre top-buffer">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 get_tickets_block no-padding ">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 no-padding bg_image" style="background-image:url('<?php echo $image[0]; ?>');">
						</div>
						<div class="col-lg-9 col-md-8 col-sm-8 col-xs-8  padding40">
							<?php $categories = get_the_terms( $previous_post, 'info_category' ); ?>
							<?php $category_names = ''; ?>
							<?php if(!empty($categories)){ ?>
							<?php //create string of categories ?>
							<?php $category_names = ''; ?>

							<?php foreach ( $categories as $category ) : ?>
							<?php $category_names .= $category->name . ', ' ?>

							<?php endforeach; ?>
							<?php $category_names = rtrim( $category_names, ', ' ); //trim traling ' ,'; ?>

							<h2><?php echo get_the_title( $previous_post); ?></h2>
							<h3><a href="<?php echo get_permalink( $previous_post ); ?>"><?php echo $category_names; ?></a></h3>
							<?php }else{ ?>
							<h2><?php echo "Up Next"; ?></h2>
							<h3><a href="<?php echo get_permalink( $previous_post ); ?>"><?php echo get_the_title( $previous_post); ?></a></h3>
							<?php } ?>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 top_padding40">
							<span><a href="<?php echo get_permalink( $previous_post ); ?>"><i class="fa fa-chevron-right fa-5x" aria-hidden="true"></i></a></span>
						</div>
					</div>
				</div>
		<?php else: ?>
		<?php $image_nxt = wp_get_attachment_image_src(get_post_thumbnail_id($next_post), 'full'); ?>
				<div class="row nxt top-buffer">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 get_tickets_block no-padding ">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 no-padding bg_image" style="background-image:url('<?php echo $image_nxt[0]; ?>');">
						</div>
						<div class="col-lg-9 col-md-8 col-sm-8 col-xs-8 padding40">
							<?php $categories = get_the_terms( $next_post, 'info_category' ); ?>
							<?php if(!empty($categories)) { ?>
							<?php //create string of categories ?>
							<?php $category_names = ''; ?>

							<?php foreach ( $categories as $category ) : ?>
							<?php $category_names .= $category->name . ', ' ?>

							<?php endforeach; ?>
							<?php $category_names = rtrim( $category_names, ', ' ); //trim traling ' ,'; ?>
							<h2><?php echo get_the_title( $next_post ); ?></h2>
							<h3><a href="<?php echo get_permalink( $next_post ); ?>"><?php echo $category_names; ?></a></h3>
							<?php }else{ ?>
							
							<h2><?php echo "Up Next"; ?></h2>
							<h3><a href="<?php echo get_permalink( $next_post ); ?>"><?php echo get_the_title( $next_post ); ?></a></h3>
							<?php } ?>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 top_padding40">
							<span><a href="<?php echo get_permalink( $next_post ); ?>"><i class="fa fa-chevron-right fa-5x" aria-hidden="true"></i></a></span>
						</div>
					</div>
				</div>
		<?php endif;