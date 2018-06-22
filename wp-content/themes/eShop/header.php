<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package eShop
 * @subpackage eShop
 */
 global $theme_options;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<!--
========================================================================================================
=============================== Site by eShopgenius.com ==================================================
========================================================================================================
-->
<head>
	<title>
		<?php
			if ( is_category() ) {
				echo __('Category Archive for &quot;', 'eShop'); single_cat_title(); echo __('&quot; | ', 'eShop'); bloginfo( 'name' );
			} elseif ( is_tag() ) {
				echo __('Tag Archive for &quot;', 'eShop'); single_tag_title(); echo __('&quot; | ', 'eShop'); bloginfo( 'name' );
			} elseif ( is_archive() ) {
				wp_title(''); echo __(' Archive | ', 'eShop'); bloginfo( 'name' );
			} elseif ( is_search() ) {
				echo __('Search for &quot;', 'eShop').wp_specialchars($s).__('&quot; | ', 'eShop'); bloginfo( 'name' );
			} elseif ( is_home() || is_front_page()) {
				bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
			}  elseif ( is_404() ) {
				echo __('Error 404 Not Found | ', 'eShop'); bloginfo( 'name' );
			} elseif ( is_single() ) {
				wp_title('');
			} else {
				echo wp_title( ' | ', false, 'right' ); bloginfo( 'name' );
			}
		?>
	</title>
	<!-- Basic Page Needs
================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<link rel="icon" type="image/x-icon" href="<?php echo $theme_options['favicon']['url']; ?>">
<!-- Wordpress Header
================================================== -->
	<?php wp_head(); // For plugins ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper closed" id="main-wrapper">
<!-- Top Menu For Desktop
================================================== -->
		<div class="header">
			<div class="header-inner clearfix">
			 <!-- Logo
================================================== -->
			<?php if($theme_options['logo'] == 'image'){ ?>
				<a href="<?php echo bloginfo('url'); ?>" class="logo" style="background-image: url(<?php echo $theme_options['logo_img']['url']; ?>);"></a>
			<?php }else{?>
				<a href="<?php echo bloginfo('url'); ?>" class=""><?php echo $theme_options['logo_text']; ?></a>
			<?php } ?>
				<a href="javascript:void(0)" class="menu-trigger hidden-lg hidden-md">
					<span></span>
					<span></span>
					<span></span>
					<span class="menu-text">MENU</span>
				</a>
				<div class="desktop-menu visible-lg visible-md">
					<?php
                        wp_nav_menu(
                            array(
                                'menu'              => 'Primary Menu',
								'fallback_cb'      => false,
								'container'        => '',
								'items_wrap'       => '<ul id="menu-desktop-menu" class="clearfix">%3$s</ul>',
								'link_before'      => '<span>',
								'link_after'       => '</span>'
                            )
                        );
                    ?>
				</div>
			</div>
		</div>
		  <a href="javascript:void(0)" class="home-bell"><span>Request a proposal</span></a>
		  <a href="javascript:void(0)" class="maintenance-bell security-contact"><span>GET SUPPORT TODAY!</span></a>
		<div class="top-menu">
			<div class="top-menu-inner">
<!-- Top Menu For Mobile
================================================== -->
				<div class="top-menu-main">
					<?php
                        wp_nav_menu(
                            array(
                                'menu'              => 'Main Menu',
								'fallback_cb'      => false,
								'container'        => '',
								'items_wrap'       => '<ul id="menu-main-menu" class="clearfix">%3$s</ul>',
								'link_before'      => '<span>',
								'link_after'       => '</span>'
                            )
                        );
                    ?>
				</div>
			</div>
		</div> 
		<div id="site-canvas" class="ease-in-out">
            <div class="main-content">