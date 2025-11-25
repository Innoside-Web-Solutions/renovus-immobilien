<?php

/*** L I G H T   L O G O ****/
add_action( 'customize_register', 'tsc_customizer__add_lighted_logo' );
function tsc_customizer__add_lighted_logo( $wp_customize ) {
// Einstellung für das Bild (z.B. ein zusätzliches Logo oder Hintergrundbild)
$wp_customize->add_setting( 'lighed_logo_image', array(
'default'           => '',
'sanitize_callback' => 'esc_url_raw', // Sanitize-Funktion für URLs
) );

// Steuerungselement für den Bild-Upload
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lighted_logo_control', array(
'label'    => __( 'Helles Logo', 'tsc' ),
'section'  => 'title_tagline', // Die Sektion "Website-Informationen"
'settings' => 'lighed_logo_image',
'priority' => 8, // Priority auf 2 setzen, damit es als zweites erscheint
'description' => __( 'Lade ein helles Logo hoch. Dieses wird in der Navigation verwendet, wenn ein Bild-Pageheader eingestellt ist', 'tsc' ),
) ) );
}

/*** M O B I L E   L O G O ****/
add_action( 'customize_register', 'tsc_customizer__add_mobile_logo' );
function tsc_customizer__add_mobile_logo( $wp_customize ) {
// Einstellung für das Bild (z.B. ein zusätzliches Logo oder Hintergrundbild)
$wp_customize->add_setting( 'mobile_logo_image', array(
'default'           => '',
'sanitize_callback' => 'esc_url_raw', // Sanitize-Funktion für URLs
) );

// Steuerungselement für den Bild-Upload
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mobile_logo_control', array(
'label'    => __( 'Mobil-Menü Logo', 'tsc' ),
'section'  => 'title_tagline', // Die Sektion "Website-Informationen"
'settings' => 'mobile_logo_image',
'priority' => 9, // Priority auf 2 setzen, damit es als zweites erscheint
'description' => __( 'Lade ein Logo für das obile Menü hoch', 'tsc' ),
) ) );
}







