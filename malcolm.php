<?php
/*
Plugin Name: Malcolm!
Description: A Wordpress plugin for embedding Malcolm! pages.
Author: Acknowledgement Ltd
Date: February 2018
*/

if (!function_exists('add_action')) {
    exit;
}

require_once(plugin_dir_path(__FILE__) . 'malcolm-utilities.php');

register_activation_hook(__FILE__, 'malcolm_activate');
register_deactivation_hook(__FILE__, 'malcolm_deactivate');

/**
 * Run when the plugin is activated.
 *
 * @return void
 */
function malcolm_activate()
{
    add_option('malcolm', [
        'id' => '',
        'uri' => ''
    ]);
}

/**
 * Define an options page for the admin.
 *
 * @return void
 */
function malcolm_admin_menu()
{
    add_options_page('Malcolm! Settings', 'Malcolm!', 'manage_options', 'malcolm', 'malcolm_output_admin_options');
}

/**
 * Run when the plugin is deactivated.
 *
 * @return void
 */
function malcolm_deactivate()
{
    delete_option('malcolm');
}

/**
 * Get a plugin option.
 *
 * @return void
 */
function malcolm_get_option_value($key, $default = null)
{
    return array_get(get_option('malcolm'), $key, $default);
}

/**
 * Output the HTML for the plugin options page in the admin tool.
 *
 * @return void
 */
function malcolm_output_admin_options()
{
    if (!current_user_can('manage_options') )  {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    if (!($options = get_option('malcolm'))) {
        wp_die(__('Missing the options.'));
    }

    ob_start();
    include(plugin_dir_path(__FILE__) . 'malcolm-admin-options.php');
    echo ob_get_clean();
}

/**
 * Ouput the HTML for embed.
 *
 * @param mixed $atts
 * @return void
 */
function malcolm_output_faq($atts = [])
{
    $options = [
        'blended' => false,
        'content' => 'faq',
        'faq' => array_shift($atts),
        'height' => '700px',
        'navbar' => false,
        'searchBar' => false,
        'width' => '100%'
    ];

    ob_start();
    include(plugin_dir_path(__FILE__) . 'malcolm-embed.php');
    return ob_get_clean();
}

/**
 * Ouput the HTML for embed.
 *
 * @param mixed $atts
 * @return void
 */
function malcolm_output_popular($atts = [])
{
    $options = [
        'blended' => false,
        'content' => 'filtered',
        'filter' => 'popular',
        'height' => '700px',
        'width' => '100%'
    ];

    ob_start();
    include(plugin_dir_path(__FILE__) . 'malcolm-embed.php');
    return ob_get_clean();
}

/**
 * Ouput the HTML for embed.
 *
 * @param mixed $atts
 * @return void
 */
function malcolm_output_workflow($atts = [])
{
    $options = [
        'blended' => false,
        'content' => 'workflow',
        'height' => '700px',
        'navbar' => false,
        'searchBar' => false,
        'width' => '100%',
        'workflow' => array_shift($atts)
    ];

    ob_start();
    include(plugin_dir_path(__FILE__) . 'malcolm-embed.php');
    return ob_get_clean();
}

/**
 * Check for post requests once WP and all its dependencies have loaded.
 *
 * @return void
 */
function malcolm_wp_loaded()
{
    if (array_key_exists('option_page', $_POST) && $_POST['option_page'] === 'malcolm') {
        update_option('malcolm', [
            'id' => array_get($_POST, 'malcolm_id'),
            'uri' => rtrim(array_get($_POST, 'malcolm_uri'), '/')
        ]);
    }
}

add_action('admin_menu', 'malcolm_admin_menu');
add_action('wp_loaded', 'malcolm_wp_loaded');

add_shortcode('malcolm_faq', 'malcolm_output_faq');
add_shortcode('malcolm_popular', 'malcolm_output_popular');
add_shortcode('malcolm_workflow', 'malcolm_output_workflow');
