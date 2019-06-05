<?php
/*
Plugin Name: LinkedIn Follow 
Description: Display LinkedIn follow button
Version: 1.0.0
Author: Aslesha Kamera
*/

// Exit if accessed directly
if(!defined('ABSPATH')){
  exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/linkedinfollow-scripts.php');

// Load Class
require_once(plugin_dir_path(__FILE__).'/includes/linkedinfollow-class.php');

// Register Widget
function register_linkedinfollow(){
  register_widget('linkedin_follow_Widget');
}

// Hook in function
add_action('widgets_init', 'register_linkedinfollow');