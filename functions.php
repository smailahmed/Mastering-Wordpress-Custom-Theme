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
  // Customize The Excerpt Word Length & Read More Dots
  function extend_excerpt_length ($length) {
    if (is_author()) {             // Inside Author Page
      return 30;
    } else if (is_category()) {    // Inside Category Page
      return 50;
    } else {                       // On Other Pages
      return 80;
    }
  }
  add_filter('excerpt_length', 'extend_excerpt_length');
  function excerpt_change_dots ($more) {
    return ' ...';
  }
  add_filter('excerpt_more', 'excerpt_change_dots');
  // Numbering Pagination
  function numbering_pagination () {
    global $wp_query;                               // Make WP_Query Global
    $all_pages = $wp_query->max_num_pages;          // Get All Posts
    $current_page = max(1, get_query_var('paged')); // Get Current Page
    if ($all_pages > 1) {
      return paginate_links(array(
        'base'     => get_pagenum_link() . '%_%',
        'format'   => '?paged=%#%',
        'current'  => $current_page,
        'mid-size' => 3,
        'end-size' => 3,
        'prev_text'=> __("<<"),
        'next_text'=> __(">>"),
      ));
    }
  }
  // Register Sidebar
  function main_sidebar () {
    // Register Main Sidebar
    register_sidebar (array(
      'name'          => 'Main Sidebar',
      'id'            => 'main-sidebar',
      'description'   => 'Main Sidebar Appear Everywhere',
      'class'         => 'main-sidebar',
      'before_widget' => '<div class="widget-content">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>'
    ));
  }
  add_action('widgets_init', 'main_sidebar');
?>