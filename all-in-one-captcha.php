<?php
/**
 * Plugin Name: All In One Captcha
 * Plugin URI: https://aiocaptcha.com/
 * Description: All In One Captcha including Google reCAPTCHA, Cloudflare Turnstile and hCaptcha.
 * Version: 1.0.9
 * Requires at least: 6.0
 * Requires PHP: 7.2
 * Author: All In One Captcha
 * Text Domain: all-in-one-captcha
 * Domain Path: /languages
 * License: GPL3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AIOC_VERSION', '1.0.9' );
define( 'AIOC_SLUG', 'all-in-one-captcha' );
define( 'AIOC_BASENAME', plugin_basename( __FILE__ ) );
define( 'AIOC_PLUGIN_FILE', __FILE__ );
define( 'AIOC_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
define( 'AIOC_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );

if ( file_exists( AIOC_DIR . '/vendor/autoload.php' ) ) {
	require_once AIOC_DIR . '/vendor/autoload.php';
}

// Init.
require_once AIOC_DIR . '/inc/init.php';

/**
 * Activate the plugin.
 *
 * @since 1.0.0
 */
function aioc_activate() {
	$pointer = '<p>All In One Captcha is activated. Please go to <a href="' . esc_url( admin_url( 'options-general.php?page=aioc-options' ) ) . '">Settings >> All In One Captcha</a> to complete the setup and view other options.</p>';
	update_option( 'aioc_pointer', $pointer );
}
register_activation_hook( __FILE__, 'aioc_activate' );

/**
 * Deactivate the plugin.
 *
 * @since 1.0.0
 */
function aioc_deactivate() {
	if ( get_option( 'aioc_pointer' ) ) {
		delete_option( 'aioc_pointer' );
	}
}
register_deactivation_hook( __FILE__, 'aioc_deactivate' );
