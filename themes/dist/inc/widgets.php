<?php

add_action('widgets_init', function () {

    /*    register_sidebar(array(
            'name' => __('Sidebar bei Beiträgen', 'ize'),
            'id' => 'sidebar_posts',
            'description' => __('Diese Sidebar wird auf der Beitragsdetailseite (single.php) ausgegeben', 'wifi'),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title"><span>',
            'after_title' => '</span></h4>'
        ));

        register_sidebar(array(
            'name' => __('Sidebar für Archive', 'ize'),
            'id' => 'sidebar_archive',
            'description' => __('Diese Sidebar wird auf Archivseiten (archive.php) ausgegeben', 'wifi'),
            'before_widget' => '<div class="widget %2$s" id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title"><span>',
            'after_title' => '</span></h4>'
        ));*/


    register_sidebar(array(
        'name' => __('Kontakt-Widget 1', 'tsc'),
        'id' => 'contact_widget',
        'description' => __('Dieses Widget wird auf der Kontaktseite ausgegeben', 'tsc'),
        'before_widget' => '<div class="not-animated %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>'
    ));


    register_sidebar(array(
        'name' => __('Menu-Widget', 'tsc'),
        'id' => 'menu_widget',
        'description' => __('Dieses Widget wird im Menü in der oberen Leiste rechts ausgegeben', 'tsc'),
        'before_widget' => '<div class="not-animated %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>'
    ));

});