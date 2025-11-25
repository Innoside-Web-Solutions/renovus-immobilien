<?php

add_action('after_setup_theme', function () {
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 400,
        'single_image_width' => 800,
        /*
                'product_grid' => array(
                    'default_rows' => 4,
                    'min_rows' => 4,
                    'max_rows' => 8,
                    'default_columns' => 4,
                    'min_columns' => 1,
                    'max_columns' => 4,
                ),
        */

    ));
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    // remove_theme_support('wc-product-gallery-zoom');
});





add_filter('woocommerce_gallery_thumbnail_size', function ($size) {
    return 'shop_catalog';
});

add_filter('woocommerce_subcategory_count_html', '__return_false');

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);



// add menü items into icons
// add_filter('wp_nav_menu_items', 'add_cart_and_shop_icons_to_menu', 10, 2);
function add_cart_and_shop_icons_to_menu($items, $args)
{
// Check if the menu is the icon menu and the user is logged in
    if ($args->theme_location == 'primary' /* && is_user_logged_in() */) {
// Get the cart URL and count

        $cart_url = wc_get_cart_url();
        $cart_count = WC()->cart->get_cart_contents_count();
// Add the cart icon to the menu item
        $items .= '<li><a href="' . esc_url($cart_url) . '"><span aria-hidden="true" class="dashicons dashicons-cart menu-icon"></span><span class="cart-count">' . esc_html($cart_count) . '</span></span><span class="screen-reader-text">' . __('Zum Warenkorb', 'ize') . '</span></a></li>';

        $my_account_url = get_permalink(get_option('woocommerce_myaccount_page_id'));
// Add the My Account icon to the menu item
        $items .= '<li><a href="' . esc_url($my_account_url) . '"><span aria-hidden="true" class="dashicons dashicons-admin-users menu-icon"></span><span class="screen-reader-text">' . __('Mein Konto', 'ize') . '</span></a></li>';
    }
    return $items;
}


// Menue icons
function header_cart()
{
    if (class_exists('woocommerce')) : ?>
        <?php $product_count = WC()->cart->get_cart_contents_count(); ?>
        <ul id="shop-nav" class="nav-menu">
            <li class="account">
                <a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
                   title="<?php esc_attr_e('Mein Konto', 'ize'); ?>">
                    <span class="screen-reader-text"><?php esc_attr_e('Mein Konto', 'ize'); ?></span>
                    <span class="icon-user menu-icon" aria-hidden="true"></span>
                </a>
            </li>
            <li class="cart">
                <a href="<?= wc_get_cart_url(); ?>" aria-label="<?php esc_attr_e('Warenkorb', 'ize'); ?>">
                    <span class="screen-reader-text"><?php esc_attr_e('Warenkorb', 'ize'); ?></span>
                    <span class="icon-cart menu-icon" aria-hidden="true"></span>
                    <?php if ($product_count > 0) echo '<span class="badge">' . $product_count . '</span>'; ?>
                </a>
            </li>
        </ul>
    <?php endif;
}




// woo-product-cat-nav
function tsc_get_woocommerce_category_nav() {

    echo get_tsc_category_list('product', 'product_cat');
}

