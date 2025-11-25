<?php

function wpbasic_setup(){
    load_theme_textdomain('tsc', get_template_directory() . '/assets/languages');

    add_theme_support('post-thumbnails');

    add_theme_support('title-tag');

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));

    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));



    add_theme_support('editor-styles');
    add_editor_style('assets/css/style-editor.css');
    //remove_theme_support('core-block-patterns');
    add_theme_support('responsive-embeds');

    $loader = new ScriptLoader();
    add_filter('script_loader_tag', array($loader, 'filter_script_loader_tag'), 10, 2);
}
add_action('after_setup_theme', 'wpbasic_setup');

add_action('init', function () {
    register_nav_menus(array(
        'primary' => __('Haupt-Navigation', 'tsc'),
        'side_nav' => __('Side-Navigation', 'tsc'),
        'legals' => __('Rechtliche Links (Footer)', 'tsc'),
    ));
});

add_action('wp_body_open', function () {
    echo '<a class="skip-link screen-reader-text" href="#content">' . esc_attr__('Zum Inhalt springen', 'tsc') . '</a>';
}, 5);

function custom_excerpt_length( $length ) {
    return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*
 * Zusätzlichen Mimes (Dokumenttypen) für den Upload erlauben (SVG-Logo Upload)
 * https://developer.wordpress.org/reference/hooks/upload_mimes/
 */
add_filter('upload_mimes', function ($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
});


function remove_admin_bar_search() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('search');
}
add_action('wp_before_admin_bar_render', 'remove_admin_bar_search');


add_filter('get_the_archive_title', function ($title) {
    // Entferne das Wort "Archive:" aus dem Titel
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }

    return $title;
});

function enqueue_dashicons_frontend() {
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'enqueue_dashicons_frontend');
