<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'AMF_Manufactur_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function AMF_Manufactur_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'AMF_';
	
	/*  $meta_boxes[] = array(
		'title' => __( 'Add Title', 'AMF_Manufactur' ),
		'pages' => array( 'page','festivalinfo' ),
		'context'  => 'normal',
		'fields' => array(
		
			 array(
				'name'  => __( 'Add Title', 'AMF_Manufactur' ),
				'id'    => "{$prefix}title",
				'desc'  => __( 'Add Title', 'AMF_Manufactur' ),
				'type'  => 'text',
				'clone_group' => 'posts',
			),
			array(
				'name'  => __( 'Add Text', 'AMF_Manufactur' ),
				'id'    => "{$prefix}text",
				'desc'  => __( 'Add Text', 'AMF_Manufactur' ),
				'type'  => 'textarea',
				'clone_group' => 'posts',
				'clone' => true,
			), 
			array(
				'id'      => 'posts_list',
				'name'    => 'Posts List',
				'type'    => 'text_list',

				'clone' => true,

				// Options: array of Placeholder => Label for text boxes
				// Number of options are not limited
				'options' => array(
					'What you '      => 'Title',
					'Lorem ipsum' => 'Text',
					'http://' => 'Image',
				),
			),
				
		)
	); 
	 */
	$meta_boxes[] = array(
		'title' => __( 'Add Poster', 'AMF_Manufactur' ),
		'pages' => array( 'page','testimony' ,'price'),
		'context'  => 'normal',
		'fields' => array(
		
			array(
				'name'  => __( 'Add Poster', 'AMF_Manufactur' ),
				'id'    => "{$prefix}poster",
				'desc'  => __( 'Add Poster', 'AMF_Manufactur' ),
				'type'  => 'image_upload',
				'clone' => false,
			),
				
		)
	);

	$meta_boxes[] = array(
		'title' => __( 'Category', 'AMF_Manufactur' ),
		'pages' => array( 'page'),
		'context'  => 'side',
		'fields' => array(
		
			array(
				'name'       => 'Category',
				'id'         => 'category',
				'type'       => 'taxonomy',

				// Taxonomy slug.
				'taxonomy'   => 'category',

				// How to show taxonomy.
				'field_type' => 'select_advanced',
			),
							
		)
	);
	
	/* $meta_boxes[] = array(
		'title' => __( 'Next Posts', 'AMF_Manufactur' ),
		'pages' => array( 'festivalinfo'),
		'context'  => 'side',
		'fields' => array(
		
			array(
				'name'        => 'Select a Post',
				'id'          => 'nxt_post',
				'type'        => 'post',

				// Post type.
				'post_type'   => 'festivalinfo',

				// Field type.
				'field_type'  => 'select_advanced', 

				'placeholder' => 'Select a Post',

				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				),
			),			
		)
	); */
	
	/* $meta_boxes[] = array(
		'title' => __( 'Add pricing', 'AMF_Manufactur' ),
		'pages' => array( 'price' ),
		'context'  => 'normal',
		'fields' => array(
		
			array(
				'name'  => __( 'Add pricing', 'AMF_Manufactur' ),
				'id'    => "{$prefix}cost",
				'desc'  => __( 'Add pricing', 'AMF_Manufactur' ),
				'type'  => 'text',
				'clone' => false,
			),				
		)
	);
	
	$meta_boxes[] = array(
		'title'  => __( 'Add pricing-content', 'AMF_Manufactur' ),
		'pages' => array( 'price' ),
		'fields' => array(
			array(
				'id'      => "{$prefix}prices",
				'name'    => __( 'Add pricing-content', 'AMF_Manufactur' ),
				'type'    => 'text_list',
				'clone' => true,
				'options' => array(
					'Title'      => __( 'Title', 'AMF_Manufactur' ),
					'Links'      => __( 'Link', 'AMF_Manufactur' ),
				),
			),
		),
	);  */
	return $meta_boxes;
}