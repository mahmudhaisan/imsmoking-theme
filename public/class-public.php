<?php // phpcs:ignore Class file names should be based on the class name with "class-" prepended.
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Imsmoking_Theme_Public {

	public static function get_instance() {
		static $instance = null;
		if ( null === $instance ) {
			$instance = new self();
		}
		return $instance;
	}

	public function run() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_resources' ) );
		add_action( 'init', array( $this, 'register_blocks' ) ); // 👈 Added
	}

	/**
	 * Register custom blocks from build/blocks
	 *
	 * @since 1.0.0
	 */
	public function register_blocks() {
		$blocks_dir = IMSMOKING_THEME_PATH . 'build/blocks/';

		if ( ! is_dir( $blocks_dir ) ) {
			return;
		}

		$block_folders = glob( $blocks_dir . '*', GLOB_ONLYDIR );

		if ( ! empty( $block_folders ) ) {
			foreach ( $block_folders as $block_folder ) {
				register_block_type( $block_folder );
			}
		}
	}

	/**
	 * Enqueue JS & CSS
	 */
	public function enqueue_resources() {
		/* Atomic CSS */
		wp_enqueue_style( 'atomic' );
		wp_style_add_data( 'atomic', 'rtl', 'replace' );

		$version = IMSMOKING_THEME_VERSION;

		wp_enqueue_style(
			IMSMOKING_THEME_THEME_NAME,
			IMSMOKING_THEME_URL . 'build/public/public.css',
			array(),
			$version
		);
		wp_style_add_data( IMSMOKING_THEME_THEME_NAME, 'rtl', 'replace' );

		/* Scripts dependency files */
		$deps_file = IMSMOKING_THEME_PATH . 'build/public/public.asset.php';

		$dependency = array();

		if ( file_exists( $deps_file ) ) {
			$deps_file  = require $deps_file;
			$dependency = $deps_file['dependencies'];
			$version    = $deps_file['version'];
		}

		wp_enqueue_script(
			IMSMOKING_THEME_THEME_NAME,
			IMSMOKING_THEME_URL . 'build/public/public.js',
			$dependency,
			$version,
			true
		);

		wp_set_script_translations(
			IMSMOKING_THEME_THEME_NAME,
			IMSMOKING_THEME_THEME_NAME
		);

		$localize = apply_filters(
			'imsmoking_theme_public_localize',
			array(
				'IMSMOKING_THEME_URL' => IMSMOKING_THEME_URL,
				'home_url'            => esc_url( home_url() ),
				'rest_url'            => get_rest_url(),
				'nonce'               => wp_create_nonce( 'wp_rest' ),
			)
		);

		wp_add_inline_script(
			IMSMOKING_THEME_THEME_NAME,
			sprintf(
				"var ImsmokingThemeLocalize = JSON.parse( decodeURIComponent( '%s' ) );",
				rawurlencode( wp_json_encode( $localize ) )
			),
			'before'
		);
	}
}

/**
 * Boot the class
 */
function imsmoking_theme_public() {//phpcs:ignore
	return Imsmoking_Theme_Public::get_instance();
}
imsmoking_theme_public()->run();
