<?php
/**
 * Title: Header Absolute
 * Slug: imsmoking-theme/header-absolute
 * Categories: header
 * Block Types: core/template-part/header
 * Description: A pattern for displaying the site header with an absolute positioning.
 *
 * @package    Imsmoking_Theme
 * @subpackage Imsmoking_Theme/patterns
 * @since      1.0.0
 */

?>


<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"color":{"background":"#f7f7f7"}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group has-background" style="background-color:#f7f7f7;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:navigation {"ref":4,"overlayMenu":"always","icon":"menu","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account"]}} /-->

<!-- wp:site-logo {"width":105,"shouldSyncIcon":false,"align":"center"} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:woocommerce/mini-cart /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->