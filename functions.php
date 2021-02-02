<?php
  // Function To Add My Custom Styles
  function custom_styles () {
    wp_enqueue_style('bootstrap-css', get_template_directory_url() 
    . '/css/bootstrap.min.css');
  }
  // Function To Add My Custom Scripts
  function custom_scripts () {
    wp_equeue_script('bootstrap-js', get_template_directory_url()
    .'js/bootstrap.bundle.min.js', array(), false, true);
    wp_equeue_script('main-js', get_template_directory_url()
    . 'js/main.js', array(), false, true);
    wp_equeue_script('fontawesome-js', get_template_directory_url()
    . 'https://kit.fontawesome.com/256e25e1a8.js', array(), false, true);
  }
?>