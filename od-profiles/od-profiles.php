<?php
/**
 * Plugin Name: OD Profiles
 * Description: Creates new post type for Professional and Business users including a new template for front-end profile pages.
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

wp_enqueue_script( 'profiles-main',  '/wp-content/plugins/od-profiles/js/profiles-main.js', array( 'jquery' ), '1.0.0', true );
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'includes/profile-pages.php');
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'includes/dec-status.php');