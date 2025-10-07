<?php
$uid = uniqid('product-endless-');
$wrapper = get_block_wrapper_attributes();
?>
<div <?php echo $wrapper; ?> data-product-endless-uid="<?php echo esc_attr($uid); ?>" class="product-endless-wrapper">



    <!-- Top row: Total products + Sorting -->
    <div class="product-endless-top-row">
        <div class="pe-total-left">
            <span class="pe-total">Loading products...</span>
        </div>
        <div class="pe-sorting-right">
            <?php
            if ( function_exists( 'woocommerce_catalog_ordering' ) ) {
                woocommerce_catalog_ordering();
            }
            ?>
        </div>
    </div>

    <!-- Products grid -->
    <div class="product-endless-grid"></div>

</div>
