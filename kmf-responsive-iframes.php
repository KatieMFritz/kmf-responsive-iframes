<?php
/*
Plugin Name: KMF responsive iframes
Plugin URI: https://github.com/KatieMFritz/wp-responsive-iframes
Description: Applying NPR's responsive iframes code
Version:     20170227
Author:      Katie M Fritz
Author URI:  http://katiemfritz.com
License:     MIT
License URI: https://opensource.org/licenses/MIT
*/

defined( 'ABSPATH' ) or die( 'Nope.' );

// Add an admin page under "Plugins" to collect and display information
add_action('admin_menu', 'settings_page_create');
function settings_page_create() {
  $page_title = 'KMF responsive iframes options';
  $menu_title = 'iframes settings';
  $capability = 'manage_options';
  $menu_slug = 'kmf-responsive-iframes';
  $function = 'options_display';
  $icon_url = '';
  $position = 99;
  add_plugins_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}

function options_display(){
  include 'settings.php';
}

// Include base responsiveiframe.js script
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
// See https://developer.wordpress.org/reference/functions/is_page_template/
add_action('template_redirect', 'conditional_load');
function conditional_load() {
  if (!is_page()) { // change the conditional if needed!
    add_action('wp_enqueue_scripts', 'responsive_iframes_enqueue_script');
    add_action('wp_head','responsive_iframes');
  }
}
