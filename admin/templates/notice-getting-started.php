<?php // phpcs:ignore
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Template for getting started notice.
 *
 * @link       https://www.acmeit.org/
 * @since      1.0.0
 *
 * @package    Imsmoking_Theme
 * @subpackage Imsmoking_Theme/Imsmoking_Theme_Intro
 */
?>
<div id="imsmoking-handler-theme-gsn" class="updated notice-info imsmoking-handler-theme-gsn at-pos">
	<button class="imsmoking-handler-theme-gsn-close notice-dismiss at-flx at-al-itm-ctr">
		<?php esc_html_e( 'Dismiss', 'imsmoking-theme' ); ?>
	</button>
	<div class="imsmoking-handler-theme-gsn-container at-flx at-gap at-p">
		<img class="imsmoking-handler-theme-gsn-screenshot at-w" src="<?php echo esc_url( IMSMOKING_THEME_URL . 'screenshot.png' ); ?>" alt="<?php esc_attr_e( 'Imsmoking Theme', 'imsmoking-theme' ); ?>" />
		<div class="imsmoking-handler-theme-gsn-notice">
			<h2>
				<?php
				printf(
					/* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
					esc_html__( 'Welcome! Thank you for choosing %1$s! To fully take advantage of the best our theme can offer, please make sure you visit our %2$swelcome page%3$s.', 'imsmoking-theme' ),
					'<strong>' . esc_html( wp_get_theme()->get( 'Name' ) ) . '</strong>',
					'<a href="' . esc_url( menu_page_url( IMSMOKING_THEME_THEME_NAME, false ) ) . '">',
					'</a>'
				);
				?>
			</h2>
			<?php
			$plugin_names = imsmoking_theme_get_plugin_names();
			if ( $plugin_names ) {
				?>
				<p>
					<?php
					$plugin_count = count( explode( ', ', $plugin_names ) );
					printf(
						/* translators: %s: singular/plular . */
						esc_html__( 'Clicking the button below will install and activate the following %s:', 'imsmoking-theme' ),
						$plugin_count > 1 ? esc_html__( 'plugins', 'imsmoking-theme' ) : esc_html__( 'plugin', 'imsmoking-theme' )
					);
					echo ' ';
					echo esc_html( $plugin_names );
					?>
				</p>
				<?php
			}
			?>
			<button class="imsmoking-handler-theme-btn-primary button button-primary button-hero imsmoking-handler-theme-install-plugins">
				<?php esc_html_e( 'Get started with Imsmoking Theme', 'imsmoking-theme' ); ?>
			</button>
		</div>
	</div>
</div>
