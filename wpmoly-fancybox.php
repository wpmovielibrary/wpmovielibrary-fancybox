<?php
/**
 * WPMovieLibrary-FancyBox
 *
 * Implements Janis Skarnelis' FancyBox jQuery effect for WPMovieLibrary Images
 * and Posters Shortcodes
 *
 * @package   WPMovieLibrary-FancyBox
 * @author    Charlie MERLAND <charlie@caercam.org>
 * @license   GPL-3.0
 * @link      http://www.caercam.org/
 * @copyright 2014 CaerCam.org
 *
 * @wordpress-plugin
 * Plugin Name: WPMovieLibrary-FancyBox
 * Plugin URI:  http://wpmovielibrary.com/extensions/wpmovielibrary-fancybox/
 * Description: Implements Janis Skarnelis' FancyBox jQuery effect for WPMovieLibrary Images and Posters Shortcodes
 * Version:     1.3
 * Author:      Charlie MERLAND
 * Author URI:  http://www.caercam.org/
 * License:     GPL-3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * GitHub Plugin URI: https://github.com/CaerCam/wpmovielibrary-fancybox
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WPMOLY_FBOX_NAME',                   'WPMovieLibrary-FancyBox' );
define( 'WPMOLY_FBOX_VERSION',                '1.3' );
define( 'WPMOLY_FBOX_SLUG',                   'wpmoly-fancybox' );
define( 'WPMOLY_FBOX_URL',                    plugins_url( basename( __DIR__ ) ) );
define( 'WPMOLY_FBOX_PATH',                   plugin_dir_path( __FILE__ ) );
define( 'WPMOLY_FBOX_REQUIRED_PHP_VERSION',   '5.3' );
define( 'WPMOLY_FBOX_REQUIRED_WP_VERSION',    '3.8' );

/**
 * Checks if the system requirements are met
 * 
 * @since    1.0
 * 
 * @return   bool    True if system requirements are met, false if not
 */
function wpmolylb_requirements_met() {

	global $wp_version;

	if ( version_compare( PHP_VERSION, WPMOLY_FBOX_REQUIRED_PHP_VERSION, '<' ) )
		return false;

	if ( version_compare( $wp_version, WPMOLY_FBOX_REQUIRED_WP_VERSION, '<' ) )
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

	require_once WPMOLY_FBOX_PATH . '/views/requirements-error.php';
}

/*
 * Check requirements and load main class
 * The main program needs to be in a separate file that only gets loaded if the
 * plugin requirements are met. Otherwise older PHP installations could crash
 * when trying to parse it.
 */
if ( wpmolylb_requirements_met() ) {

	require_once( WPMOLY_FBOX_PATH . 'class-wpmoly-fancybox.php' );

	if ( class_exists( 'WPMovieLibrary_FancyBox' ) ) {
		$GLOBALS['wpmolyfbox'] = new WPMovieLibrary_FancyBox();
		register_activation_hook(   __FILE__, array( $GLOBALS['wpmolyfbox'], 'activate' ) );
		register_deactivation_hook( __FILE__, array( $GLOBALS['wpmolyfbox'], 'deactivate' ) );
	}
}
else {
	
	
}
