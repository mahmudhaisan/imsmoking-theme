<?php
/**
 * Title: Single Full width
 * Slug: imsmoking-theme/single-post-full-width
 * Template Types: single
 * Description: A full-width layout template for displaying a post without sidebars.
 *
 * @package    Imsmoking_Theme
 * @subpackage Imsmoking_Theme/patterns
 * @since      1.0.0
 */

?>
<!-- wp:template-part {"slug":"header-default","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","metadata":{"name":"Main"},"align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull">
	<!-- wp:template-part {"slug":"single-header", "align":"full"} /-->
	<!-- wp:spacer {"height":"var:preset|spacing|80"} -->
    <div style="height:var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

	<!-- wp:pattern {"slug":"imsmoking-theme/hidden-single-post-content"} /-->
	
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
