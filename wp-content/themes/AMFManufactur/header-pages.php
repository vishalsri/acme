<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package ACME AMF
 * @subpackage acmeAMF
 */
 global $theme_options;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<title>
		<?php
			if ( is_category() ) {
				echo __('Category Archive for &quot;', 'acmeAMF'); single_cat_title(); echo __('&quot; | ', 'acmeAMF'); bloginfo( 'name' );
			} elseif ( is_tag() ) {
				echo __('Tag Archive for &quot;', 'acmeAMF'); single_tag_title(); echo __('&quot; | ', 'acmeAMF'); bloginfo( 'name' );
			} elseif ( is_archive() ) {
				wp_title(''); echo __(' Archive | ', 'acmeAMF'); bloginfo( 'name' );
			} elseif ( is_search() ) {
				echo __('Search for &quot;', 'acmeAMF').wp_specialchars($s).__('&quot; | ', 'acmeAMF'); bloginfo( 'name' );
			} elseif ( is_home() || is_front_page()) {
				bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
			}  elseif ( is_404() ) {
				echo __('Error 404 Not Found | ', 'acmeAMF'); bloginfo( 'name' );
			} elseif ( is_single() ) {
				wp_title('');
			} else {
				echo wp_title( ' | ', false, 'right' ); bloginfo( 'name' );
			}
		?>
	</title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!--link rel="stylesheet" href="https://use.typekit.net/psk2heq.css"-->
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<style>
			<?php if (!empty($theme_options['custom-css'])) { ?>
			<?php echo $theme_options['custom-css']; ?>
			<?php } ?>
		<?php if (!empty($theme_options['top_head_btn'])) { ?>
			.btn-primary {
				color:<?php echo $theme_options['top_head_btn_text']; ?>!important;
				background-color: <?php echo $theme_options['top_head_btn']; ?>!important;
				border-color: <?php echo $theme_options['top_head_btn']; ?>!important;
			}
			.btn-primary:hover {
				color:<?php echo $theme_options['top_head_btn_text_hover']; ?>!important;
				background-color: <?php echo $theme_options['top_head_btn_hover']; ?>!important;
				border-color:<?php echo $theme_options['top_head_btn_hover']; ?>!important;
			}
		<?php } ?>
		.offer_btn:hover {
			border: 2px solid <?php echo $theme_options['animate_btn_border_hover']; ?>!important;
		}
		.offer_btn.hvr-shutter-out-horizontal:before {
			background: <?php echo $theme_options['animate_btn_hover']; ?>!important;
		}
		.btn_dul.hvr-shutter-out-horizontal:before {
			 background: <?php echo $theme_options['black_btn_hover']; ?>!important;
		 }
			.btn-default {
				color: #fff!important;
				background-color: <?php echo $theme_options['normal_btn']; ?>!important;
				border-color: <?php echo $theme_options['normal_btn']; ?>!important;
				border-radius: 0px!important;
			}
			.btn-default:hover {
				background-color: <?php echo $theme_options['normal_btn_hover']; ?>!important;
				border-color:<?php echo $theme_options['normal_btn_hover']; ?>!important;
			}
			.card-block-info::before {
				content: "";
				display: block;
				background: url(<?php echo $theme_options['ship_icon']['url'];?>) repeat-x left bottom;
				position: absolute;
				left: 0;
				right: 0;
				height: 50px;
				top: -48px;
			}
			.col4block  strong {
				color: <?php echo $theme_options['text_color'];?>!important;
				font-weight: normal;
			}
	</style>

	<link rel="icon" type="image/x-icon" href="<?php echo $theme_options['favicon']['url']; ?>">
	<?php wp_head(); ?>
	<script>
		/* jQuery( document ).ready(function() {
			jQuery('ul.top-menu li a').each(function(){
			 var anchor_text  = jQuery(this).text();
			 var converted_text = anchor_text.replace(/\s+/g, '-').toLowerCase();
			 jQuery(this).addClass(converted_text);
			});
		}); */
		jQuery(window).load(function () {
			jQuery('.js-flickity').flickity({
				prevNextButtons: false,
				lazyLoad : 3
			});
			jQuery(window).scroll(function(e) {
			// Get the position of the location where the scroller starts.
			var scroller_anchor = jQuery(".scroller_anchor").offset().top;

			// Check if the user has scrolled and the current position is after the scroller start location and if its not already fixed at the top
			if (jQuery(this).scrollTop() >= scroller_anchor && jQuery('.scroller').css('position') != 'fixed')
			{    // Change the CSS of the scroller to hilight it and fix it at the top of the screen.
				jQuery(".scroller").addClass("sticky_header");

				// Changing the height of the scroller anchor to that of scroller so that there is no change in the overall height of the page.
				jQuery('.scroller_anchor').css('height', '20px');
			}
			else if (jQuery(this).scrollTop() < scroller_anchor && jQuery('.scroller').css('position') != 'relative')
			{    // If the user has scrolled back to the location above the scroller anchor place it back into the content.

				// Change the height of the scroller anchor to 0 and now we will be adding the scroller back to the content.
				jQuery('.scroller_anchor').css('height', '0px');

				// Change the CSS and put it back to its original position.
				jQuery(".scroller").removeClass("sticky_header");
			}
			});
		});
	
	</script>
</head>

<body <?php body_class(); ?>>
	<div class="music-player" style="display:none;">
		<div class="close"><img src="<?php echo get_template_directory_uri(); ?>/images/up-arrow.svg"></div>
		<iframe src="https://open.spotify.com/embed/track/6LKSW0nYUj13BRiJlujw5g" width="300" height="100" frameborder="0" allowtransparency="true" allow="encrypted-media" id="track_iframe" ></iframe>
	</div>
    <?php get_template_part( 'template-parts/slideout-nav' ); ?>
    <div class="" id="overlay-half"></div>

	<div class="container-fluid">
		<div class="row">
			<div class="top-bar">

                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 top-header ">
                    <div class="signup-form-wrapper"><?php echo do_shortcode( '[gravityform id=1 title=false description=false ajax=true]' ); ?></div>
				</div>

                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-6 padding social-icons">
					<a href="<?php echo empty($theme_options['twitter'])? "#": $theme_options['twitter']; ?>" target="_blank"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
					<!-- <a href="<?php echo empty($theme_options['youtube'])? "#": $theme_options['youtube']; ?>" target="_blank"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a> -->
					<a href="<?php echo empty($theme_options['instagram'])? "#": $theme_options['instagram']; ?>" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
					<a href="<?php echo empty($theme_options['facebook'])? "#": $theme_options['facebook']; ?>" target="_blank"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
				</div>

            	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-6 right pull-right top-bar-links">
					<?php if($theme_options['play_music_show_hide'] == 'show'){ ?>
						<?php if(!empty($theme_options['play_music_icon']['url'])){ ?>
						<a href="<?php echo $theme_options['play_music_link']; ?>" class="music_svg" target="_blank">
							<img class="music_svg_org" src="<?php echo $theme_options['play_music_icon']['url']; ?>" alt="play" />
							<img class="music_svg_hvr" src="<?php echo $theme_options['play_music_icon2']['url']; ?>" alt="play" />
						</a>
							<?php }else{ ?>
						<a href="<?php echo $theme_options['play_music_link']; ?>" target="_blank" class="circle">
							<i class="fa fa-music" aria-hidden="true"></i>
						</a>
							<?php } ?>
					<?php } ?>

					<a href="<?php echo $theme_options['top_right_header_text_link']; ?>" target="_blank" class="hidden-xs "><p class="large top_right_header_text"><?php echo $theme_options['top_right_header_text']; ?></p></a>
					<a href="<?php echo $theme_options['top_right_header_btn_text_link']; ?>" target="_blank" class="hidden-xs " id="container"><button type="button" class="btn btn-primary"><?php echo $theme_options['top_right_header_btn_text']; ?></button></a>

				</div>


			</div>
		</div>
		 <div class="scroller_anchor"></div>

		<div class="row pos_rel">


            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <?php
                    //check if the page is the festival info page otherwise do the
                    if ( is_archive() or get_post_type() == 'festival_info' ) :
                        if ( is_post_type_archive ('festival_info') or get_post_type() == 'festival_info' ) : ?>
                            <?php $info_page = get_page_by_title( 'Info' ); ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $info_page ), 'full' ); ?>

                            <div class="" style="background-image:url('<?php echo $image[0]; ?>'); background-position: center;background-size: cover;min-height: 350px;    background-blend-mode: overlay; background-color:rgba(10, 10, 10, 0.44);" ></div>

                        <?php endif; ?>

                    <?php //this needs to be rewritten in readable maintanable code with comments
                    else :
                        if(have_posts())  {
                        while ( have_posts() ) : the_post();
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                            if(!empty($image)){
                        //echo '<pre>';print_r($image);echo '</pre>';die('here');
                    ?>
                        <div class="" style="background-image:url('<?php echo $image[0]; ?>'); background-position: center;background-size: cover;min-height: 350px;    background-blend-mode: overlay; background-color: rgba(10, 10, 10, 0.44);" ></div>
                            <?php }else{ ?>
                            <div class="" style="background-image:url('<?php echo $theme_options['default_page_header']['url']; ?>'); background-position: center;background-size: cover;min-height: 350px;background-blend-mode: overlay; background-color: rgba(10, 10, 10, 0.44);" ></div>
                            <?php } endwhile; } else { ?>
                        <div class="" style="background-image:url('<?php echo $theme_options['default_page_header']['url']; ?>'); background-position: center;background-size: cover;min-height: 350px;    background-blend-mode: overlay;   background-color: rgba(10, 10, 10, 0.44);" ></div>
                    <?php  }?>

                <?php endif; ?>
				<?php if(is_page('lineup')|| is_page('artists')||is_page('news')||is_page('galleries')){ ?>
					<div class="text-sm-center text-xs-center text-lg-left page-title-side">
						<h1><?php the_title(); ?></h1>
					</div>
				<?php } ?>

            </div>






			<div class="overlay_header scroller like-table hidden-sm hidden-xs">



                <!--Main 2 nav items-->
                <?php $menu_obj = wpse45700_get_menu_by_location('tab_menu'); ?>
                      <?php wp_nav_menu( array( 'theme_location' 	=> 'tab_menu',
                                                'items_wrap'		=> '<ul class="menu top_header_menu main-menu" id="">%3$s</ul>',
                                                'menu_class' 		=> '' ,
                                                'container_class' => $menu_obj->name ) );
                ?>
                <!--END Main 2 nav items-->


				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo text-center">
					<a href="<?php echo home_url( '/' ); ?>">
						<?php if(!empty($theme_options['logo']['url'])){ ?>
							<img src="<?php echo $theme_options['logo']['url']; ?>" alt="logo" class="img-responsive center-block" />
						<?php } ?>
						<?php if(empty($theme_options['logo']['url'])){
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							// echo $image[0];
							//echo '<pre>';print_r($image[0]);echo '</pre>';die('here');
						?>
							<img src="<?php echo $image[0]; ?>" alt="Logo" class="img-responsive center-block" />
						<?php } ?>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 hidden-xs countdown text-right">
					<?php if($theme_options['countdown']== 'show'){ ?>
                        <p class="no-margin countdown-title"><?php echo $theme_options['countdown_text']; ?></p>
						<p id="demo" class="countdown-time"></p>
					<script>
					// Set the date we're counting down to
						var countDownDate = new Date("<?php echo $theme_options['countdown_time']; ?>").getTime();

						// Update the count down every 1 second
						var x = setInterval(function() {

							// Get todays date and time
							var now = new Date().getTime();

							// Find the distance between now an the count down date
							var distance = countDownDate - now;

							// Time calculations for days, hours, minutes and seconds
							var days = Math.floor(distance / (1000 * 60 * 60 * 24));
							var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
							var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
							var seconds = Math.floor((distance % (1000 * 60)) / 1000);

							// Output the result in an element with id="demo"
							document.getElementById("demo").innerHTML = days + ":" + hours + ":"
							+ minutes + ":" + seconds + "";

							// If the count down is over, write some text
							if (distance < 0) {
								clearInterval(x);
								document.getElementById("demo").innerHTML = "LIVE START";
							}
						}, 1000);
					</script>
					<?php } ?>


                    <div class="hidden-xs hidden-sm sticky-account-links">
                        <a class="inline" href="<?php echo $theme_options['top_right_header_text_link']; ?>" target="_blank"><?php echo $theme_options['top_right_header_text']; ?></a>
                        <a class="inline" href="<?php echo $theme_options['top_right_header_btn_text_link']; ?>" target="_blank"><?php echo $theme_options['top_right_header_btn_text']; ?></a>
                    </div>


                    
				</div>
			</div>




            <!-- Mobile Nav -->

            <div class="mobile-nav-bar visible-sm visible-xs">

                    <div class="hamburger-menu"><a href="#" class="festival" onclick="openNav()"><i class="fas fa fa-bars"></i></a></div>
                    <div class="mobile-logo">
                        <a href="<?php echo home_url( '/' ); ?>">
    						<?php if(!empty($theme_options['logo']['url'])){ ?>
    							<img src="<?php echo $theme_options['logo']['url']; ?>" alt="logo" class="img-responsive center-block" />
    						<?php } ?>
    						<?php if(empty($theme_options['logo']['url'])){
    							$custom_logo_id = get_theme_mod( 'custom_logo' );
    							$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    							// echo $image[0];
    							//echo '<pre>';print_r($image[0]);echo '</pre>';die('here');
    						?>
    							<img src="<?php echo $image[0]; ?>" alt="Logo" class="img-responsive center-block" />
    						<?php } ?>
    					</a>
                    </div>

            </div>

            <!-- END Mobile Nav -->




		</div>







	</div>
