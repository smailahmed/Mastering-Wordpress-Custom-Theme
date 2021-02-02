<?php
  // Function To Add My Custom Styles
  function custom_styles () {
    wp_enqueue_style('my-bootstrap', get_template_directory_url() 
    . '/css/bootstrap.min.css');
  }
?>