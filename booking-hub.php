<?php
/**
 * Plugin Name: Booking Hub
 * Description: Powerfull Booking Management System.
 * Plugin URI: https://.liquid-themes.com/
 * Version: 1.0
 * Author: Liquid Themes
 * Author URI: https://liquid-themes.com/
 * Text Domain: booking-hub
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'BHUB_PATH', plugin_dir_path( __FILE__ ) );
define( 'BHUB_URL', plugin_dir_url( __FILE__ ) );
define( 'BHUB_VERSION', get_file_data( __FILE__, array('Version' => 'Version'), false)['Version'] );

require_once BHUB_PATH . 'includes/plugin.php';