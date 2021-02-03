<?php
  // Include NavWalker Class For Bootstrap Navigation Menu
  require_once('wp-bootstrap-navwalker.php');
  // Add Featured Image Support
  add_theme_support('post-thumbnails'); 
  // Function To Add My Custom Styles
  function custom_styles () {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() 
    . '/css/bootstrap.min.css');
    wp_enqueue_style('main', get_template_directory_uri() 
    . '/css/main.css');
  }
  // Function To Add My Custom Scripts
  function custom_scripts () {
    // Remove Registeration For Old jQuery
    wp_deregister_script('jquery');
    // Register A New jQuery In Footer
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, '', true);
    // Enqueue The New jQuery
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri()
    .'/js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script('main-js', get_template_directory_uri()
    . '/js/main.js', array(), false, true);
    wp_enqueue_script('fontawesome-js', 'https://kit.fontawesome.com/256e25e1a8.js'
    ,array(), false, true);
    wp_enqueue_script('html5shiv', get_template_directory_uri()
    . '/js/html5shiv.min.js');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
    wp_enqueue_script('respond', get_template_directory_uri()
    . '/js/respond.min.js');
    wp_script_add_data('respond', 'conditional', 'lt IE 9');
  }
  // Add Actions
  add_action('wp_enqueue_scripts', 'custom_styles');
  add_action('wp_enqueue_scripts', 'custom_scripts');
  // Add Custom Menu Support
  function register_custom_menu () {
    // Register Custom Menus
    register_nav_menus(array(
      'bootstrap-menu' => 'Navigation Bar',
      'footer-menu'    => 'Footer Menu'
    ));
  }
  add_action('init', 'register_custom_menu');
  // Add Bootstrap Navigation Bar
  function bootstrap_menu () {
    wp_nav_menu(array(
      'theme_location' => 'bootstrap-menu',
      'menu_class'     => 'nav navbar-nav',
      'container'      => false,
      'depth'          => 2,
      'walker'         => new WP_Bootstrap_Navwalker()
    ));
  }
?>