<?php
/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function tsc_register_blocks()
{
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */

    register_block_type(get_template_directory() . '/blocks/video-header');
    register_block_type(get_template_directory() . '/blocks/slider-header');

    register_block_type(get_template_directory() . '/blocks/contact-infos');
    register_block_type(get_template_directory() . '/blocks/social-icons');

    register_block_type(get_template_directory() . '/blocks/image-carousel');
    register_block_type(get_template_directory() . '/blocks/image-teaser');
    register_block_type(get_template_directory() . '/blocks/moving-overlay');
    register_block_type(get_template_directory() . '/blocks/text-image-overlay');
    register_block_type(get_template_directory() . '/blocks/videotext');
    register_block_type(get_template_directory() . '/blocks/overlay-video');
    register_block_type(get_template_directory() . '/blocks/inno-header');
    register_block_type(get_template_directory() . '/blocks/inno-akkordeon');
    register_block_type(get_template_directory() . '/blocks/testimonial-slider');


    //register_block_type(get_template_directory() . '/blocks/logo-carousel');

    //   register_block_type( get_template_directory() . '/blocks/price-table/block.json' );
   // register_block_type( get_template_directory() . '/blocks/price/block.json' );


    //register_block_type(get_template_directory() . '/blocks/text-img');
    //register_block_type(get_template_directory() . '/blocks/team');
    //register_block_type( get_template_directory() . '/blocks/current-posts' );
}

// Here we call our tt3child_register_acf_block() function on init.
add_action('init', 'tsc_register_blocks');


function tsc_enqueue_block_assets() {
    wp_enqueue_script( 'wp-blocks' );
    wp_enqueue_script( 'wp-element' );
    wp_enqueue_script( 'wp-block-editor' );
}
add_action( 'enqueue_block_editor_assets', 'tsc_enqueue_block_assets' );
