<?php
/**
 * Plugin Name: Steelbak Search
 * Plugin URI: https://github.com/Steelbak/steelbak-search
 * Description: Steelbak-branded, extensible search framework for WordPress sites.
 * Version: 0.1.0
 * Requires at least: 6.4
 * Requires PHP: 8.2
 * Author: Steelbak
 * Author URI: https://steelbak.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: steelbak-search
 * Domain Path: /languages
 */

define( 'STEELBAK_SEARCH_VERSION', '0.1.0' );

define( 'STEELBAK_SEARCH_PLUGIN_FILE', __FILE__ );

define( 'STEELBAK_SEARCH_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'STEELBAK_SEARCH_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( file_exists( STEELBAK_SEARCH_PLUGIN_PATH . 'vendor/autoload.php' ) ) {
	require STEELBAK_SEARCH_PLUGIN_PATH . 'vendor/autoload.php';
}

if ( class_exists( '\\Steelbak\\Search\\Application' ) ) {
	Steelbak\Search\Application::instance()->boot();
}
