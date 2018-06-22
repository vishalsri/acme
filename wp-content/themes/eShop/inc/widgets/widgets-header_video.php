<?php
/*
Widget Name: Header Video widget
Description: An example widget which displays video on header.
Author: Vishal Srivastava
Author URI: http://example.com
Widget URI: http://example.com/hello-world-widget-docs,
Video URI: http://example.com/hello-world-widget-video
*/
class Header_Video_Widget extends SiteOrigin_Widget {

    function get_template_name($instance) {
        return '';
    }

    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('header-video-widget', __FILE__, 'Header_Video_Widget');

function my_awesome_widget_banner_img_src( $banner_url, $widget_meta ) {
    if( $widget_meta['ID'] == 'widgets-header_video') {
        $banner_url = plugin_dir_url(__FILE__) . 'images/awesome_widget_banner.svg';
    }
    return $banner_url;
}
add_filter( 'siteorigin_widgets_widget_banner', 'my_awesome_widget_banner_img_src', 10, 2);
function __construct() {
    //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

    //Call the parent constructor with the required arguments.
    parent::__construct(
        // The unique id for your widget.
        'hello-world-widget',

        // The name of the widget for display purposes.
        __('Hello World Widget', 'hello-world-widget-text-domain'),

        // The $widget_options array, which is passed through to WP_Widget.
        // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
        array(
            'description' => __('A hello world widget.', 'hello-world-widget-text-domain'),
            'help'        => 'http://example.com/hello-world-widget-docs',
        ),

        //The $control_options array, which is passed through to WP_Widget
        array(
        ),

        //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
        array(
            'text' => array(
                'type' => 'text',
                'label' => __('Hello world! goes here.', 'siteorigin-widgets'),
                'default' => 'Hello world!'
            ),
        ),

        //The $base_folder path string.
        plugin_dir_path(__FILE__)
    );
}