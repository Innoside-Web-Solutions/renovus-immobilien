<?php

function add_contact_form_field($wp_customize)
{
// Add new section for Contact Form
$wp_customize->add_section('tsc_contact_form_section', array(
'title'    => __('Kontakt-Formular', 'tsc'),
'priority' => 130,
));

// Add setting for Contact Form Shortcode
$wp_customize->add_setting('contact_form_shortcode', array(
'default'           => '',
'sanitize_callback' => 'sanitize_text_field',
));

// Add control for Contact Form Shortcode
$wp_customize->add_control('contact_form_shortcode_control', array(
'label'       => __('Contact Form Shortcode', 'tsc'),
'section'     => 'tsc_contact_form_section',
'settings'    => 'contact_form_shortcode',
'type'        => 'text',
'description' => 'Bitte fügen Sie hier den Shortcode für Ihr Kontaktformular ein'
));
}

add_action('customize_register', 'add_contact_form_field');