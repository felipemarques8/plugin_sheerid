<?php
/**
 * Plugin Name: Deals
 * Description: A Deals Wordpress plugin that allows users to create  deals
 * Version: 1.0
 * Author: Felipe Marques: 
 * Author: URI: 
 * Text
 */

 if( !function_exists( 'add_action' ) ) {
    echo 'Not allowed!';
    exit();
 }

 // Setup
 define( 'DEALS_PLUGIN_URL', __FILE__ );

 // Includes
include( 'includes/activate.php' );
include( 'includes/deactivate.php' );
include('includes/shortcode/show.php');
include( 'includes/init.php' );
//include( 'includes/admin/init.php' );
//include( 'process/save-post.php' );
//include( 'process/filter-content.php' );

 // Hooks
register_activation_hook( __FILE__, 'd_activate_plugin' );
register_deactivation_hook( __FILE__, 'd_deactive_plugin' );
add_action( 'init', 'deals_init' );
//add_action( 'admin_init', 'deals_admin_init' );
//add_action( 'save_post_deals', 'd_save_post_admin', 10, 3 );
//add_filter( 'the_content', 'd_filter_deals_content' );
//add_action( 'd_daily_deals_hook', 'd_generate_daily_deals' );

 // shortcodes
 add_shortcode('show_deals', 'd_show_deals_shortcode');