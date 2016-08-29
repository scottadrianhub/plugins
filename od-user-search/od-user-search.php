<?php
/**
 * Plugin Name: OD User Search
 * Description: Creates shortcodes and template tag to add an ajax user search form.
 * Version: 0.1.0
 * Author: Scott Adrian
 *
 * @copyright 2016
 * @author Scott Adrian
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY FOR A PARTICULAR PURPOSE.
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

function od_user_search(){
    
    wp_enqueue_script( 'od-main',  '/wp-content/plugins/od-user-search/js/od-main.js', array( 'jquery' ), '1.0.0', true );
        
    wp_enqueue_script( 'typeahead', '/wp-content/plugins/od-user-search/js/typeahead.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_style( 'od-user-search', '/wp-content/plugins/od-user-search/css/od-user-search.css',false,'1.1','all');
    
    require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'includes/od-user-search-class.php');
    require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'includes/od-search-form.php');
}

add_shortcode( 'od-user-search', 'od_user_search' );