<?php 
function AMF_custom_post() {
    /* $args = array(
      'public' 	=> true,
      'label'  	=> 'Slider',
	  'supports'=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
    register_post_type( 'slider', $args ); */
	
	/* $news = array(
      'public' 	=> true,
      'label'  	=> 'News',
	  'supports'=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	  'taxonomies'		  => array('topics', 'category' ,'tags','attachment'),
    );
    register_post_type( 'News', $news );
	
	$festival_info = array(
      'public' 	=> true,
      'label'  	=> 'Festival Info',
	  'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies'		  => array('topics', 'category' ,'tags','thumbnail'),
    );
    register_post_type( 'Festival Info', $festival_info );
	
	$gallery = array(
      'public' 	=> true,
      'label'  	=> 'Gallery',
	  'supports'=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
    register_post_type( 'Gallery', $gallery ); */
}
add_action( 'init', 'AMF_custom_post' );
	
/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since AMF AMF 1.0
 */
function AMF_Manufactur_widgets_init() {
	/* register_sidebar( array(
		'name'          => __( 'Sidebar', 'AMF_Manufactur' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'AMF_Manufactur' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) ); */
	register_sidebar( array(
		'name'          => __( 'Instagram', 'AMF_Manufactur' ),
		'id'            => 'insta',
		'description'   => __( 'Add widgets here to appear in your instagram.', 'AMF_Manufactur' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'AMF_Manufactur' ),
		'id'            => 'footer',
		'description'   => __( 'Appears at the Footer of the content on posts and pages.', 'AMF_Manufactur' ),
		'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'AMF_Manufactur_widgets_init' );

?>