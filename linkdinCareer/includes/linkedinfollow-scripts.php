<?php
  // Add Scripts
  function linkd_add_scripts(){
    // Add Main CSS
    wp_enqueue_style('lin-main-style', plugins_url(). '/linkdinCareer/css/style.css');
    // Add Main JS
    wp_enqueue_script('lin-main-script', plugins_url(). '/linkdinCareer/js/main.js');

    // Add linkedin Script
    //wp_register_script('linkedIn', 'https://platform.linkedin.com/in.js');
    //wp_enqueue_script('linkedIn');
  }

 // add_action('wp_enqueue_scripts', 'lin_add_scripts');