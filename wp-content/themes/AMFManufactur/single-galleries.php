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
	<div class="container">
		<div class="row wow fadeIn min-height400">
			<div class="gallery_content content col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
				<?php while ( have_posts() ) : the_post(); 
						$sub_heading = get_field( "sub_heading" );
						$description = get_field( "description" );
						$twitter_link = get_field( "twitter_url" );
						$share_link = get_field( "share_url" );
						$images = get_field( "images" );
								?>
					<div class="gallery_heading col-lg-12 col-md-12" >
						<h2 class="black"><?php the_title(); ?></h2>
						<span class="card-text"><?php echo $sub_heading; ?></span>
						<p class="card-text"><?php echo $description; ?></p>
						<div class="share-btn text-center">
						<?php 
								if ( !$pagename && $id > 0 ) {  
								// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object  
								$post = $wp_query->get_queried_object();  
								$pagename = $post->post_name;
								}
						?>
							<a class="twitter-share-button" id="container" target="_parent"
							href="https://twitter.com/intent/tweet?text=<?php echo $pagename; ?>&url=<?php the_permalink(); ?>" data-size="large">
							<button type="button" class="btn btn-primary-black"><?php  echo 'Tweet' ; ?></button></a>

							<!-- AddToAny BEGIN -->
							<a class="a2a_dd" href="https://www.addtoany.com/share"><button type="button" class="btn btn-primary-black"><?php  echo 'Share' ; ?></button></a>
							<script>
							var a2a_config = a2a_config || {};
							a2a_config.onclick = 1;
							a2a_config.num_services = 8;
							</script>
							<script async src="https://static.addtoany.com/menu/page.js"></script>
							<!-- AddToAny END -->
							
							<?php /* <a href="<?php echo $twitter_link; ?>" target="_blank" id="container"><button type="button" class="btn btn-primary-black"><?php  echo 'Tweet' ; ?></button></a>
						
							<a href="<?php echo $share_link; ?>" target="_blank" id="container"><button type="button" class="btn btn-primary-black"><?php  echo 'Share' ; ?></button></a>  */ ?>

						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
			<?php 
				$images = get_field( "images" );
			?>
					<!-- Photo Grid -->
					<section id="photos" class="padding-bottom" class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
					  <?php  foreach( $images as $gallery_images ): ?>
						
						<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
							<a href="<?php echo $gallery_images['sizes']['large']; ?>" itemprop="contentUrl" data-size="<?php echo $gallery_images['sizes']['large-width'].'x'.$gallery_images['sizes']['large-height'];?>">
								<img src="<?php echo $gallery_images['sizes']['medium']; ?>" itemprop="thumbnail" alt="Image description" />
							</a>
						</figure>
					  
					  <?php endforeach; ?>
					</section>
			</div>
		</div>
		
		<!-- Root element of PhotoSwipe. Must have class pswp. -->
		<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
			<!-- Background of PhotoSwipe. 
			It's a separate element, as animating opacity is faster than rgba(). -->
			<div class="pswp__bg"></div>
			<!-- Slides wrapper with overflow:hidden. -->
			<div class="pswp__scroll-wrap">
				<!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
				<!-- don't modify these 3 pswp__item elements, data is added later on. -->
				<div class="pswp__container">
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
					<div class="pswp__item"></div>
				</div>
				<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
				<div class="pswp__ui pswp__ui--hidden">
					<div class="pswp__top-bar">
						<!--  Controls are self-explanatory. Order can be changed. -->
						<div class="pswp__counter"></div>
						<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
						<button class="pswp__button pswp__button--share" title="Share"></button>
						<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
						<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
						<!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
						<!-- element will get class pswp__preloader--active when preloader is running -->
						<div class="pswp__preloader">
							<div class="pswp__preloader__icn">
								<div class="pswp__preloader__cut">
									<div class="pswp__preloader__donut"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
						<div class="pswp__share-tooltip"></div> 
					</div>
					<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
					<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
					<div class="pswp__caption">
						<div class="pswp__caption__center"></div>
					</div>
				</div>
			</div>
		</div>
<?php
	get_template_part( 'template-parts/custom_pagination' );
	get_template_part( 'template-parts/more_posts' );
	get_template_part( 'template-parts/subscription' );
	get_template_part( 'template-parts/sponsers' );

	get_footer(); 
?>
