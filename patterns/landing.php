<?php
/**
 * Title: Landing
 * Slug: imsmoking-theme/landing
 * Template Types: front-page
 * Post Types: page
 * Description: A layout template for displaying the main landing front page.
 *
 * @package    Imsmoking_Theme
 * @subpackage Imsmoking_Theme/patterns
 * @since      1.0.0
 */

?>
<!-- wp:template-part {"slug":"header-absolute","tagName":"header"} /-->
<!-- wp:group {"tagName":"main","metadata":{"name":"Main"},"align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull">
	<!-- wp:pattern {"slug":"imsmoking-theme/hero-banner"} /-->
	<!-- wp:pattern {"slug":"imsmoking-theme/featured-section-1"} /-->
	<!-- wp:pattern {"slug":"imsmoking-theme/featured-section-2"} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
