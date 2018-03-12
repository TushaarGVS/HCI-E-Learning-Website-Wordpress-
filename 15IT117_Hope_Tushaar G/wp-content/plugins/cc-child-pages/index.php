<?php
/*
Plugin Name: CC Child Pages
Plugin URI: http://ccchildpages.ccplugins.co.uk/
Description: Show links to child pages
Author: Caterham Computing
Text Domain: cc-child-pages
Domain Path: /languages
Version: 1.36
Author URI: https://caterhamcomputing.net/
*/
include_once('includes/ccchildpages.php');

add_shortcode( 'child_pages', 'ccchildpages::show_child_pages' );
add_action( 'wp_enqueue_scripts', 'ccchildpages::enqueue_styles' );
add_action( 'plugins_loaded', 'ccchildpages::load_plugin_textdomain' );

include_once('includes/ccchildpages_widget.php');
// register widget
function register_ccchildpages_widget() {
    register_widget( 'ccchildpages_widget' );
}
add_action( 'widgets_init', 'register_ccchildpages_widget' );

// Dashboard feed - for future release
// add_action( 'wp_dashboard_setup', 'ccchildpages::dashboard_widgets');

// TinyMCE Buttons
add_action( 'init', 'ccchildpages::tinymce_buttons' );

// Show excerpt for pages ...
add_action ( 'init', 'ccchildpages::show_page_excerpt');

// Add action links for plugin
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'ccchildpages::plugin_action_links' );

// Add links to plugin meta
add_filter( 'plugin_row_meta', 'ccchildpages::plugin_row_meta', 10, 4 );

// Set default option values
register_activation_hook(__FILE__, 'ccchildpages::options_activation');

// Regsiter settings
add_action('admin_init', 'ccchildpages::register_options');

// Add options page
add_action('admin_menu', 'ccchildpages::options_menu');

// Add custom query variables for paging
add_filter( 'query_vars', 'ccchildpages::add_query_strings' );

// Add action to handle offset correction for pagination ...
add_action( 'pre_get_posts', 'ccchildpages::query_offset', 1 );

// Exempt our new shortcode from texturising ...
add_filter( 'no_texturize_shortcodes', 'ccchildpages::exempt_from_wptexturize' );


/*EOF*/