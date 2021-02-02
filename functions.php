<?php
  // Function To Add My Custom Styles
  function custom_styles () {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() 
    . '/css/bootstrap.min.css');
  }
  // Function To Add My Custom Scripts
  function custom_scripts () {
    wp_enqueue_script('bootstrap-js', get_template_directory_uri()
    .'js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script('main-js', get_template_directory_uri()
    . 'js/main.js', array(), false, true);
    wp_enqueue_script('fontawesome-js', get_template_directory_uri()
    . 'https://kit.fontawesome.com/256e25e1a8.js', array(), false, true);
  }
  // Add Actions
  add_action('wp_enqueue_scripts', 'custom_styles');
  add_action('wp_enqueue_scripts', 'custom_scripts');
?>