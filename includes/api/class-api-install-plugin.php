<?php // phpcs:ignore Class file names should be based on the class name with "class-" prepended.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class used to install a plugin via the REST API.
 *
 * @link       https://www.acmeit.org/
 * @since      1.0.0
 *
 * @package    Imsmoking_Theme
 * @subpackage Imsmoking_Theme/Imsmoking_Theme_Install_Plugin
 */

/**
 * Class used to install a plugin via the REST API.
 *
 * @package    Imsmoking_Theme
 * @subpackage Imsmoking_Theme/Imsmoking_Theme_Install_Plugin
 * @author     codersantosh <codersantosh@gmail.com>
 *
 * @see Imsmoking_Theme_Api
 */
if ( ! class_exists( 'Imsmoking_Theme_Install_Plugin ' ) ) {

	/**
	 * Imsmoking_Theme_Install_Plugin
	 *
	 * @package Imsmoking_Theme
	 * @since 1.0.0
	 */
	class Imsmoking_Theme_Install_Plugin extends Imsmoking_Theme_Api {

		/**
		 * Initialize the class and set up actions.
		 *
		 * @access public
		 * @return void
		 */
		public function run() {
			$this->type      = 'imsmoking_theme_api_install_plugin';
			$this->rest_base = 'install-plugin';

			/*Custom Rest Routes*/
			add_action( 'rest_api_init', array( $this, 'register_routes' ) );
		}

		/**
		 * Register REST API route.
		 *
		 * @since    1.0.0
		 */
		public function register_routes() {
			$namespace = $this->namespace . $this->version;

			register_rest_route(
				$namespace,
				'/' . $this->rest_base,
				array(
					array(
						'methods'             => WP_REST_Server::EDITABLE,
						'callback'            => array( $this, 'install_plugin' ),
						'args'                => array(
							'slug'   => array(
								'required' => true,
								'type'     => 'string',
							),
							'plugin' => array(
								'required' => true,
								'type'     => 'string',
							),
						),
						'permission_callback' => array( $this, 'install_plugin_permissions_check' ),
					),
				)
			);
		}

		/**
		 * Checks if a given request has access to install plugins.
		 *
		 * @since 1.0.0
		 *
		 * @param WP_REST_Request $request Full details about the request.
		 * @return bool True if the request has install permissions, otherwise false.
		 */
		public function install_plugin_permissions_check( $request ) {
			return current_user_can( 'install_plugins' );
		}

		/**
		 * Installs and activates a plugin.
		 *
		 * @since 1.0.0
		 *
		 * @param WP_REST_Request $request Full details about the request.
		 * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
		 */
		public function install_plugin( $request ) {
			return rest_ensure_response( imsmoking_theme_install_plugin( $request->get_params() ) );
		}

		/**
		 * Gets an instance of this object.
		 * Prevents duplicate instances which avoid artefacts and improves performance.
		 *
		 * @static
		 * @access public
		 * @return object
		 * @since 1.0.0
		 */
		public static function get_instance() {
			// Store the instance locally to avoid private static replication.
			static $instance = null;

			// Only run these methods if they haven't been ran previously.
			if ( null === $instance ) {
				$instance = new self();
			}

			// Always return the instance.
			return $instance;
		}
	}
}

/**
 * Return instance of  Imsmoking_Theme_Install_Plugin  class
 *
 * @since 1.0.0
 *
 * @return Imsmoking_Theme_Install_Plugin
 */
function imsmoking_theme_api_install_plugin() { //phpcs:ignore
	return Imsmoking_Theme_Install_Plugin::get_instance();
}
imsmoking_theme_api_install_plugin()->run();
