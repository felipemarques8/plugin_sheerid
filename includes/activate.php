<?php
function d_activate_plugin() {
    if( version_compare( get_bloginfo('version'), '4.2', '<' ) ) {
        wp_die( __('You must update Wordpress to use this plugin.', 'deals') );
    }

    // wp_schendule_event( time(), 'daly', 'd_daily_deals_hook');
}