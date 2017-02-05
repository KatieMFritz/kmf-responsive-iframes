<?php
/*
Plugin Name: Responsive iframes
Description: Applying NPR's responsive iframes code
Version:     20170112
Author:      Katie M Fritz
Author URI:  http://katiemfritz.com
License:     MIT
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Include the script from http://npr.github.io/responsiveiframe/
function responsive_iframes_enqueue_script() {
  wp_enqueue_script( 'iframes', plugin_dir_url( __FILE__ ) . 'jquery.responsiveiframe.js', array ( 'jquery' ), 1.1);
}
add_action('wp_enqueue_scripts', 'responsive_iframes_enqueue_script');

// This is the CDN link: 'https://cdn.rawgit.com/npr/responsiveiframe/master/dist/jquery.responsiveiframe.min.js'. If there's a problem retrieving the js file, use this as the source instead: plugin_dir_url( __FILE__ ) . 'jquery.responsiveiframe.js',

add_action('wp_head','responsive_iframes');
function responsive_iframes() { ?>
  <script>
    (function ($) {
      $(function () {
        $('.iframe').responsiveIframe({xdomain: '*'})
      })
    })(jQuery)
  </script>
<?php }
