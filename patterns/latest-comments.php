<?php
/**
 * Title: Latest Comments
 * Slug: imsmoking-theme/latest-comments
 * Categories: posts
 * Description: Display latest comments, commonly placed in sidebars or footers.
 *
 * @package    Imsmoking_Theme
 * @subpackage Imsmoking_Theme/patterns
 * @since      1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--40)"><!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} -->
<h4 class="wp-block-heading" style="margin-bottom:var(--wp--preset--spacing--30)"><?php esc_html_e( 'Recent comments', 'imsmoking-theme' ); ?></h4>
<!-- /wp:heading -->
<!-- wp:latest-comments {"displayExcerpt":false,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} /--></div>
<!-- /wp:group -->
