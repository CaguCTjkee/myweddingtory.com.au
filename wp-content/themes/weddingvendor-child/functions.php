<?php
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');
function enqueue_parent_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

// By Oleksii Biriukov
// Re-registration ajax-auth-script
function my_scripts_method()
{
    wp_deregister_script('ajax-auth-script');
    wp_register_script('ajax-auth-script', get_stylesheet_directory_uri() . '/js/ajax-auth-script.js', array('jquery'));
    wp_enqueue_script('ajax-auth-script');
}

add_action('wp_enqueue_scripts', 'my_scripts_method');
// Re-registration ajax-auth-script end

?>