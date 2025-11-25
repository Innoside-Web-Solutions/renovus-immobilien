<?php
/*
function tsc_register_gbblocks() {
    $slugs = array( 'price', 'icon-text'); // 🟢  Block-Slugs hier eintragen

    foreach ( $slugs as $slug ) {
        $block_dir = get_stylesheet_directory() . "/blocks/$slug";
        $block_uri = get_stylesheet_directory_uri() . "/blocks/$slug";

        // Skripte und Styles registrieren
        wp_register_script(
            "tsc-{$slug}-js",
            "$block_uri/index.js",
            array( 'wp-blocks', 'wp-element' ),
            filemtime( "$block_dir/index.js" ),
            true
        );

        wp_register_style(
            "tsc-{$slug}-style",
            "$block_uri/style.css",
            array(),
            filemtime( "$block_dir/style.css" )
        );

        wp_register_style(
            "tsc-{$slug}-editor",
            "$block_uri/editor.css",
            array(),
            filemtime( "$block_dir/editor.css" )
        );

        // Block registrieren via block.json
        register_block_type( $block_dir );
    }
}
add_action( 'init', 'tsc_register_gbblocks' );*/
