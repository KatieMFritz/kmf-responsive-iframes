<?php
/*
Plugin Name: KMF responsive iframes
Plugin URI: https://github.com/KatieMFritz/wp-responsive-iframes
Description: Applying NPR's responsive iframes code
Version:     20170112
Author:      Katie M Fritz
Author URI:  http://katiemfritz.com
License:     MIT
License URI: https://opensource.org/licenses/MIT
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Include the script from http://npr.github.io/responsiveiframe/
function responsive_iframes_enqueue_script() {
  wp_enqueue_script( 'iframes', plugin_dir_url( __FILE__ ) . 'jquery.responsiveiframe.js', array ( 'jquery' ), 1.1);
}

function responsive_iframes() { ?>
  <script>
    (function ($) {
      $(function () {
        $('.iframe').responsiveIframe({xdomain: '*'})
      })
    })(jQuery)
  </script>
<?php }

// Only load the scripts on certain pages, so you don't slow down other pages unnecessarily.
add_action('template_redirect', 'plugin_is_page');
function plugin_is_page() {
  if (!is_page()) { // change the conditional if needed
    add_action('wp_enqueue_scripts', 'responsive_iframes_enqueue_script');
    add_action('wp_head','responsive_iframes');
  }
}
