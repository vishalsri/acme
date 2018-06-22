<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package AMF Manufactur
 * @subpackage AMF_Manufactur
 */

get_header('pages');
// $current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
// $slug = $current_page->category_nicename;
// echo '<pre>';print_r($current_page);echo '</pre>';die('here');

global $theme_options;
global $post;
$current_post_id = get_the_ID();
?>
	<div class="container test">
		<div class="row padding-bottom">
			<div class="cat_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2"  style="background-color:<?php echo $theme_options['category_page_heading_color'];?>">
				<div class="cat_heading col-lg-12 col-md-12">

					<?php $categories = get_the_terms( $next_post, 'info_category' ); ?>
					<?php //create string of categories ?>
					<?php $category_names = ''; ?>

					<?php foreach ( $categories as $category ) : ?>
						<?php $category_names .= $category->name . ', ' ?>

					<?php endforeach; ?>
					<?php $category_names = rtrim( $category_names, ', ' ); //trim traling ' ,'; ?>

					<h2 class="text-sm-center "><?php echo get_the_title(); ?></h2>
					<h3 class="text-sm-center "><?php echo $category_names ?> </h3>
				</div>
			</div>
		</div>

		<?php
			/* $no_of_post = $theme_options['no_of_post_cat'];
			$args = array('post_type'=>'festivalinfo','posts_per_page'=>$no_of_post,'category_name'=>$slug);
			$loop = new WP_Query($args);
			if ( $loop->have_posts() ) :
			$counter = 1;
			$count = 0;
			while ( $loop->have_posts() ) : $loop->the_post();
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');*/
			//echo '<pre>';print_r($values);echo '</pre>';die('here');

			// check if the flexible content field has rows of data
			if( have_rows('block') ):

			     // loop through the rows of data
			    while ( have_rows('block') ) : the_row(); ?>


				<?php if( get_row_layout() == 'center_block' ): ?>

					<div class="row cat_posts top-buffer padding-bottom">
						<div class="cat_posts_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">

							<div class="col-sm-12 col-lg-10 col-lg-offset-1 col-xl-8 col-xl-offset-2 content right_content" >
								<div class="posts_cont">
									<h2><?php echo get_sub_field( 'title' ); ?></h2>
									<p class="black"><?php echo get_sub_field( 'text' ); ?></p>

									<?php $file 		= get_sub_field('add_a_download') ? get_sub_field('file') : ''; ?>
									<?php $download_cta = get_sub_field( 'download_text' ) ? get_sub_field( 'download_text' ) : 'Download here!'; ?>

									<?php if( $file != '' ): ?>
										<p><a href="<?php echo $file['url']; ?>" target="_blank"><?php echo $download_cta; ?></a></p>
									<?php endif; ?>

								</div>
							</div>



						</div>
					</div>




				<?php elseif( get_row_layout() == 'left_image_block' ): ?>

						<div class="row cat_posts top-buffer padding-bottom">
							<div class="cat_posts_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">

								<div class="col-lg-8 col-md-8 col-lg-push-4 col-sm-12 col-xs-12 col-md-push-4 content right_content" >
									<div class="posts_cont">
										<h2><?php echo get_sub_field( 'title' ); ?></h2>
										<p class="black"><?php echo get_sub_field( 'text' ); ?></p>

										<?php $file 		= get_sub_field('add_a_download') ? get_sub_field('file') : ''; ?>
										<?php $download_cta = get_sub_field( 'download_text' ) ? get_sub_field( 'download_text' ) : 'Download here!'; ?>

										<?php if( $file != '' ): ?>
											<p><a href="<?php echo $file['url']; ?>" target="_blank"><?php echo $download_cta; ?></a></p>
										<?php endif; ?>

									</div>
								</div>

								<?php $image = get_sub_field( 'image' ); ?>
                                <div class="col-lg-7 col-md-7 col col-lg-pull-7 col-md-pull-7  posts_image info-image">
									<img src="<?php echo $image['sizes']['large'] ?>" alt="" class="img img-responsive" />
									<?php if ( get_sub_field( 'second_image') ) : ?>
										<?php $image = get_sub_field( 'image_2' ); ?>
											<img src="<?php echo $image['sizes']['large'] ?>" alt="" class="img img-responsive" />
									<?php endif; ?>
								</div>

								<!-- <?php if ( get_sub_field( 'second_image') ) : ?>
									<?php $image = get_sub_field( 'image_2' ); ?>

                               		<div class="col-lg-7 col-md-7 col col-sm-pull-7 posts_image info-image">
										<img src="<?php echo $image['sizes']['large'] ?>" alt="" class="img img-responsive" />
									</div>
								<?php endif; ?> -->


							</div>
						</div>

			        <?php elseif( get_row_layout() == 'right_image_block' ): ?>
						<div class="row cat_posts top-buffer padding-bottom">
							<div class="cat_posts_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
								<div class="col-lg-9 col-md-9 content" >
									<div class="posts_cont">
										<h2><?php echo get_sub_field( 'title' ); ?></h2>
										<p class="black"><?php echo get_sub_field( 'text' ); ?></p>

										<?php $file 		= get_sub_field('add_a_download') ? get_sub_field('file') : ''; ?>
										<?php $download_cta = get_sub_field( 'download_text' ) ? get_sub_field( 'download_text' ) : 'Download here!'; ?>

										<?php if( $file ): ?>
											<p><a href="<?php echo $file['url']; ?>" target="_blank"><?php echo $download_cta; ?></a></p>
										<?php endif; ?>
									</div>
								</div>
                                <?php $image = get_sub_field( 'image' ); ?>
								<div class="col-lg-7 col-md-7 posts_image_right info-image">
									<img src="<?php echo $image['sizes']['large'] ?>" alt="" class="img img-responsive" />
									<?php if ( get_sub_field( 'second_image') ) : ?>
										<?php $image = get_sub_field( 'image_2' ); ?>
											<img src="<?php echo $image['sizes']['large'] ?>" alt="" class="img img-responsive" />
									<?php endif; ?>
								</div>
								<!-- <?php if ( get_sub_field( 'second_image') ) : ?>
									<?php $image = get_sub_field( 'image_2' ); ?>

									<div class="col-lg-7 col-md-7 posts_image_right info-image">
										<img src="<?php echo $image['sizes']['large'] ?>" alt="" class="img img-responsive" />
									</div>
								<?php endif; ?> -->
							</div>
						</div>

			     	<?php elseif( get_row_layout() == 'text_block_cta' ): ?>
			     		<?php $target = get_sub_field( 'open_in_new_window' ) == true ? '_blank' : ''; ?>
						<div class="row top-buffer padding-bottom">
							<a href="<?php echo get_sub_field( 'link' ); ?>" target="<?php echo $target; ?>">
								<div class="cat_sub_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 "  style="background-color:<?php echo $theme_options['category_sub_text_background_color'];?>">
									<div class="cat_sub_heading col-lg-12 col-md-12 text-center" >
										<h4><?php echo get_sub_field( 'text' ); ?></h4>
									</div>
								</div>
							</a>
						</div>
			        <?php endif;

			    endwhile;

			else :

			    // no layouts found

			endif;
			?>

		<?php
			get_template_part( 'template-parts/custom_pagination' );
			
			/* $next_post 		= get_adjacent_post( false, '', false );//get_next_post_id( $current_post_id );
			$previous_post 	= get_adjacent_post(false, '', true ) ; //get_previous_post_id( $current_post_id );
			$image 			= wp_get_attachment_image_src(get_post_thumbnail_id( $previous_post ), 'full');
			// echo'<pre>';print_r($next_post);echo'</pre>';
			if ( !empty($previous_post ) ) : ?>
				<div class="row pre top-buffer">

					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 get_tickets_block no-padding ">

						<div class="col-lg-2 col-md-2 no-padding bg_image" style="background-image:url('<?php echo $image[0]; ?>');">
						</div>

						<div class="col-lg-9 col-md-9 padding40">
							<?php $categories = get_the_terms( $previous_post, 'info_category' ); ?>
							<?php $category_names = ''; ?>

							<?php //create string of categories ?>
							<?php $category_names = ''; ?>

							<?php foreach ( $categories as $category ) : ?>
								<?php $category_names .= $category->name . ', ' ?>

							<?php endforeach; ?>
							<?php $category_names = rtrim( $category_names, ', ' ); //trim traling ' ,'; ?>


							<h2><?php echo get_the_title( $previous_post); ?></h2>
							<h3><a href="<?php echo get_permalink( $previous_post ); ?>"><?php echo $category_names; ?></a></h3>
						</div>
						<div class="col-lg-1 col-md-1 top_padding40">
							<span><a href="<?php echo get_permalink( $previous_post ); ?>"><i class="fa fa-chevron-right fa-5x" aria-hidden="true"></i></a></span>
						</div>


					</div>
				</div>
		<?php else: ?>
		<?php $image_nxt = wp_get_attachment_image_src(get_post_thumbnail_id($next_post), 'full'); ?>
				<div class="row nxt top-buffer">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 get_tickets_block no-padding ">
						<div class="col-lg-2 col-md-2 no-padding bg_image" style="background-image:url('<?php echo $image_nxt[0]; ?>');">
						</div>
						<div class="col-lg-9 col-md-9 padding40">
							<?php $categories = get_the_terms( $next_post, 'info_category' ); ?>

							<?php //create string of categories ?>
							<?php $category_names = ''; ?>

							<?php foreach ( $categories as $category ) : ?>
								<?php $category_names .= $category->name . ', ' ?>

							<?php endforeach; ?>
							<?php $category_names = rtrim( $category_names, ', ' ); //trim traling ' ,'; ?>
							<h2><?php echo get_the_title( $next_post ); ?></h2>
							<h3><a href="<?php echo get_permalink( $next_post ); ?>"><?php echo $category_names; ?></a></h3>
						</div>
						<div class="col-lg-1 col-md-1 top_padding40">
							<span><a href="<?php echo get_permalink( $next_post ); ?>"><i class="fa fa-chevron-right fa-5x" aria-hidden="true"></i></a></span>
						</div>
					</div>
				</div>
		<?php endif; */

/*

			$values = rwmb_meta( 'posts_list' );
			$counter = 1;
			$count = 0;
			if(!empty($values)){
			foreach ( $values as $value ) {
					//echo $value[0]; // Title
					//echo $value[1]; // Text
					//echo $value[2]; // Images
			if ($counter % 2 == 0):
		?>

		<div class="row cat_posts top-buffer">
			<div class="cat_posts_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
				<div class="col-lg-7 col-md-7 posts_image" >
					<img src="<?php echo $value[2]; ?>" alt="" class="img img-responsive" />
				</div>
				<div class="col-lg-8 col-md-8 content right_content" >
					<div class="posts_cont">
						<h2><?php echo $value[0]; ?></h2>
						<p class="black"><?php echo $value[1];?></p>
					</div>
				</div>
			</div>
		</div>
		<?php else: ?>
			<div class="row cat_posts top-buffer">
				<div class="cat_posts_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
					<div class="col-lg-9 col-md-9 content" >
						<div class="posts_cont">
							<h2><?php echo $value[0];  ?></h2>
							<p class="black"><?php echo $value[1]; ?></p>
						</div>
					</div>
					<div class="col-lg-7 col-md-7 posts_image_right" >
						<img src="<?php echo $value[2];  ?>" alt="" class="img img-responsive" />
					</div>
				</div>
			</div>
		<?php
				endif;
				$count++ ;
				if($count%2==0){
		?>
					<div class="row top-buffer">
						<div class="cat_sub_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 "  style="background-color:<?php echo $theme_options['category_sub_text_background_color'];?>">
							<div class="cat_sub_heading col-lg-12 col-md-12 text-center" >
								<h4><?php echo $theme_options['category_page_sub_text']; ?> </h4>
							</div>
						</div>
					</div>
		<?php  /*  break;  */ //}
		/*
				$counter++ ;
			} }else{
		?>
			<div class="row top-buffer">
				<div class="cat_sub_content col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 " >
					<div class="cat_sub_heading col-lg-12 col-md-12 text-center" >
						<h1><?php echo __('Sorry !! No Data is Available to Show .');?></h1>
					</div>
				</div>
			</div>
			<?php } ?>
		<?php
			$next_post =  get_next_post_id( $current_post_id );
			$previous_post =  get_previous_post_id( $current_post_id );
			$image = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post), 'full');
			//echo'<pre>';print_r($next_post);echo'</pre>';
			if ( !empty($previous_post ) ) : ?>
				<div class="row pre top-buffer">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 get_tickets_block no-padding " style="background-color:<?php echo $theme_options['plan_background_color'];?>">
						<div class="col-lg-2 col-md-2 no-padding bg_image" style="background-image:url('<?php echo $image[0]; ?>');">
						</div>
						<div class="col-lg-9 col-md-9 padding40">
							<h2><?php echo $theme_options['plan_next_text']; ?></h2>
							<h3><a href="<?php echo get_permalink( $previous_post ); ?>"><?php echo get_the_title( $previous_post ); ?></a></h3>
						</div>
						<div class="col-lg-1 col-md-1 top_padding40">
							<span><a href="<?php echo get_permalink( $previous_post ); ?>"><i class="fa fa-chevron-right fa-5x" aria-hidden="true"></i></a></span>
						</div>
					</div>
				</div>
		<?php else: ?>
		<?php $image_nxt = wp_get_attachment_image_src(get_post_thumbnail_id($next_post), 'full'); ?>
				<div class="row nxt top-buffer">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 get_tickets_block no-padding " style="background-color:<?php echo $theme_options['plan_background_color'];?>">
						<div class="col-lg-2 col-md-2 no-padding bg_image" style="background-image:url('<?php echo $image_nxt[0]; ?>');">
						</div>
						<div class="col-lg-9 col-md-9 padding40">
							<h2><?php echo $theme_options['plan_next_text']; ?></h2>
							<h3><a href="<?php echo get_permalink( $next_post ); ?>"><?php echo get_the_title( $next_post ); ?></a></h3>
						</div>
						<div class="col-lg-1 col-md-1 top_padding40">
							<span><a href="<?php echo get_permalink( $next_post ); ?>"><i class="fa fa-chevron-right fa-5x" aria-hidden="true"></i></a></span>
						</div>
					</div>
				</div>
		<?php endif; */?>
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
get_footer(); ?>
