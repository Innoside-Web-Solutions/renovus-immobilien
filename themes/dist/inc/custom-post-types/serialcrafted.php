<?php



function serialcrafted_post_type()
{
    $labels = array(
        'name' => _x('Serial Crafted', 'Post Type General Name', 'ize'),
        'singular_name' => _x('Serial Crafted Beitrag', 'Post Type Singular Name', 'ize'),
        'menu_name' => __('Serial Crafted', 'ize'),
        'name_admin_bar' => __('Serial Crafted', 'ize'),
        'archives' => __('Beitrags-Übersicht', 'ize'),
        'attributes' => __('Beitrags-Attribute', 'ize'),
        'parent_item_colon' => __('Parent Item:', 'ize'),
        'all_items' => __('Alle', 'ize'),
        'add_new_item' => __('Neuer', 'ize'),
        'add_new' => __('Neuer Beitrag hinzufügen', 'ize'),
        'new_item' => __('Neue Beitrag', 'ize'),
        'edit_item' => __('Beitrag bearbeiten', 'ize'),
        'update_item' => __('Beitrag aktualisieren', 'ize'),
        'view_item' => __('Zeige Beitrag', 'ize'),
        'view_items' => __('Zeige Beitrag', 'ize'),
        'search_items' => __('Suche Beitrag', 'ize'),
        'not_found' => __('Keine Beiträge vorhanden', 'ize'),
        'not_found_in_trash' => __('Nichts im Papierkorb gefunden', 'ize'),
        'featured_image' => __('Beitrags-Bild', 'ize'),
        'set_featured_image' => __('Beitrags-Bild festlegen', 'ize'),
        'remove_featured_image' => __('Lösche Beitrags-Bild', 'ize'),
        'use_featured_image' => __('Nutze als Beitrags-Bild', 'ize'),
        'insert_into_item' => __('Zu Beitrag hinzufügen', 'ize'),
        'uploaded_to_this_item' => __('Zu Beitrag hochladen', 'ize'),
        'items_list' => __('Beitrags-Liste', 'ize'),
        'items_list_navigation' => __('Beitrags-Liste Navigation', 'ize'),
        'filter_items_list' => __('Filter Beitrags-Liste', 'ize'),
    );

    $rewrite = array(
        'slug' => 'serialcrafted',
        'with_front' => true,
        'pages' => true,
        'feeds' => false,
    );

    $args = array(
        'label' => __('Serial Crafted', 'ize'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => $rewrite,
        'capability_type' => 'page',
        'show_in_rest' => false,
    );
    register_post_type('serialcrafted', $args);

}

add_action('init', 'serialcrafted_post_type', 0);



// WP Query
function get_serialcrafted($posts_per_page)
{

    $args = array(
        'post_type' => 'serialcrafted',
        'post_status'         => 'publish',
        'posts_per_page' =>$posts_per_page,
        'orderby' => 'date'
    );

    return query_posts( $args );

}

function get_serialcrafted_rand($posts_per_page)
{

    $args = array(
        'post_type' => 'serialcrafted',
        'post_status'         => 'publish',
        'posts_per_page' =>$posts_per_page,
        'orderby' => 'rand'
    );

    return query_posts( $args );

}