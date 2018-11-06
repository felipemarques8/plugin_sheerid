<?php 

function deals_init() {
    wp_register_style( 'd_bootstrap', plugins_url('assets/css/style.css', DEALS_PLUGIN_URL ) );
	wp_enqueue_style( 'd_bootstrap' );
		
	wp_register_script( 'd_script', plugins_url('assets/js/script.js', DEALS_PLUGIN_URL ) );
	wp_enqueue_script( 'd_script' );
	
	wp_register_script( 'sheerid_script', 'https://services-sandbox.sheerid.com/jsapi/SheerID.js' );
	wp_enqueue_script( 'sheerid_script' );
}