<?php
/**
 * WPMovieLibrary-LightBox
 *
 * Implements Lokesh Dhakar's LightBox2 jQuery effect for WPMovieLibrary Images
 * and Posters Shortcodes
 *
 * @package   WPMovieLibrary-LightBox
 * @author    Charlie MERLAND <charlie@caercam.org>
 * @license   GPL-3.0
 * @link      http://www.caercam.org/
 * @copyright 2014 CaerCam.org
 *
 * @wordpress-plugin
 * Plugin Name: WPMovieLibrary-LightBox
 * Plugin URI:  http://wpmovielibrary.com/extensions/wpmovielibrary-lightbox/
 * Description: Implements Lokesh Dhakar's LightBox2 jQuery effect for WPMovieLibrary Images and Posters Shortcodes
 * Version:     1.2
 * Author:      Charlie MERLAND
 * Author URI:  http://www.caercam.org/
 * License:     GPL-3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * GitHub Plugin URI: https://github.com/CaerCam/wpmovielibrary-lightbox
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WPMOLY_LB_NAME',                   'WPMovieLibrary-LightBox' );
define( 'WPMOLY_LB_VERSION',                '1.2' );
define( 'WPMOLY_LB_SLUG',                   'wpmoly-lightbox' );
define( 'WPMOLY_LB_URL',                    plugins_url( basename( __DIR__ ) ) );
define( 'WPMOLY_LB_PATH',                   plugin_dir_path( __FILE__ ) );
define( 'WPMOLY_LB_REQUIRED_PHP_VERSION',   '5.3' );
define( 'WPMOLY_LB_REQUIRED_WP_VERSION',    '3.8' );

/**
 * Checks if the system requirements are met
 * 
 * @since    1.0
 * 
 * @return   bool    True if system requirements are met, false if not
 */
function wpmolylb_requirements_met() {

	global $wp_version;

	if ( version_compare( PHP_VERSION, WPMOLY_LB_REQUIRED_PHP_VERSION, '<' ) )
		return false;

	if ( version_compare( $wp_version, WPMOLY_LB_REQUIRED_WP_VERSION, '<' ) )
		return false;

	return true;
}

/**
 * Prints an error that the system requirements weren't met.
 * 
 * @since    1.0
 */
function wpmolylb_requirements_error() {
	global $wp_version;

	require_once WPMOLY_LB_PATH . '/views/requirements-error.php';
}

/*
 * Check requirements and load main class
 * The main program needs to be in a separate file that only gets loaded if the
 * plugin requirements are met. Otherwise older PHP installations could crash
 * when trying to parse it.
 */
if ( wpmolylb_requirements_met() ) {

	require_once( WPMOLY_LB_PATH . 'class-wpmoly-lightbox.php' );

	if ( class_exists( 'WPMovieLibrary_LightBox' ) ) {
		$GLOBALS['wpmolylb'] = new WPMovieLibrary_LightBox();
		register_activation_hook(   __FILE__, array( $GLOBALS['wpmolylb'], 'activate' ) );
		register_deactivation_hook( __FILE__, array( $GLOBALS['wpmolylb'], 'deactivate' ) );
	}
}
else {
	
	
}
