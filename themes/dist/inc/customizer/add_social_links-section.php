<?php

/*** S O C I A L   L I N K S   ***/
function tsc_customizer__add_social_links_section($wp_customize)
{
// Neue Section für Social Links
    $wp_customize->add_section('social_links_section', array(
        'title' => __('Social Links', 'tsc'),
        'priority' => 120, // Priorität für die Position im Customizer
    ));

// Instagram Link
    $wp_customize->add_setting('social_instagram', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw', // URLs sanitieren
    ));

    $wp_customize->add_control('social_instagram_control', array(
        'label' => __('Instagram URL', 'tsc'),
        'section' => 'social_links_section',
        'settings' => 'social_instagram',
        'type' => 'text',
    ));

// Facebook Link
    $wp_customize->add_setting('social_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw', // URLs sanitieren
    ));

    $wp_customize->add_control('social_facebook_control', array(
        'label' => __('Facebook URL', 'tsc'),
        'section' => 'social_links_section',
        'settings' => 'social_facebook',
        'type' => 'text',
    ));

// LinkedIn Link
    $wp_customize->add_setting('social_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw', // URLs sanitieren
    ));

    $wp_customize->add_control('social_linkedin_control', array(
        'label' => __('LinkedIn URL', 'tsc'),
        'section' => 'social_links_section',
        'settings' => 'social_linkedin',
        'type' => 'text',
    ));

// YouTube Link
    $wp_customize->add_setting('social_youtube', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw', // URLs sanitieren
    ));

    $wp_customize->add_control('social_youtube_control', array(
        'label' => __('YouTube URL', 'tsc'),
        'section' => 'social_links_section',
        'settings' => 'social_youtube',
        'type' => 'text',
    ));

// Whatsapp Link
    $wp_customize->add_setting('social_whatsapp', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw', // URLs sanitieren
    ));

    $wp_customize->add_control('social_whatsapp_control', array(
        'label' => __('Whatsapp URL', 'tsc'),
        'section' => 'social_links_section',
        'settings' => 'social_whatsapp',
        'type' => 'text',
    ));


// Checkbox für Sidebar-Icons
    $wp_customize->add_setting('sidebar_icons_enabled', array(
        'default' => false,
        'sanitize_callback' => 'wp_validate_boolean', // Booleschen Wert validieren
    ));

    $wp_customize->add_control('sidebar_icons_enabled_control', array(
        'label' => __('Sidebar Icons', 'tsc'),
        'section' => 'social_links_section',
        'settings' => 'sidebar_icons_enabled',
        'type' => 'checkbox',
    ));



// Checkbox für Navbar-Icons
    $wp_customize->add_setting('navbar_icons_enabled', array(
        'default' => false,
        'sanitize_callback' => 'wp_validate_boolean', // Booleschen Wert validieren
    ));

    $wp_customize->add_control('navbar_icons_enabled_control', array(
        'label' => __('Navbar Icons', 'tsc'),
        'section' => 'social_links_section',
        'settings' => 'navbar_icons_enabled',
        'type' => 'checkbox',
    ));


}

add_action('customize_register', 'tsc_customizer__add_social_links_section');
