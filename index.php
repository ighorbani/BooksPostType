<?php

/**
 * Plugin Name: Books Post Type
 * Author: Iman Ghorbani
 * Author URI: https://imanghorbani.com
 * Version: 1.0.0
 * Description: A plugin which add BOOK post type in your wordpress website!
 * Text Domain: books-post-type
 */


if (!defined('ABSPATH')) : exit();
endif; //NO DIRECT ACCESS


// DEFINE PLUGIN CONSTANTS
define('plugin_path', trailingslashit(plugin_dir_path(__FILE__)));
define('plugin_url', trailingslashit(plugins_url('/', __FILE__)));

// POST TYPE
require_once plugin_path . 'classes/register-post-type.php';

// CUSTOM FIELDS
require_once plugin_path . 'classes/register-custom-fields.php';

// FRONT SINGLE PAGE
require_once plugin_path . 'classes/add_single_page.php';

// ADD STYLES
add_action('wp_enqueue_scripts', 'setting_up_styles');
function setting_up_styles()
{
    wp_register_style('editor-styles', plugins_url('styles/editor.css', __FILE__));
    wp_enqueue_style('editor-styles');

    wp_register_style('front-styles', plugins_url('styles/front.css', __FILE__));
    wp_enqueue_style('front-styles');
}
