<?php
/**
 * Widget API: amf_page_widget class
 *
 * @package AMF_Manufactur
 * @since 4.4.0
 */

/**
 * Core class used to implement a page widget.
 *
 * @since 1.0.0
 *
 * @see WP_Widget
 */
 function AMF_enqueue_custom_admin_style() {
        wp_register_style( 'semantic_css', get_template_directory_uri() . '/css/semantic.css', false, '1.0.0' );
        wp_enqueue_style( 'semantic_css' );
		wp_enqueue_script('semantic_js', get_template_directory_uri() . '/js/semantic.js', false, '1.0.0');
	}
	add_action( 'admin_enqueue_scripts', 'AMF_enqueue_custom_admin_style' );
 
class amf_page_widget extends WP_Widget {

	/**
	 * Sets up a new page widget instance.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'page_widget',
			'description' => __( 'A list of your page.' ,'AMF_Manufactur'),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'page', __( 'Quick Links','AMF_Manufactur' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current page widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current page widget instance.
	 */
	public function widget( $args, $instance ) {

		/**
		 * Filters the widget title.
		 *
		 * @since 2.6.0
		 *
		 * @param string $title    The widget title. Default 'page'.
		 * @param array  $instance An array of the widget's settings.
		 * @param mixed  $id_base  The widget ID.
		 */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Quick Links' ,'AMF_Manufactur') : $instance['title'] , $instance , $this->id_base );

		// $include = empty( $instance['include'] ) ? '' : $instance['include'];
		$pagess = empty( $instance['vs_pages'] ) ? '' : $instance['vs_pages'];
		$page_view = empty( $instance['page_view'] ) ? 'self' : $instance['page_view'];
		$page_id = explode(",",$pagess);
		$agruments = array(
				'post_type' => array('page'),
				'post__in' => $page_id,
		);
		$loop = new WP_Query($agruments);
		$out  =  $args['before_widget'];
		$out .=  $args['before_title'] . $title . $args['after_title'];
		$out .=  '<div class="top-buffer ">
					<div class="quick-links page_links">
						<ul>';
		if($loop->have_posts()) {
			while($loop->have_posts()):$loop->the_post();
				$out .=  '<li><a href="'.get_the_permalink().'" target="_'.$page_view.'">'.get_the_title().'</a></li>';
			endwhile;
		}
		$out .=  '</ul>	
				</div>		
			</div>';
		$out .=  $args['after_widget'];
		
			echo $out;
		}

	/**
	 * Handles updating settings for the current page widget instance.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['page_view'] = sanitize_text_field( $new_instance['page_view'] );
		$instance['vs_pages'] = sanitize_text_field( $new_instance['vs_pages'] );
		return $instance;
		}
	/**
	 * Outputs the settings form for the page by id  widget.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'vs_pages' => '', 'page_view' => '') );
		?>
			<script>
				jQuery(document).ready(function(){
					jQuery('.ui.dropdown').dropdown({allowAdditions:true});
					//console.log('here');
					jQuery('.ui.dropdown').dropdown({'set selected': this.value });
				});
			</script>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:','AMF_Manufactur' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'page_view' ) ); ?>"><?php _e( 'Page view:','AMF_Manufactur' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('page_view');?>" name="<?php echo $this->get_field_id('page_view');?>" >
				<option value="self" <?php echo ($instance['page_view'] == 'self')?'selected':'selected'; ?>>Self</option>
				<option value="blank" <?php echo ($instance['page_view'] == 'blank')?'selected':''; ?>>New Window</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'vs_pages' ) ); ?>"><?php _e( 'Selected Pages:','AMF_Manufactur' ); ?></label>
			<div class="ui multiple selection dropdown" id="multi-select" style="width:100%;margin-bootom:12px;">
				<i class="dropdown icon"></i>
				<div class="default text"><?php echo esc_attr(__('Select Pages'));?></div>
				<div class="menu">
					<?php 
						global $post;
						$args = array(
							'post_type'=>'page',
							'order'=>'DESC'
							);
						$query = new WP_Query($args);
							if($query->have_posts()) {
								while($query->have_posts()):
									  $query->the_post();
									$option  = '<div class="item" data-value="'.$post->ID.'">';
									$option .= get_the_title();
									$option .= '</div>';
									echo $option;
								endwhile;
								wp_reset_postdata();
								wp_reset_query();
							}
					?>
				</div>
				<input name="<?php echo esc_attr( $this->get_field_name( 'vs_pages' ) ); ?>" type="hidden" value="<?php echo esc_attr( $instance['vs_pages'] );?>" />
			</div>
		</p>
		<?php
	}
}
remove_filter( 'widget_pages_args', 'filter_widget_pages_args', 10, 1 ); 
function wpse_list_pages( $output ){
    $output = preg_replace( '/<a(.*?)>(.*?)<\/a>/', '<a$1 title="$2">$2</a>', $output);
    return $output;
}
add_filter('wp_list_pages', 'wpse_list_pages');
// Register and load the widget
function amf_loadpage_widget() {
	register_widget( 'amf_page_widget' );
}
add_action( 'widgets_init', 'amf_loadpage_widget' );