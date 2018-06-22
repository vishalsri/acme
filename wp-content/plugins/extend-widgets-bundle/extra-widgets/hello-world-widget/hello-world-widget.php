<?php /*
	Widget Name: Hello world widget
	Description: An example widget which displays 'Hello world!'.
	Author: Vishal Srivastava
	Author URI: https://www.facebook.com/Vvishhh
	Widget URI: https://www.facebook.com/Vvishhh
	Video URI: https://www.facebook.com/Vvishhh
*/
class Hello_World_Widget extends SiteOrigin_Widget {

		function __construct()
		{
		 
			parent::__construct(
				// The unique id for your widget.
				'faqs',
				
				// The name of the widget for display purposes.
				__('Faqs(VS)', 'addon-so-widgets-bundle'),
				
				// The $widget_options array, which is passed through to WP_Widget.
				// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
				array(
					'description' => __('FAQs Component', 'addon-so-widgets-bundle'),
					'panels_icon' => 'dashicons dashicons-exerpt-view',
					'panels_groups' => array('addonso')
				),
				
				//The $control_options array, which is passed through to WP_Widget
				array(),
				
				//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
				array(
					'widget_title' => array(
						'type' => 'text',
						'label' => __('Widget Title.', 'addon-so-widgets-bundle'),
						'default' => ''
					),
		 
					'posts' => array(
						'type' => 'posts',
						'label' => __('Select FAQs', 'addon-so-widgets-bundle'),
					),
		 
					'faqs_styling' => array(
						'type' => 'section',
						'label' => __( 'Widget styling' , 'widget-form-fields-text-domain' ),
						'hide' => true,
						'fields' => array(
		 
							'title_color' => array(
								'type' => 'color',
								'label' => __( 'Title color', 'widget-form-fields-text-domain' ),
								'default' => ''
							),
		 
							'title_hover_color' => array(
								'type' => 'color',
								'label' => __( 'Title Hover color', 'widget-form-fields-text-domain' ),
								'default' => ''
							),
		 
							'content_color' => array(
								'type' => 'color',
								'label' => __( 'Content color', 'widget-form-fields-text-domain' ),
								'default' => ''
							), 
						)
					),
				),
				
				//The $base_folder path string.
				plugin_dir_path(__DIR__ )
			);
		}
    function get_template_name($instance) {
       return 'hello-world-template';
    }

    function get_style_name($instance) {
        return '';
    }
}
siteorigin_widget_register('hello-world-widget', __FILE__, 'Hello_World_Widget');

function my_awesome_widget_banner_img_src( $banner_url, $widget_meta ) {
    if( $widget_meta['ID'] == 'hello-world-widget') {
        $banner_url = plugin_dir_url(__FILE__) . 'Vs_logo.png';
    }
    return $banner_url;
}
add_filter( 'siteorigin_widgets_widget_banner', 'my_awesome_widget_banner_img_src', 10, 2);

function get_template_name($instance) {
    return 'hello-world-template';
}

function get_template_dir($instance) {
    return 'hw-templates';
}
function get_style_name($instance) {
    return 'my-widget-styles';
}