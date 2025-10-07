<?php

/**
 * PHP file to render the Hamburger Menu Overlay block on the frontend.
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block inner content.
 * @var WP_Block $block      Block instance.
 */

// Add the block's core CSS classes.
$block_wrapper_attributes = get_block_wrapper_attributes();

// Get current site URL
$site_url = site_url();

?>

<div <?php echo $block_wrapper_attributes; ?>>
    <div class="hamburger-menu-container">
        <button class="hamburger-icon" aria-label="<?php esc_attr_e('Toggle menu', 'hamburger-menu-overlay'); ?>">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </button>
    </div>
    <div class="hamburger-menu-overlay">
        <div class="hamburger-menu-header">
            <button class="menu-close" aria-label="Close menu">✕</button>
        </div>

        <div class="menu-level-wrapper hamburger-menu-content">
    <nav class="hamburger-menu-nav menu-main">
        <ul class="hamburger-menu">

            <!-- INSTABAR (has submenu) -->
            <li class="menu-item has-children" data-menu="instabar">
                <a href="#" class="menu-link">INSTABAR</a>
            </li>

            <!-- Regular menu items -->
            <li class="menu-item"><a href="<?php echo $site_url; ?>/product-category/enerchi/" class="menu-link">ENERCHI</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/product-category/dragbar/" class="menu-link">DRAGBAR</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/product-category/iget-bar/" class="menu-link">IGET BAR</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/product-category/hqd/" class="menu-link">HQD</a></li>

            <!-- INFORMATION (has submenu) -->
            <li class="menu-item has-children" data-menu="information">
                <a href="#" class="menu-link">INFORMATION</a>
            </li>

            <!-- MY ACCOUNT (has submenu) -->
            <li class="menu-item has-children" data-menu="my-account">
                <a href="#" class="menu-link">MY ACCOUNT</a>
            </li>
        </ul>
    </nav>

    <!-- INSTABAR Submenu -->
    <nav class="hamburger-menu-nav menu-submenu" data-menu-id="instabar">
        <div class="menu-back-header">
            <button class="menu-back">← Back</button>
           
        </div>
        <ul class="submenu">
            <li class="menu-item"><a href="<?php echo $site_url; ?>/product-category/instabar/">INSTABAR</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/product-category/instabar/instabar-pro/">INSTABAR PRO</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/product-category/instabar/instabar-12000/">INSTABAR 12000</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/product-category/instabar/instabar-10000/">INSTABAR 10000</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/product-category/instabar/instabar-7500/">INSTABAR 7500</a></li>
        </ul>
    </nav>

    <!-- INFORMATION Submenu -->
    <nav class="hamburger-menu-nav menu-submenu" data-menu-id="information">
        <div class="menu-back-header">
            <button class="menu-back">← Back</button>
           
        </div>
        <ul class="submenu">
            <li class="menu-item"><a href="<?php echo $site_url; ?>/terms-and-conditions/">INFORMATION</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/refunds/">REFUNDS</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/payments/">PAYMENTS</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/contact-us-2/">CONTACT US</a></li>
        </ul>
    </nav>

    <!-- MY ACCOUNT Submenu -->
    <nav class="hamburger-menu-nav menu-submenu" data-menu-id="my-account">
        <div class="menu-back-header">
            <button class="menu-back">← Back</button>
            
        </div>
        <ul class="submenu">
            <li class="menu-item"><a href="#">MY ACCOUNT</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/my-account/">Dashboard</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/my-account/orders/">Orders</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/my-account/edit-address/">Addresses</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/my-account/edit-account/">Account details</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/wishlist/">Wishlist</a></li>
            <li class="menu-item"><a href="<?php echo $site_url; ?>/my-account/customer-logout/">Logout</a></li>
        </ul>
    </nav>
</div>

        <div class="hamburger-menu-footer">
            <hr />
            <p><a href="mailto:hello@imsmoking.com.au">hello@imsmoking.com.au</a></p>
            <p><a href="tel:+61435967584">0435 967 584</a></p>
        </div>
    </div>
</div>