<?php
/**
 * Title: No Search Result
 * Slug: imsmoking-theme/hidden-no-search-results
 * Inserter: no
 *
 * @package    Imsmoking_Theme
 * @subpackage Imsmoking_Theme/patterns
 * @since      1.0.0
 */

?>
<!-- wp:paragraph -->
<p>
<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'imsmoking-theme' ); ?>
</p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php echo esc_html_x( 'Search', 'label', 'imsmoking-theme' ); ?>","placeholder":"<?php echo esc_attr_x( 'Search...', 'placeholder for search field', 'imsmoking-theme' ); ?>","showLabel":false,"buttonText":"<?php esc_attr_e( 'Search', 'imsmoking-theme' ); ?>","buttonUseIcon":true} /-->
