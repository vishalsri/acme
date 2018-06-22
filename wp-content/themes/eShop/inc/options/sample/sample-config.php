<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_options";
    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );
    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */
    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();
        global $wp_filesystem;
        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }
    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    if ( is_dir( $sample_patterns_path ) ) {
        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();
            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {
                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'eShop Genius Themes Options', 'eshop' ),
        'page_title'           => __( 'eShop Genius Themes Options', 'eshop' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.
        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );
    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    /* $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'eshop' ),
    );
    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/eshop/issues',
        'title' => __( 'Support', 'eshop' ),
    );
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'eshop' ),
    ); */
  
    $args['share_icons'][] = array(
        'url'   => '#',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
       /*  $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'eshop' ), $v ); */
    } else {
      /*   $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'eshop' ); */
    }
    // Add content after the form.
    /* $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'eshop' ); */
    Redux::setArgs( $opt_name, $args );
    /*
     * ---> END ARGUMENTS
     */
    /*
     * ---> START HELP TABS
     */
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'eshop' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'eshop' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'eshop' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'eshop' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );
    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'eshop' );
    Redux::setHelpSidebar( $opt_name, $content );
	$pages = get_all_page_ids(); 
	foreach($pages as $padeId){
		$pageList[$padeId]=get_the_title($padeId);
	}
    /*
     * <--- END HELP TABS
     */
    /*
     *
     * ---> START SECTIONS
     *
     */
    /*
        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
     */
    /***OPTIONS FOR LOGO TEXT-LOGO FAVICON OF THE SITE***/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'General', 'eshop' ),
        'id'               => 'general',
        'desc'             => __( 'These are really basic settings!', 'eshop' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-cogs'
    ) );
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Home', 'eshop' ),
		'id'               => 'basic-checkbox',
		'icon'             => 'el el-home',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => false,
		'fields'           => array(
			//Favicon
			array(
				'id'       => 'favicon',
				'type'     => 'media',
				'url'      => true,
				'title'    => __( 'Favicon Icon', 'eshop' ),
				'compiler' => 'true',
				'desc'     => __( 'Favicon of website.', 'eshop' ),
				'subtitle' => __( 'Upload favicon of website using uploder', 'eshop' )
			),
			//Logos
			array(
				'id'   =>'logos',
				'type' => 'divide',
				'class' => __( 'text-center', 'eshop' ),
				'desc' => __('Select the Logo format.', 'eshop'),
			),	
			array(
				'id' => 'logo',
				'type' => 'button_set',
				'title' => __( 'Logo', 'eshop' ),
				'options' => array(
					'text'=>'Text Logo',
					'image'=>'Upload Images'
				),
				'default' => 'image'	
			),
			array(
				'id'       => 'logo_text',
				'type'     => 'text',
				'url'      => false,
				'title'    => __( 'Text Logo', 'eshop' ),
				'compiler' => 'true',
				'desc'     => __( 'text Logo of website.', 'eshop' ),
				'subtitle' => __( 'write text for logo of website ', 'eshop' )
			), 
			array(
				'id'       => 'logo_img',
				'type'     => 'media',
				'url'      => true,
				'title'    => __( 'Regular Logo', 'eshop' ),
				'compiler' => 'true',
				'desc'     => __( 'Logo of website.', 'eshop' ),
				'subtitle' => __( 'Upload logo of website using uploder', 'eshop' )
			), 
			//Header Background
			array(
				'id'   =>'header',
				'type' => 'divide',
				'class' => __( 'text-center', 'eshop' ),
				'desc' => __('Select the Header Background format.', 'eshop'),
			),	
			array(
				'id' => 'header_bg',
				'type' => 'button_set',
				'title' => __( 'Header Background', 'eshop' ),
				'options' => array(
					'images'=>'Single Image',
					'sliders'=>'Slider',
					'video'=>'Video'
				),
				'default' => 'images'	
			),
			array(
				'id'       => 'single_image',
				'type'     => 'media',
				'url'      => false,
				'title'    => __( 'Single Images', 'eshop' ),
			),
			array(
				'id'=>'header_slides', 
				'type' => 'editor',
				'title' => __('Slider', 'eshop'),
			), 
			array(
				'id'=>'header_video', 
				'type' => 'editor',
				'title' => __('Video', 'eshop'),
			), 
			//Default image throughout the site
			array(
				'id'       => 'default_image',
				'type'     => 'media',
				'url'      => false,
				'title'    => __( 'Default image throughout the site', 'eshop' ),
			),			
		)
	) );		
	/***OPTIONS FOR COPYRIGHT TEXT IN FOOTER SECTION***/
	 Redux::setSection( $opt_name, array(
		'title'            => __( 'Footer', 'eshop' ), 
		'id'               => 'footer',
		'icon'             => 'el el-chevron-down',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => false,
		'fields'           => array(
			array(
				'id'          => 'office_address',
				'type'        => 'editor',
				'title'       => __( 'Office Address', 'eshop' ),
			),
			array(
				'id'          => 'office_address_map',
				'type'        => 'editor',
				'title'       => __( 'Office Address Map', 'eshop' ),
			),
			array(
				'id'          => 'footer_text',
				'type'        => 'editor',
				'title'       => __( 'Footer  text', 'eshop' ),
			),
			array(
				'id'          => 'footer_email',
				'type'        => 'text',
				'title'       => __( 'Footer Email', 'eshop' ),
			),
			array(
				'id'          => 'footer_phoneno',
				'type'        => 'text',
				'title'       => __( 'Footer Phone No.', 'eshop' ),
			),
		)
	) ); 
    /*** OPTIONS FOR CONTACT INFORMATIONS ***/
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Sections', 'eshop' ),
		'id'               => 'sections',
		'customizer_width' => '500px',
		'icon'             => 'el el-adjust-alt',
	) );
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Featured Block', 'eshop' ),
        'id'         => 'feature_block',
		'icon'             => 'el el-edit',
        'desc'       => __( 'Add Content','eshop'),
        'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'center_heading',
                'type'     => 'text',
                'title'    => __( 'Center heading', 'eshop' ),
                'subtitle' => __( 'Center heading here', 'eshop' ),
            ), 
			array(
				'id'=>'center-section-text',
				'type' => 'textarea',
				'title' => __('Center text', 'eshop'), 
				'placeholder' => __('Center text', 'eshop'), 
				'subtitle' => __('Add Center text.', 'eshop'),
			),
		)
    ) ); 
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Approach Block', 'eshop' ),
        'id'         => 'approach_block',
		'icon'             => 'el el-bell',
        'desc'       => __( 'Approach Block','eshop'),
        'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'approach_block_heading', 
                'type'     => 'text',
                'title'    => __( 'Approach Block Heading', 'eshop' ),
            ), 
			array(
				'id'		=>'approach_block_text',
				'type' 		=> 'textarea',
				'title' 	=> __('Approach text', 'eshop'), 
			),
			array(
				'id'		=>'approach_block_boxes', 
				'type' 		=> 'slides',
				'title' 	=> __('Approach Boxes ', 'eshop'),
			),
			array(
				'id'		=>'approach_block_end_text', 
				'type' 		=> 'textarea',
				'title' 	=> __('Approach End Text ', 'eshop'),
			),
		)
    ) ); 
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Clients Block', 'eshop' ),
        'id'         => 'clients_block',
		'icon'             => 'el el-music',
        'desc'       => __( 'Clients Block','eshop'),
        'subsection' => true,
        'fields'     => array(
			
			array(
                'id'       => 'clients_block_heading', 
                'type'     => 'text',
                'title'    => __( 'Clients Block Heading', 'eshop' ),
            ), 
			array(
				'id'=>'clients_block_text',
				'type' => 'editor',
				'title' => __('Clients box Text', 'eshop'), 
			),
			array(
				'id'		=>'clients_block_boxes', 
				'type' 		=> 'slides',
				'title' 	=> __('Clients Boxes ', 'eshop'),
			),
		)
    ) ); 
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Customer Brand', 'eshop' ),
        'id'         => 'customer_brand',
		'icon'             => 'el el-picture',
        'desc'       => __( 'Customer Brand','eshop'),
        'subsection' => true,
        'fields'     => array( 
			array(
                'id'       => 'customer_brands', 
                'type'     => 'slides',
                'title'    => __( 'Customer Brands', 'eshop' ),
            ), 
		)
    ) ); 
	  Redux::setSection( $opt_name, array(
        'title'      => __( 'Red Block ', 'eshop' ),
        'id'         => 'red-section',
		'icon'             => 'el el-list',
        'desc'       => __( 'Add Text to the red box','eshop'),
        'subsection' => true,
        'fields'     => array(
			array(
				'id' => 'red_box_heading',
				'type' => 'text',
				'title' => __( 'Heading', 'eshop' ),
			),
			array(
				'id'=>'red_box_heading_text', 
				'type' => 'editor',
				'title' => __('Select Posts for festival_info section ', 'eshop'),
			),
		)
    ) );
/*	Redux::setSection( $opt_name, array(
        'title'      => __( 'News section', 'eshop' ),
        'id'         => 'news-section',
		'icon'             => 'el el-fire',
        'desc'       => __( 'Add Posts','eshop'),
        'subsection' => true,
        'fields'     => array(
			array(
				'id' => 'full_news_section',
				'type' => 'button_set',
				'title' => __( 'Show or hide News Section', 'eshop' ),
				'options' => array(
					'show'=>'Show',
					'hide'=>'Hide'
				),
				'default' => 'show'	
			),
			array(
				'id'=>'news_section_posts', 
				'type' => 'select',
				 'multi'    => true,
                'data'      => 'post',
                'args' => array('post_type' => 'news','posts_per_page' => -1 ),
				'title' => __('Select Posts for News section ', 'eshop'),
				'subtitle'=> __('Select Only 4 Posts', 'eshop'),
				),
			array(
				'id'=>'news_title', 
				'type' => 'text',
				'title' => __('News Title', 'eshop'),
			),
			array(
				'id'=>'news_right_btn_text', 
				'type' => 'text',
				'title' => __('News Button Text', 'eshop'),
			),
			array(
				'id'=>'news_right_btn_text_link', 
				'type' => 'text',
				'title' => __('News Text link ', 'eshop'),
			),
		)
    ) ); 
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Insta Box', 'eshop' ),
        'id'         => 'insta_box',
		'icon'             => 'el el-instagram',
        'desc'       => __( 'Add Instagram pics','eshop'),
        'subsection' => true,
        'fields'     => array(
			array(
				'id'=>'insta_block_bg_color',
				'type' => 'color',
				'title' => __('Instagram HashTag', 'eshop'), 
			),
			array(
				'id'=>'insta_tag',
				'type' => 'text',
				'title' => __('Instagram HashTag', 'eshop'), 
			),
		)
    ) ); 
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Subscription Box', 'eshop' ),
        'id'         => 'subscription_box',
		'icon'             => 'el el-inbox',
        'desc'       => __( 'Add Subscription Box','eshop'),
        'subsection' => true,
        'fields'     => array(
			array(
				'id' => 'newsletter_section',
				'type' => 'button_set',
				'title' => __( 'NewsLetter Section Show Hide', 'Manufacture' ),
				'options' => array(
					'show'=>'Show',
					'hide'=>'Hide'
				),
				'default' => 'hide'	
			), 
			array(
				'id' => 'background_subscription',
				'type' => 'button_set',
				'title' => __( 'What background Do you Want', 'eshop' ),
				'options' => array(
					'color'=>'Color',
					'image'=>'Image'
				),
				'default' => 'image'	
			),
			array(
				'id'=>'subscribe_block_bg_color',
				'type' => 'color',
				'title' => __('Subscription Background Color', 'eshop'), 
			),
			array(
				'id'=>'subscribe_block_bg_image',
				'type' => 'background',
				'title' => __('Subscribe Box Background Image', 'eshop'), 
			),
			array(
				'id'=>'subscribe_block_heading',
				'type' => 'textarea',
				'title' => __('Subscribe Box Heading', 'eshop'), 
			),
			array(
				'id'=>'subscribe_block_subheading',
				'type' => 'textarea',
				'title' => __('Subscribe Box Sub Heading', 'eshop'), 
			),
			array(
				'id'=>'subscribe_block_gravity',
				'type' => 'editor',
				'title' => __('Subscribe Gravity Form', 'eshop'), 
			),
		)
    ) ); 
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Sponsor Block', 'eshop' ),
        'id'         => 'sponsor_block',
		'icon'             => 'el el-flag',
        'desc'       => __( 'Add Logos','eshop'),
        'subsection' => true,
        'fields'     => array(
			array(
				'id'=>'sponsers_block_title',
				'type' => 'text',
				'title' => __('Block Title', 'eshop'), 
			),
			 array(
				'id'=>'sponsers_block_images',
				'type' => 'slides',
				'title' => __('Sponsor Icons and links', 'eshop'), 
			), 
			array(
				'id'=>'sponsers_block_no_of_images',
				'type' => 'slider',
				'title' => __('No of Images you want to show', 'eshop'), 
				"default" => 6,
				"min" => 0,
				"step" => 1,
				"max" => 10,
				'display_value' => 'text'
			), 
		)
    ) ); */
/*	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Testimonial section', 'eshop' ),
        'id'         => 'testimonial-section',
        'desc'       => __( 'Add pages','eshop'),
        'subsection' => true,
        'fields'     => array(
			 array(
				'id'=>'sect-image',
				'type' => 'media',
				'title' => __('Section background image', 'eshop'), 
				'placeholder' => __('Section background image', 'eshop'), 
				'subtitle' => __('Section background image.', 'eshop'),
			), 
		)
    ) );  */
	/***OPTIONS FOR Page Settings OF THE SITE ***/
 	 Redux::setSection( $opt_name, array(
		'title'            => __( 'Blog Page Settings', 'eshop' ),
		'id'               => 'blog_page_settings',
		'customizer_width' => '500px',
		'icon'             => 'el el-blogger',
        'fields'     => array(
		
			array(
				'id'       => 'top_left_text',
				'type'     => 'editor',
				'title'    => __( 'Short Description of the page on Top Left of the Page', 'eshop' ),
			),
		 )
	) );
	Redux::setSection( $opt_name, array(
        'title'      => __( 'About Us Page Settings', 'eshop' ),
        'id'         => 'about_page_setting',
		'icon'             => 'el el-smiley',
        'desc'       => __( 'Add About Us Page settings','eshop'),
        'subsection' => true,
        'fields'     => array(
		
			array(
				'id'       => 'top_right_text',
				'type'     => 'editor',
				'title'    => __( 'Top Right Text of the page', 'eshop' ),
			),
			array(
				'id'       => 'main_text',
				'type'     => 'editor',
				'title'    => __( 'Short Description of the page', 'eshop' ),
			),
		 )
    ) ); 
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Principles Page Settings', 'eshop' ),
        'id'         => 'principle_page_setting',
		'icon'             => 'el el-check',
        'desc'       => __( 'Add Principles Page settings','eshop'),
        'subsection' => true,
        'fields'     => array(
		
			array(
				'id'       => 'shoet_desc',
				'type'     => 'editor',
				'title'    => __( 'Short Description of the page', 'eshop' ),
			),
		 )
    ) ); 
	/*
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Faq Page Settings', 'eshop' ),
        'id'         => 'faq_page_setting',
		'icon'             => 'el el-lines',
        'desc'       => __( 'Add Faq Page settings','eshop'),
        'subsection' => true,
        'fields'     => array(
		
			array(
				'id' => 'countdown_for_page',
				'type' => 'button_set',
				'title' => __( 'CountDown', 'eshop' ),
				'options' => array(
					'show'=>'Show',
					'hide'=>'Hide'
				),
				'default' => 'hide'	
			),
			array(
				'id'       => 'faq_page_heading',
				'type'     => 'text',
				'title'    => __( 'FAQ Page Heading', 'eshop' ),
			),
			array(
				'id'       => 'faq_page_sub_heading',
				'type'     => 'text',
				'title'    => __( 'FAQ Page Sub Heading', 'eshop' ),
			),
			array(
				'id'       => 'accordian_tabs',
				'type'     => 'slides',
				'title'    => __( 'Tabs ', 'eshop' ),
			),
			array(
				'id'       => 'accordian_text',
				'type'     => 'slides',
				'title'    => __( 'Accordion text', 'eshop' ),
			),
			array(
				'id'       => 'get_ticket_background_color',
				'type'     => 'color',
				'title'    => __( 'Get Ticket Background Color', 'eshop' ),
			),
			array(
				'id'       => 'get_ticket_images',
				'type'     => 'media',
				'title'    => __( 'Get Poster Images ', 'eshop' ),
			),
			array(
				'id'       => 'get_ticket_next_text',
				'type'     => 'text',
				'title'    => __( 'Get tickets Next Text ', 'eshop' ),
			),
			array(
				'id'       => 'get_ticket_text',
				'type'     => 'text',
				'title'    => __( 'Get tickets Text ', 'eshop' ),
			),
			array(
				'id'       => 'get_ticket_text_link',
				'type'     => 'text',
				'title'    => __( 'Get tickets Text Link', 'eshop' ),
			),
		 )
    ) ); 
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Info Page Settings', 'eshop' ),
        'id'         => 'info_page_setting',
		'icon'             => 'el el-lines',
        'desc'       => __( 'Add Info Page settings','eshop'),
        'subsection' => true,
        'fields'     => array(
		
			array(
				'id'       => 'info_page_heading',
				'type'     => 'text',
				'title'    => __( 'Info Page Heading', 'eshop' ),
			),
			array(
				'id'       => 'info_page_sub_heading',
				'type'     => 'text',
				'title'    => __( 'Info Page Sub Heading', 'eshop' ),
			),
			array(
				'id'       => 'info_page_sub_text',
				'type'     => 'editor',
				'title'    => __( 'Info Page Text ', 'eshop' ),
			),
			array(
				'id'       => 'no_of_post',
				'type'     => 'slider',
				'title'    => __( 'No, of Posts want to show', 'eshop' ),
				"default" => 8,
				"min" => 0,
				"step" => 1,
				"max" => 20,
				'display_value' => 'text'
			),
			array(
				'id'       => 'service_background_color',
				'type'     => 'color',
				'title'    => __( 'Get Ticket Background Color', 'eshop' ),
			),
			array(
				'id'       => 'service_images',
				'type'     => 'media',
				'title'    => __( 'Service Poster Images ', 'eshop' ),
			),
			array(
				'id'       => 'service_next_text',
				'type'     => 'text',
				'title'    => __( 'Service Next Text ', 'eshop' ),
			),
			array(
				'id'       => 'service_text',
				'type'     => 'text',
				'title'    => __( 'Service Text ', 'eshop' ),
			),
			array(
				'id'       => 'service_text_link',
				'type'     => 'text',
				'title'    => __( 'Service Text Link', 'eshop' ),
			),
		 )
    ) ); 
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Category Page Settings', 'eshop' ),
        'id'         => 'category_page_setting',
		'icon'             => 'el el-lines',
        'desc'       => __( 'Add Category Page settings','eshop'),
        'subsection' => true,
        'fields'     => array(
		
			array(
				'id'       => 'category_page_heading',
				'type'     => 'text',
				'title'    => __( 'Category Page Heading', 'eshop' ),
			),
			array(
				'id'       => 'category_page_sub_heading',
				'type'     => 'text',
				'title'    => __( 'Category Page Sub Heading', 'eshop' ),
			),
			array(
				'id'       => 'category_page_heading_color',
				'type'     => 'color',
				'title'    => __( 'Category Page Heading Background Color', 'eshop' ),
			),
			array(
				'id'       => 'category_page_sub_text',
				'type'     => 'editor',
				'title'    => __( 'Category Page Text ', 'eshop' ),
			),
			array(
				'id'       => 'category_sub_text_background_color',
				'type'     => 'color',
				'title'    => __( 'Middle heading Background Color', 'eshop' ),
			),
			array(
				'id'       => 'no_of_post_cat',
				'type'     => 'slider',
				'title'    => __( 'No, of Posts want to show', 'eshop' ),
				"default" => 8,
				"min" => 0,
				"step" => 1,
				"max" => 20,
				'display_value' => 'text'
			),
			array(
				'id'       => 'plan_background_color',
				'type'     => 'color',
				'title'    => __( 'Plan Background Color', 'eshop' ),
			),
			array(
				'id'       => 'plan_images',
				'type'     => 'media',
				'title'    => __( 'Plan Poster Images ', 'eshop' ),
			),
			array(
				'id'       => 'plan_next_text',
				'type'     => 'text',
				'title'    => __( 'Plan Next Text ', 'eshop' ),
			),
			array(
				'id'       => 'plan_text',
				'type'     => 'text',
				'title'    => __( 'Plan Text ', 'eshop' ),
			),
			array(
				'id'       => 'plan_text_link',
				'type'     => 'text',
				'title'    => __( 'Plan Text Link', 'eshop' ),
			),
		 )
    ) ); 
	
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Contact Page Settings', 'eshop' ),
        'id'         => 'contact_page_setting',
		'icon'             => 'el el-phone',
        'desc'       => __( 'Add Contact Page settings','eshop'),
        'subsection' => true,
        'fields'     => array(
		
			array(	
				'id'       => 'contact_info',
				'type'     => 'slides',
				'title'    => __( 'Contact Info', 'eshop' ),
			),
		 )
    ) );  */
	/***OPTIONS FOR Page Settings OF THE SITE ***/
 	Redux::setSection( $opt_name, array(
		'title'            => __( 'Social section', 'eshop' ),
		'id'               => 'social',
		'customizer_width' => '500px',
		'icon'             => 'el el-comment-alt',
	) ); 
	/***OPTIONS FOR SOCIAL LINKS OF THE SITE ***/
	 Redux::setSection( $opt_name, array(
        'title'      => __( 'Social Links', 'eshop' ),
        'id'         => 'social-links',
		'icon'             => 'el el-asl',
        'desc'       => __( 'Add all socials links here','eshop'),
        'subsection' => true,
        'fields'     => array(
		
			/* array(
				'id'       => 'footer_bg_img',
				'type'     => 'media',
				'url'      => true,
				'title'    => __( 'Footer section background image', 'eshop' ),
				'compiler' => 'true',
				'desc'     => __( 'image of footer section.', 'eshop' ),
				'subtitle' => __( 'Upload image of footer section', 'eshop' )
			), */
           	array(
				'id'=>'facebook',
				'type' => 'text',
				'title' => __('Facebook URL', 'eshop'), 
				'placeholder' => __('Facebook URL', 'eshop'), 
				'subtitle' => __('Add facebook url here.', 'eshop'),
			),
			array(
				'id'=>'twitter',
				'type' => 'text',
				'title' => __('Twitter URL', 'eshop'), 
				'placeholder' => __('Twitter URL', 'eshop'), 
				'subtitle' => __('Add Twitter url here.', 'eshop'),
			),
			array(
				'id'=>'googlePlus',
				'type' => 'text',
				'title' => __('Google plus URL', 'eshop'), 
				'placeholder' => __('Google plus URL', 'eshop'), 
				'subtitle' => __('Add Google plus url here.', 'eshop'),
			),
			array(
				'id'=>'linkedin',
				'type' => 'text',
				'title' => __('LINKEDIN URL', 'eshop'), 
				'placeholder' => __('linkedin URL', 'eshop'), 
				'subtitle' => __('Add linkedin url here.', 'eshop'),
			),
			array(
				'id'=>'pinterest',
				'type' => 'text',
				'title' => __('Pinterest URL', 'eshop'), 
				'placeholder' => __('Pinterest URL', 'eshop'), 
				'subtitle' => __('Add pinterest url here.', 'eshop'),
			), 
           	array(
				'id'=>'rssfeed',
				'type' => 'text',
				'title' => __('RSS Feed ', 'eshop'), 
				'placeholder' => __('RSS Feed', 'eshop'), 
				'subtitle' => __('Add RSS Feed here.', 'eshop'),
			),
			
			array(
				'id'=>'instagram',
				'type' => 'text',
				'title' => __('Instagram URL', 'eshop'), 
				'placeholder' => __('Instagram URL', 'eshop'), 
				'subtitle' => __('Add instagram url here.', 'eshop'),
			),
			array(
				'id'=>'youtube',
				'type' => 'text',
				'title' => __('Youtube URL', 'eshop'), 
				'placeholder' => __('Youtube URL', 'eshop'), 
				'subtitle' => __('Add Youtube url here.', 'eshop'),
			),
			array(
				'id'=>'skype',
				'type' => 'text',
				'title' => __('Skype URL', 'eshop'), 
				'placeholder' => __('Skype URL', 'eshop'), 
				'subtitle' => __('Add Skype url here.', 'eshop'),
			),
		 )
    ) );  	
	Redux::setSection( $opt_name, array(
        'title'            => __( 'Colors', 'eshop' ),
        'id'               => 'colors',
        'customizer_width' => '500px',
        'icon'             => 'el el-css',
    ) );
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Button Color', 'eshop' ),
        'id'         => 'button-colors',
		'icon'             => 'el el-css',
        'desc'       => __( 'Add colors for your themes button here','eshop'),
        'subsection' => true,
        'fields'     => array(
		
			array(
				'id'       => 'top_head_btn',
				'type'     => 'color',
				'title'    => __( 'Top head Reservation Button Color', 'eshop' ),
				'subtitle' => __( 'Pick a Top head Reservation Button color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			array(
				'id'       => 'top_head_btn_hover',
				'type'     => 'color',
				'title'    => __( 'Normal Top head Reservation Hover Color', 'eshop' ),
				'subtitle' => __( 'Pick a Normal Top head Reservation Hover color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			array(
				'id'       => 'top_head_btn_text',
				'type'     => 'color',
				'title'    => __( 'Normal Top head Reservation Text Color', 'eshop' ),
				'subtitle' => __( 'Pick a Normal Top head Reservation Text color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			array(
				'id'       => 'top_head_btn_text_hover',
				'type'     => 'color',
				'title'    => __( 'Normal Top head Reservation Text on Hover Color', 'eshop' ),
				'subtitle' => __( 'Pick a Normal Top head Reservation Text on Hover color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			
			array(
				'id'       => 'normal_btn',
				'type'     => 'color',
				'title'    => __( 'Normal Button Color', 'eshop' ),
				'subtitle' => __( 'Pick a Normal Button color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			array(
				'id'       => 'normal_btn_hover',
				'type'     => 'color',
				'title'    => __( 'Normal Button Hover Color', 'eshop' ),
				'subtitle' => __( 'Pick a Normal Button Hover color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			
			/* array(
				'id'       => 'animate_btn',
				'type'     => 'color',
				'title'    => __( 'Animate Button Color', 'eshop' ),
				'subtitle' => __( 'Pick a Animate Button color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			), */
			array(
				'id'       => 'animate_btn_hover',
				'type'     => 'color',
				'title'    => __( 'Animate Button Hover Color', 'eshop' ),
				'subtitle' => __( 'Pick a Animate Button Hover color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			/* array(
				'id'       => 'animate_btn_border',
				'type'     => 'color',
				'title'    => __( 'Animate Button Border Color', 'eshop' ),
				'subtitle' => __( 'Pick a Animate Button Border color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			), */
			array(
				'id'       => 'animate_btn_border_hover',
				'type'     => 'color',
				'title'    => __( 'Animate Button Border Hover Color', 'eshop' ),
				'subtitle' => __( 'Pick a Animate Button Border Hover color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			/* array(
				'id'       => 'animate_btn_text',
				'type'     => 'color',
				'title'    => __( 'Animate Button Text Color', 'eshop' ),
				'subtitle' => __( 'Pick a Animate Button Text color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			array(
				'id'       => 'animate_btn_text_hover',
				'type'     => 'color',
				'title'    => __( 'Animate Button Text on Hover Color', 'eshop' ),
				'subtitle' => __( 'Pick a Animate Button Text on Hover color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			), */
			
			/* array(
				'id'       => 'black_btn',
				'type'     => 'color',
				'title'    => __( 'Black and white Button Color', 'eshop' ),
				'subtitle' => __( 'Pick a Black and white Button color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			), */
			array(
				'id'       => 'black_btn_hover',
				'type'     => 'color',
				'title'    => __( 'Black and white Button Hover Color', 'eshop' ),
				'subtitle' => __( 'Pick a Black and white Button Hover color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Website Color', 'eshop' ),
        'id'         => 'website-colors',
		'icon'             => 'el el-css',
        'desc'       => __( 'Add colors for your theme here','eshop'),
        'subsection' => true,
        'fields'     => array(
			
			array(
				'id'       => 'navbar',
				'type'     => 'color',
				'title'    => __( 'navbar Color', 'eshop' ),
				'subtitle' => __( 'Pick a navbar color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			array(
				'id'       => 'all_p_tag',
				'type'     => 'color',
				'title'    => __( 'Paragraph Color', 'eshop' ),
				'subtitle' => __( 'Pick a Paragraph  color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			array(
				'id'       => 'all_heading_tag',
				'type'     => 'color',
				'title'    => __( 'All headings of the site  Color', 'eshop' ),
				'subtitle' => __( 'Pick a All headings of the site color for the theme (default: #69caff).', 'eshop' ),
				'default'  => '#69caff',
			),
			array(
				'id'       => 'h2',
				'type'     => 'color',
				'title'    => __( 'All headings of the site  Color', 'eshop' ),
				'subtitle' => __( 'Pick a All headings of the site color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),	
			array(
				'id'       => 'h3',
				'type'     => 'color',
				'title'    => __( 'All headings of the site  Color', 'eshop' ),
				'subtitle' => __( 'Pick a All headings of the site color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			array(
				'id'       => 'h4',
				'type'     => 'color',
				'title'    => __( 'All headings of the site  Color', 'eshop' ),
				'subtitle' => __( 'Pick a All headings of the site color for the theme (default: #69caff).', 'eshop' ),
				'default'  => '#69caff',
			),
			array(
				'id'       => 'h5',
				'type'     => 'color',
				'title'    => __( 'All headings of the site  Color', 'eshop' ),
				'subtitle' => __( 'Pick a All headings of the site color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			array(
				'id'       => 'link-color',
				'type'     => 'color',
				'title'    => __( 'Primary Color', 'eshop' ),
				'subtitle' => __( 'Pick a Primary color for the theme (default: #33bb9b).', 'eshop' ),
				'default'  => '#33bb9b',
			),
			array(
				'id'       => 'secondary',
				'type'     => 'color',
				'title'    => __( 'secondary Color ', 'eshop' ),
				'subtitle' => __( 'Pick a secondary color for the theme (default: #000).', 'eshop' ),
				'default'  => '#000',
			),
			 array(
				'id'       => 'project-gradient-from',
				'type'     => 'color',
				'title'    => __( 'banner Color', 'eshop' ),
				'subtitle' => __( 'Pick a  banner color for the theme (default: #7bcfff).', 'eshop' ),
				'default'  => '#7bcfff',
			),
			array(
				'id'       => 'project-gradient-to',
				'type'     => 'color',
				'title'    => __( 'banner Color', 'eshop' ),
				'subtitle' => __( 'Pick a  banner color for the theme (default: #72cafc).', 'eshop' ),
				'default'  => '#72cafc',
			),
			array(
				'id'       => 'about-section',
				'type'     => 'color',
				'title'    => __( 'About section Color', 'eshop' ),
				'subtitle' => __( 'Pick a about section color for the theme (default: #fff).', 'eshop' ),
				'default'  => '#fff',
			),
			array(
				'id'       => 'social_links',
				'type'     => 'color',
				'title'    => __( 'Social Links Color', 'eshop' ),
				'subtitle' => __( 'Pick a social links color for the theme (default: #fff).', 'eshop' ),
				'default'  => '#fff',
			), 
			array(
				'id'       => 'footer',
				'type'     => 'color',
				'title'    => __( 'Footer Color', 'eshop' ),
				'subtitle' => __( 'Pick a footer color for the theme (default:  #0e151d).', 'eshop' ),
				'default'  => ' #0e151d',
			),
		)
    ) );
/*
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Info heading', 'eshop' ),
		'id'               => 'info',
		'customizer_width' => '500px',
		'icon'             => 'el el-info-circle',
	) );
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Info heading', 'eshop' ),
        'id'         => 'info-heading',
        'desc'       => __( 'Add info heading','eshop'),
        'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'info-heading',
                'type'     => 'editor',
                'title'    => __( 'Info heading', 'eshop' ),
                'subtitle' => __( 'Provide info heading here', 'eshop' ),
				'args'    => array(
                    'wpautop'       => true,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                )
            ),
		)
    ) );
	
	Redux::setSection( $opt_name, array(
		'title'            => __( 'Product heading', 'eshop' ),
		'id'               => 'pro',
		'customizer_width' => '500px',
		'icon'             => 'el el-shopping-cart-sign',
	) );
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Product heading', 'eshop' ),
        'id'         => 'product-heading',
        'desc'       => __( 'Add Product heading','eshop'),
        'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'pro-heading',
                'type'     => 'editor',
                'title'    => __( 'product heading', 'eshop' ),
                'subtitle' => __( 'Provide product heading here', 'eshop' ),
				'args'    => array(
                    'wpautop'       => true,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                )
            ),
			array(
                'id'       => 'pro-content',
                'type'     => 'editor',
                'title'    => __( 'product content', 'eshop' ),
                'subtitle' => __( 'Provide product content here', 'eshop' ),
				'args'    => array(
                    'wpautop'       => true,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                )
            ),
		)
    ) );

	Redux::setSection( $opt_name, array(
        'title'            => __( 'About', 'eshop' ),
        'id'               => 'aboutsite',
        'customizer_width' => '500px',
        'icon'             => 'el el-info-circle',
    ) );	
	Redux::setSection( $opt_name, array(
		'title'            => __( 'About section', 'eshop' ), 
		'id'               => 'about',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => false,
		'fields'           => array(
			array(
				'id'          => 'about_heading',
				'type'        => 'text',
				'title'       => __( 'About', 'eshop' ),
				'subtitle'    => __( 'about text', 'eshop' ),
				'desc'        => __( 'Add about text', 'eshop' ),
				'placeholder' => 'About your heading',
			),
			array(
				'id'          => 'about_heading2',
				'type'        => 'text',
				'title'       => __( 'About', 'eshop' ),
				'subtitle'    => __( 'about text', 'eshop' ),
				'desc'        => __( 'Add about text', 'eshop' ),
				'placeholder' => 'About your site heading 2',
			),			
			array(
				'id'          => 'about_text',
				'type'        => 'textarea',
				'title'       => __( 'About', 'eshop' ),
				'subtitle'    => __( 'about text', 'eshop' ),
				'desc'        => __( 'Add about text', 'eshop' ),
				'placeholder' => 'About your site',
			),
			array(
				'id'       => 'about_img',
				'type'     => 'media',
				'url'      => true,
				'title'    => __( 'about image', 'eshop' ),
				'compiler' => 'true',
				'desc'     => __( 'image of about section.', 'eshop' ),
				'subtitle' => __( 'Upload image of about section', 'eshop' )
			),
			)
			));
			
	Redux::setSection( $opt_name, array(
        'title'            => __( 'welcome note', 'eshop' ),
        'id'               => 'welcome',
        'customizer_width' => '500px',
        'icon'             => 'el el-pencil ',
    ) );	
	Redux::setSection( $opt_name, array(
		'title'            => __( 'welcome section', 'eshop' ), 
		'id'               => 'welcomenote',
		'subsection'       => true,
		'customizer_width' => '450px',
		'desc'             => false,
		'fields'           => array(
			array(
				'id'          => 'welcome_heading',
				'type'        => 'text',
				'title'       => __( 'Welcome', 'eshop' ),
				'subtitle'    => __( 'welcome text', 'eshop' ),
				'desc'        => __( 'Add welcome text', 'eshop' ),
				'placeholder' => '',
			),
			array(
				'id'          => 'welcome_note',
				'type'        => 'textarea',
				'title'       => __( 'welcome note', 'eshop' ),
				'subtitle'    => __( 'welcome text', 'eshop' ),
				'desc'        => __( 'Add welcome text', 'eshop' ),
				'placeholder' => '',
			),	
			)
			)); 
    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'eshop' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'eshop' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'eshop' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'eshop' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'eshop' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );
    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'eshop' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */
    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */
    /*
    *
    * --> Action hook examples
    *
    */
    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );
    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }
    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;
            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }
            $return['value'] = $value;
            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }
            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }
            return $return;
        }
    }
    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }
    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'eshop' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'eshop' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );
            return $sections;
        }
    }
    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;
            return $args;
        }
    }
    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';
            return $defaults;
        }
    }
    /**
     * Removes the demo link and the notice of integrated demo from the eshop plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );
                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
