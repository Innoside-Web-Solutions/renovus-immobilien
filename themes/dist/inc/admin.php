<?php

//add_filter('show_admin_bar', '__return_false');
if (!current_user_can('edit_posts')) {
    add_filter('show_admin_bar', '__return_false');
}


add_filter('block_categories_all', function ($categories) {
    return array_merge(
        array(
            array(
                'slug' => 'ize-blocks',
                'title' => esc_attr__('IZE', 'tsc'),
                'icon' => 'block-default'
            ),
        ),
        $categories
    );
}, 10, 2);


add_filter('wpseo_metabox_prio', function () {
    return 'low';
});

add_action('admin_init', function () {

    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : home_url('/');
    $user = wp_get_current_user();
    if (!defined('DOING_AJAX') && in_array('subscriber', (array)$user->roles)) {

        wp_redirect($redirect);
        exit();
    }
});

// Disable Comments
add_action('admin_init', function () {
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

add_filter('comments_array', '__return_empty_array', 10, 2);

add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

add_action('wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
});

// Logo im Backend anzeigen
function my_custom_admin_logo($wp_admin_bar)
{
    $logo_id = get_theme_mod('custom_logo');
    $logo_url = wp_get_attachment_image_url($logo_id, 'full');

    if ($logo_url) {
        $wp_admin_bar->add_node(
            array(
                'id' => 'my_custom_logo',
                'title' => '<img src="' . esc_url($logo_url) . '"style="background-color: #fff; width: auto; height: 32px;" />',
                'href' => home_url(),
                'meta' => array(
                    'class' => 'my-custom-logo',
                    'title' => get_bloginfo('name'),
                ),
            )
        );
    }
}

//add_action('admin_bar_menu', 'my_custom_admin_logo', 3);

// Text im Footer ändern
function change_admin_footer_text()
{
    echo 'Theme Development by Dr. Thomas Schreiber, Innoside Web Solutions https://www.innoside.at/';
}

add_filter('admin_footer_text', 'change_admin_footer_text');

