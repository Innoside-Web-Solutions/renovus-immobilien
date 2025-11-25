<?php

add_action('wp_enqueue_scripts', function () {

    $theme_version = wp_get_theme()->get('Version');

    //wp_add_inline_style( 'tsc-theme-styles', theme_get_customizer_css() );
    wp_enqueue_style('tsc-style', get_template_directory_uri() . '/style.css');

    // The core GSAP library
    wp_enqueue_script('gsap-js', get_template_directory_uri() . '/assets/gsap-public/minified/gsap.min.js', array(), $theme_version, true);
// ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script('gsap-st', get_template_directory_uri() . '/assets/gsap-public/minified/ScrollTrigger.min.js', array('gsap-js'), $theme_version, true);
    wp_enqueue_script('gsap-textplugin', get_template_directory_uri() . '/assets/gsap-public/minified/TextPlugin.min.js', array('gsap-js'), $theme_version, true);
    wp_enqueue_script('gsap-splittext', get_template_directory_uri() . '/assets/gsap-public/minified/SplitText.min.js', array('gsap-js'), $theme_version, true);




    // Your animation code file - with gsap.js passed as a dependency
    wp_enqueue_script('gsap-app', get_template_directory_uri() . '/assets/js/app.js', array('gsap-st'), $theme_version, true);

    wp_enqueue_script('fslightbox', get_template_directory_uri() . '/assets/js/fslightbox.js', array(), $theme_version, true);

    // Splidejs styles und Scripts nur registrieren nicht einbinden
    wp_register_style( 'splide-style', get_template_directory_uri() . '/assets/css/splide.min.css' );
    wp_register_script( 'splide-script', get_template_directory_uri() . '/assets/js/splide.min.js', [], $theme_version, true );
    wp_register_script( 'slider-script', get_template_directory_uri() . '/assets/js/slider.js', [ 'splide-script' ], $theme_version, true );

    wp_enqueue_script('tsc-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), $theme_version, true);
    wp_script_add_data('tsc-scripts', 'async', true);

});


add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script('tsc-editor', get_template_directory_uri() . '/assets/js/editor.js', array('wp-blocks', 'wp-dom'), '', true);
});