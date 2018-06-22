<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Support Hero Widget.
 *
 * @package  Support_Hero/Frontend
 * @category Widget
 * @author   Fernando Acosta
 */
class Support_Hero_Widget {
  /**
   * Initialize the widget.
   */
  public function __construct() {
    add_action( 'wp_footer', array( $this, 'widget' ), 50 );
  }

  public function widget() {
    $options = get_option( 'support_hero_settings', array() );

    // test mode check
    if ( isset( $options['test_mode'] ) && ! current_user_can( 'manage_options' ) ) {
      return;
    }

    if ( isset( $options['embed_code'] ) ) {
      echo $options['embed_code'];
    }

    if ( is_user_logged_in() && isset( $options['identify_users'] ) ) {
      $current_user = wp_get_current_user();
    ?>
      <script type="text/javascript">
      jQuery( window ).load( function( $ ) {
        if ( window.supportHeroWidget != undefined ) {
          var properties = {
            custom: {
              customerId: <?php echo $current_user->ID; ?>,
              userEmail: '<?php echo $current_user->user_email; ?>',
              name: '<?php echo $current_user->display_name; ?>',
            }
         };
         window.supportHeroWidget.track( properties );
        }
      });
      </script>
    <?php
    }
  }
}

new Support_Hero_Widget();
