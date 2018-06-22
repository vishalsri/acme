<?php /* Template Name: LineUp Template */ ?>
<?php get_header('pages'); 

		while ( have_posts() ) : the_post();
?>
	<div class="container">
		<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3  lineup_content content text-center"><?php the_content(); ?></div>
		</div>
		<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2  event-poster text-center">
					<?php 	$poster = get_post_meta(get_the_ID(),'AMF_poster',true); 
							$event_poster = wp_get_attachment_image_src($poster, 'full');
						//	echo '<pre>';print_r($theme);echo '</pre>';die('here');
					?>
								
						<img src="<?php echo $event_poster[0]; ?>" alt="event_poster" class="img img-responsive center-block" />
					
					<div class="share-btn">
						<?php 
							$target = get_field( 'open_in_new_window' ) == true ? '_blank' : ''; 
							$twitter_link = get_field( "twitter_link" );
							$share_link = get_field( "share_link" ); 
							$pagename = get_query_var('pagename');  	
							if ( !$pagename && $id > 0 ) {  
								// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object  
								$post = $wp_query->get_queried_object();  
								$pagename = $post->post_name;
							}
						?>
						<?php /* <a href="<?php echo (!empty($twitter_link)?$twitter_link:"#"); ?>" target="<?php echo $target; ?>" id="container"><button type="button" class="btn btn-primary"><?php  echo 'Tweet' ; ?></button></a> */?>
						
						<a class="twitter-share-button" id="container" target="_parent"
						  href="https://twitter.com/intent/tweet?text=<?php echo $pagename; ?>&url=<?php the_permalink(); ?>" data-size="large">
						<button type="button" class="btn btn-primary"><?php  echo 'Tweet' ; ?></button></a>
						
						
						<!-- AddToAny BEGIN -->
						<a class="a2a_dd" href="https://www.addtoany.com/share"><button type="button" class="btn btn-primary"><?php  echo 'Share' ; ?></button></a>
						<script>
						var a2a_config = a2a_config || {};
						a2a_config.onclick = 1;
						a2a_config.num_services = 8;
						</script>
						<script async src="https://static.addtoany.com/menu/page.js"></script>
						<!-- AddToAny END -->

						<?php /*<a href="<?php echo (!empty($share_link)?$share_link:"#"); ?>" target="<?php echo $target; ?>" id="container"><button type="button" class="btn btn-primary"><?php  echo 'Share' ; ?></button></a> */ ?> 

					</div>
				</div>

		</div>
<?php
		endwhile;
		?>
		<div class="row newsblock">
			<div class="col-lg-8 col-sm-12 col-md-8 col-xs-12 posts">
				<h3><?php echo $theme_options['previous_lineup']; ?></h3>
			</div>
		</div>
		<div class="row">
			<div class=" card-deck">
			
				<?php foreach($theme_options['previous_lineups_images'] as $slide){
				?>
					  <div class=" col-lg-3 col-md-3 col-xs-6 col-sm-6  wow hvr-grow padding-bottom">
					  <a href="<?php echo $slide['image']; ?>" data-lightbox="previous_lineup" data-title="<?php echo $slide['title']; ?>" >
						  <div class="card pre_bg_image" style="background-image:url('<?php echo $slide['image']; ?>');">
						  </div>
						</a>
					  </div>
				<?php } ?>
			  <!--div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
					<img class="card-img-top" src="<?php //echo $slide['image']; ?>" alt="Card image cap" />
				  </div--> 
			</div>
		</div>
<?php
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );
get_footer(); ?>