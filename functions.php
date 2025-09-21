<?php // phpcs:ignore
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Imsmoking Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Imsmoking Theme
 */

/**
 * Current theme path.
 * Current theme url.
 * Current theme version.
 * Current theme name.
 * Current theme option name.
 */
define( 'IMSMOKING_THEME_PATH', trailingslashit( get_template_directory() ) );
define( 'IMSMOKING_THEME_URL', trailingslashit( get_template_directory_uri() ) );
define( 'IMSMOKING_THEME_VERSION', '1.0.0' );
define( 'IMSMOKING_THEME_THEME_NAME', 'imsmoking-theme' );
define( 'IMSMOKING_THEME_OPTION_NAME', 'imsmoking-theme' );

/**
 * The core theme class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require IMSMOKING_THEME_PATH . 'includes/main.php';

/**
 * Begins execution of the theme.
 *
 * @since    1.0.0
 */
function imsmoking_theme_run() {
	new Imsmoking_Theme();
}
imsmoking_theme_run();
