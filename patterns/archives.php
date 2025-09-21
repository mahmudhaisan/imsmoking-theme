<?php
/**
 * Title: Archives
 * Slug: imsmoking-theme/archives
 * Categories: posts
 * Description: Display a date-based archive of posts, commonly placed in sidebars, footers, or site maps.
 *
 * @package    Imsmoking_Theme
 * @subpackage Imsmoking_Theme/patterns
 * @since      1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--40)">

<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} -->
<h4 class="wp-block-heading" style="margin-bottom:var(--wp--preset--spacing--30)"><?php esc_html_e( 'Archives', 'imsmoking-theme' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:archives {"showPostCounts":true} /--></div>
<!-- /wp:group -->
