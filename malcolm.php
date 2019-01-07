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
        'border' => 0,
        'footer' => true,
        'header' => true,
        'height' => '600px',
        'promos' => false,
        'url' => '',
        'width' => '100%'
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
 * Build a Malcolm! url.
 *
 * @param string $path
 * @param array $atts
 * @return array
 */
function malcolm_build_embed_url($path = '', array $atts = [])
{
    $atts = malcolm_normalise_atts($atts);

    $query = [];

    if (($header = array_get($atts, 'header'))) {
        $query['header'] = 'true';
    } else {
        $query['header'] = 'false';
    }

    if (($promos = array_get($atts, 'promos'))) {
        $query['promos'] = 'true';
    } else {
        $query['promos'] = 'false';
    }

    if (($footer = array_get($atts, 'footer'))) {
        $query['footer'] = 'true';
    } else {
        $query['footer'] = 'false';
    }

    $url = array_get(get_option('malcolm'), 'url') . '/embed' . ( $path ? '/' . ltrim($path, '/') : '' );

    if (!empty($query)) {
        $url = $url . '?' . http_build_query($query);
    }

    return $url;
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
 * Normalise the passed shortcode attributes.
 *
 * @param mixed $atts
 * @return array
 */
function malcolm_normalise_atts($atts = [])
{
    $normalised = array_change_key_case((array) $atts, CASE_LOWER);

    foreach ($normalised as $key => $value) {

        if ($value === 'false') {
            $value = false;
        } elseif ($value === 'true') {
            $value = true;
        } elseif (is_numeric($value) && (int) $value == $value) {
            $value = (int) $value;
        }

        array_set($normalised, $key, $value);
    }

    $options = get_option('malcolm');

    $default = [
        'border' => array_get($options, 'border', 0),
        'footer' => array_get($options, 'footer', true),
        'header' => array_get($options, 'header', true),
        'height' => array_get($options, 'height', '600px'),
        'promos' => array_get($options, 'header', false),
        'width' => array_get($options, 'width', '100%')
    ];

    return shortcode_atts($default, $normalised);
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
    if (($slug = array_shift($atts))) {
        $src = malcolm_build_embed_url('faqs/' . $slug, $atts);
    } else {
        $src = malcolm_build_embed_url('faqs', $atts);
    }

    extract(malcolm_normalise_atts($atts));

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
function malcolm_output_faqs($atts = [])
{
    $src = malcolm_build_embed_url('faqs', $atts);

    extract(malcolm_normalise_atts($atts));

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
function malcolm_output_instance($atts = [])
{
    $src = array_get(get_option('malcolm'), 'url') . '/embed';

    extract(malcolm_normalise_atts($atts));

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
function malcolm_output_url($atts = [])
{
    if (($path = array_shift($atts))) {
        $src = malcolm_build_embed_url($path, $atts);
    } else {
        $src = malcolm_build_embed_url('', $atts);
    }

    extract(malcolm_normalise_atts($atts));

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
    if (($slug = array_shift($atts))) {
        $src = malcolm_build_embed_url('workflows/' . $slug, $atts);
    } else {
        $src = malcolm_build_embed_url('workflows', $atts);
    }

    extract(malcolm_normalise_atts($atts));

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
function malcolm_output_workflows($atts = [])
{
    $src = malcolm_build_embed_url('workflows', $atts);

    extract(malcolm_normalise_atts($atts));

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
            'border' => intval(array_get($_POST, 'malcolm_border')),
            'footer' => isset($_POST['malcolm_footer']),
            'header' => isset($_POST['malcolm_header']),
            'height' => array_get($_POST, 'malcolm_height'),
            'promos' => isset($_POST['malcolm_promos']),
            'url' => rtrim(array_get($_POST, 'malcolm_url'), '/'),
            'width' => array_get($_POST, 'malcolm_width')
        ]);
    }
}

add_action('admin_menu', 'malcolm_admin_menu');
add_action('wp_loaded', 'malcolm_wp_loaded');

add_shortcode('malcolm_faq', 'malcolm_output_faq');
add_shortcode('malcolm_faqs', 'malcolm_output_faqs');
add_shortcode('malcolm_instance', 'malcolm_output_instance');
add_shortcode('malcolm_url', 'malcolm_output_url');
add_shortcode('malcolm_workflow', 'malcolm_output_workflow');
add_shortcode('malcolm_workflows', 'malcolm_output_workflows');
