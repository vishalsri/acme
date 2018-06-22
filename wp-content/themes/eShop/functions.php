<?php
/**
 * eShop Genius functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage eShop
 * @since eShop Genius 1.0
 */
if ( ! function_exists( 'eShop_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own eShop_setup() function to override in a child theme.
 *
 * @since eShop Genius 1.0
 */
function eShop_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/eShop
	 * If you're building a theme based on eShop Genius, use a find and replace
	 * to change 'eShop' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'eShop' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since eShop Genius 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'eShop' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );


	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // eShop_setup
add_action( 'after_setup_theme', 'eShop_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since eShop Genius 1.0
 */
function eShop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eShop_content_width', 840 );
}
add_action( 'after_setup_theme', 'eShop_content_width', 0 );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since eShop Genius 1.0
 */
function eShop_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'eShop_javascript_detection', 0 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since eShop Genius 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function eShop_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'eShop_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since eShop Genius 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function eShop_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since eShop Genius 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function eShop_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'eShop_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since eShop Genius 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function eShop_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'eShop_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since eShop Genius 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
/* function eShop_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'eShop_widget_tag_cloud_args' ); */
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/inc/options/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/options/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/inc/options/sample/sample-config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/options/sample/sample-config.php' );
}

// require_once( dirname( __FILE__ ) . '/inc/meta-box-master/meta-box.php' );
// require_once( dirname( __FILE__ ) . '/inc/meta-box-master/meta-boxes.php' );

function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function get_previous_post_id( $post_id ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;
    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;
    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );
    // Get the post object for the previous post
    $previous_post = get_previous_post();
    // Reset our global object
    $post = $oldGlobal;
    if ( '' == $previous_post )
        return 0;
    return $previous_post->ID;
}

function get_next_post_id( $post_id ) {
    // Get a global post reference since get_adjacent_post() references it
    global $post;
    // Store the existing post object for later so we don't lose it
    $oldGlobal = $post;
    // Get the post object for the specified post and place it in the global variable
    $post = get_post( $post_id );
    // Get the post object for the next post
    $next_post = get_next_post();
    // Reset our global object
    $post = $oldGlobal;
    if ( '' == $next_post )
        return 0;
    return $next_post->ID;
}
/* function wpse45700_get_menu_by_location( $location ) {
    if( empty($location) ) return false;

    $locations = get_nav_menu_locations();
    if( ! isset( $locations[$location] ) ) return false;

    $menu_obj = get_term( $locations[$location], 'nav_menu' );

    return $menu_obj;
}
	add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
} */



function eShop_scripts() {

	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '3.4.1' );
	wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.4.1' );
	wp_enqueue_style( 'normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css', array(), '3.4.1' );
	wp_enqueue_script( 'youtube', 'https://www.youtube.com/player_api', array(), '1.1.1' );


	// Theme stylesheet.
	wp_enqueue_style( 'eShop-style', get_stylesheet_uri() );
	wp_enqueue_style( 'animations55fe-css', get_template_directory_uri() . '/css/animations55fe.css', array( 'eShop-style' ), '20160816' );
	wp_enqueue_style( 'select2-min55fe-css', get_template_directory_uri() . '/css/select2.min55fe.css', array( 'eShop-style' ), '20160816' );
	wp_enqueue_style( 'select2-bootstrap55fe-css', get_template_directory_uri() . '/css/select2-bootstrap55fe.css', array( 'eShop-style' ), '20160816' );
	/* wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/css/slick.css', array( 'eShop-style' ), '20160816' );
	wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() . '/css/slick-theme.css', array( 'eShop-style' ), '20160816' );
	wp_enqueue_style( 'flickity-css', get_template_directory_uri() . '/css/flickity.css', array( 'eShop-style' ), '20160816' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array( 'eShop-style' ), '20160816' );
	wp_enqueue_style( 'light_box_css', get_template_directory_uri() . '/css/lightbox.css', array( 'eShop-style' ), '20160816' );
	wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/css/custom-min.css', array( 'eShop-style' ), '20160816' );
	wp_enqueue_style( 'manufactur', get_template_directory_uri() . '/css/manufactur-min.css' );
	wp_enqueue_style( 'manufactur-utilities', get_template_directory_uri() . '/css/manufactur-utilities-min.css' ); */
	/* wp_enqueue_script( 'eShop-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' ); */

	wp_enqueue_script( 'jQuery');



	/* wp_enqueue_script( 'bootstrapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '20160816', false );
	wp_enqueue_script( 'CSSPlugin', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/plugins/CSSPlugin.min.js', array(), '20160816', true );
	wp_enqueue_script( 'EasePack', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/easing/EasePack.min.js', array(), '20160816', true );
	wp_enqueue_script( 'TweenLite', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenLite.min.js', array(), '20160816', true );
	wp_enqueue_script( 'TimelineLite', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineLite.min.js', array(), '20160816', true ); */
	wp_enqueue_script( 'ImageLoaded', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.min.js', array(), '20160816', true ); 
	
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.min55fe.js', array(), '20160816', false );
	wp_enqueue_script( 'mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.min55fe.js', array(), '20160816', true );
	wp_enqueue_script( 'SmoothScroll', get_template_directory_uri() . '/js/SmoothScroll.min55fe.js', array(), '20160816', true );
	wp_enqueue_script( 'select2', get_template_directory_uri() . '/js/select2.min55fe.js', array('jquery'), '3.7.3', false );
	wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/js/jquery.cycle2.min55fe.js', array('jquery'), '3.7.3', false );
	wp_enqueue_script( 'cycle2_swipe', get_template_directory_uri() . '/js/jquery.cycle2.swipe.min55fe.js', array('jquery'), '3.7.3', false );
	wp_enqueue_script( 'masonry_4', get_template_directory_uri() . '/js/masonry_4-0-0.pkgd55fe.js', array(), '20160816', true );
	wp_enqueue_script( 'touchSwipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min55fe.js', array(), '20160816', true );
	wp_enqueue_script( 'generale23c', get_template_directory_uri() . '/js/generale23c.js', array(), '20160816', true );
	wp_enqueue_script( 'flowtype', get_template_directory_uri() . '/js/flowtype-1.1.min55fe.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'eShop-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'eShop' ),
		'collapse' => __( 'collapse child menu', 'eShop' ),
	) );
}

add_action( 'wp_enqueue_scripts', 'eShop_scripts' );

// function eshop_widgets_collection($folders){
    // $folders[] = 'inc/widgets/';
    // return $folders;
// }
// add_filter('siteorigin_widgets_widget_folders', 'eshop_widgets_collection');
remove_filter( 'the_excerpt', 'wpautop' );
remove_filter( 'the_content', 'wpautop' );