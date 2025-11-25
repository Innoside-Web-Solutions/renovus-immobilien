<?php

function add_image_footer_section($wp_customize)
{
    // Create a new section in the WordPress Customizer for Image Footer
    $wp_customize->add_section('image_footer_section', [
        'title' => __('Image Footer', 'tsc'),
        'priority' => 200,
    ]);

    // Setting for the footer background image
    $wp_customize->add_setting('footer_bg_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw', // Sanitize URL
    ));

    // Control for the footer background image upload
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_bg_image_control', array(
        'label' => __('Footer Background Image', 'tsc'),
        'section' => 'image_footer_section',
        'settings' => 'footer_bg_image',
        'priority' => 8,
        'description' => __('Bitte laden Sie hier das Footer-Hintergrundbild hoch', 'tsc'),
    )));
}

// Register the function with WordPress Customizer
add_action('customize_register', 'add_image_footer_section');
