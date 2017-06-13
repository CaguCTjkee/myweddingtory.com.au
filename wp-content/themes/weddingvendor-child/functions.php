<?php
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');
function enqueue_parent_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

// By Oleksii Biriukov
// Re-registration ajax-auth-script
function re_registration_auth_script()
{
    wp_deregister_script('ajax-auth-script');
    wp_register_script('ajax-auth-script', get_stylesheet_directory_uri() . '/js/ajax-auth-script.js', array('jquery'), '4.7.5.1');
    wp_enqueue_script('ajax-auth-script');

    if( function_exists('get_dashboard_link') )
    {
        $dashboard_link = get_dashboard_link();
    }
    if( function_exists('get_couple_dashboard_link') )
    {
        $get_couple_dashboard_link = get_couple_dashboard_link();
    }

    wp_localize_script('ajax-auth-script', 'ajax_auth_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'redirecturl' => $dashboard_link['url'],
        'loadingmessage' => esc_html__('Sending user info, please wait.', 'weddingvendor')
    ));

    wp_localize_script('ajax-auth-script', 'ajax_couple_auth_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'redirecturl' => $get_couple_dashboard_link['url'],
        'loadingmessage' => esc_html__('Sending user info, please wait.', 'weddingvendor')
    ));
}

add_action('wp_enqueue_scripts', 're_registration_auth_script');
// Re-registration ajax-auth-script end

?>