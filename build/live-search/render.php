<?php
/**
 * Render file for Live Search block (frontend)
 */

$uid = uniqid( 'live-search-' ); // unique id per instance
$wrapper = get_block_wrapper_attributes();
?>
<div <?php echo $wrapper; ?> data-live-search-uid="<?php echo esc_attr( $uid ); ?>">

    <!-- Toggle button -->
    <button type="button" class="ls-toggle" aria-expanded="false" aria-controls="<?php echo esc_attr( $uid ); ?>-overlay" aria-label="Open search">
        <span class="ls-icon" aria-hidden="true">
            <!-- SVG magnifier icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="30" y1="30" x2="16.65" y2="16.65"></line>
            </svg>
        </span>
    </button>

    <!-- Overlay -->
    <div id="<?php echo esc_attr( $uid ); ?>-overlay" class="ls-overlay" role="dialog" aria-modal="true" aria-hidden="true">
        <button type="button" class="ls-close" aria-label="Close search">✕</button>

        <div class="ls-inner">
            <span class="ls-label">WHAT ARE YOU LOOKING FOR?</span>

            <div class="ls-input-row">
                <input class="ls-input" type="search" placeholder="Start typing..." aria-label="Search products" autocomplete="off" />
                <button type="button" class="ls-clear" aria-label="Clear search">clear</button>
            </div>

            <!-- Results will be injected here -->
            <div class="ls-results"></div>
        </div>
    </div>
</div>
