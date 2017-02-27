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

// Add an admin menu to collect and display information
add_action('admin_menu', 'plugin_menu');

function plugin_menu(){
  add_menu_page( 'Responsive iframes Page', 'iframes', 'manage_options', 'kmf-responsive-iframes', 'options_init' );
}

function options_init(){
  ?>
    <h1>KMF Responsive iFrames</h1>
    <p><a href="https://github.com/KatieMFritz/kmf-responsive-iframes" target="_blank">Current version and documentation</a></p>
    <section>
      <h2>How to set up the "child" site</h2>
      <p>The child site is the site that will be displayed <em>inside</em> your iframes.</p>
      <ol>
        <li>Upload <a href="https://github.com/KatieMFritz/kmf-responsive-iframes/blob/master/iframes-child.js" target="_blank"><code>iframes-child.js</code></a> to a public directory in your <em>child</em> website.</li>
        <li>Copy the public file path or link.</li>
        <li>Add the following code to your child website (in the header, footer, or a "Global JavaScript" section):
          <pre><code>&lt;script src="[file path you copied for iframes-child.js]"&gt;&lt;/script&gt;</code></pre></li>
      </ol>
    </section>
    <section>
      <h2>How to add an iframe to a page or post</h2>
      <p>Once you've installed everything:</p>
      <ol>
        <li>Copy the URL for the page you want to embed (the child page).</li>
        <li>In your WordPress page or post, go to the text editor (<em>not</em>the visual editor) and paste the following code:
          <pre><code>&lt;iframe class="iframe" src="[URL OF CHILD PAGE]"&gt;&lt;/iframe&gt;</code></pre></li>
      </ol>
    </section>
  <?php
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
