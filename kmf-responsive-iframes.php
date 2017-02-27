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
  include 'instructions.php';
  if (isset($_POST['where_to_use'])) {
    update_option('where_to_use', $_POST['where_to_use']);
    $where_to_use = $_POST['where_to_use'];
  }
  $where_to_use = get_option('where_to_use', 'default');
  echo '<h2>Settings</h2>'.'<p>Currently applied to: '.$where_to_use.'</p>';
  include 'options-form.php';
}

// Only load the scripts on certain pages, so you don't slow down other pages unnecessarily.
// See https://developer.wordpress.org/reference/functions/is_page_template
add_action('template_redirect', 'conditional_load');
function conditional_load() {
  if (isset($_POST['where_to_use'])) {
    update_option('where_to_use', $_POST['where_to_use']);
    $where_to_use = $_POST['where_to_use'];
  }
  $where_to_use = get_option('where_to_use', '');

  if ($where_to_use === 'pages') {
    $page_type = is_page();
  } else if ($where_to_use === 'posts') {
    $page_type = is_single();
  } else {
    $page_type = is_single() || is_page();
  }

  if ($page_type) { // change the conditional if needed!
    add_action('wp_enqueue_scripts', 'responsive_iframes_enqueue_script');
    add_action('wp_head','responsive_iframes');
  }
}
