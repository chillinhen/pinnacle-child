<?php
add_action('after_setup_theme', 'child_theme_setup');

function child_theme_setup() {
  function theme_enqueue_scripts() {
    if (!is_admin()) {
      wp_register_script('custom-script', get_stylesheet_directory_uri() . '/customize.js', array(), '1.0.0',true, true); // Custom scripts
      wp_enqueue_script('custom-script'); // Enqueue it!
      // Cookie Bar
      wp_register_script('cookie-bar', get_stylesheet_directory_uri() . '/cookie-bar/cookiebar-latest.min.js?theme=white&tracking=1&thirdparty=1&refreshPage=1&showNoConsent=1&&remember=30&privacyPage=http%3A%2F%2Fsprachsommer.spraachen.org%2Findex.php%2Fdatenschutz%2F', array('jquery'), false, true);
      wp_enqueue_script('cookie-bar');
    }
  }
  function theme_enqueue_styles() {
    wp_register_style('fonts', get_stylesheet_directory_uri() . '/fonts.css', 'style', '1.0', 'screen', array());
    wp_enqueue_style('fonts');
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_register_style('customize', get_stylesheet_directory_uri() . '/customize.css', 'style', '1.0', 'screen', array('fonts', 'style'), false, true);
    wp_enqueue_style('customize');


  }
  add_action('init', 'theme_enqueue_scripts'); // Add Custom Scripts to wp_head
  add_action('wp_enqueue_scripts', 'theme_enqueue_styles'); // Add Theme Stylesheet

}
?>
