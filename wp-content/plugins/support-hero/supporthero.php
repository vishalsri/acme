<?php
/**
 * Plugin Name: Support Hero
 * Description: Make your customers happier by educating them through self-help support
 * Author: Support Hero
 * Author URI: http://www.supporthero.io/
 * Version: 1.0.0
 * License: GPLv2 or later
 * Text Domain: support-hero
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Support_Hero' ) ) :

/**
 * Support_Hero main class.
 *
 * @package  Support_Hero
 * @category Core
 * @author   Fernando Acosta
 */
class Support_Hero {
  /**
   * Plugin version.
   *
   * @var string
   */
  const VERSION = '1.0.0';

  /**
   * Instance of this class.
   *
   * @var object
   */
  protected static $instance = null;

  /**
   * Initialize the plugin.
   */
  private function __construct() {
    // Load plugin text domain.
    add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

    // Include classes.
    $this->includes();

    if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
      $this->admin_includes();
    }
  }

  /**
   * Return an instance of this class.
   *
   * @return object A single instance of this class.
   */
  public static function get_instance() {
    if ( null == self::$instance ) {
      self::$instance = new self;
    }

    return self::$instance;
  }

  /**
   * Load the plugin text domain for translation.
   */
  public function load_plugin_textdomain() {
    load_plugin_textdomain( 'support-hero', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
  }

  /**
   * Include admin actions.
   */
  protected function admin_includes() {
    include dirname( __FILE__ ) . '/includes/admin/class-supporthero-admin.php';
  }

  /**
   * Include plugin functions.
   */
  protected function includes() {
    include_once dirname( __FILE__ ) . '/includes/class-supporthero-widget.php';
  }
}

/**
 * Init the plugin.
 */
add_action( 'plugins_loaded', array( 'Support_Hero', 'get_instance' ) );

endif;
