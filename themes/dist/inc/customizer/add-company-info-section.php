<?php

function add_company_info_fields($wp_customize)
{
    // Create a new section in the WordPress Customizer for Company Information
    $wp_customize->add_section('company_info_section', [
        'title' => __('Unternehmensinformationen', 'tsc'), // Title of the section
        'priority' => 120, // Priority to position this section in the customizer
    ]);

    // Define an associative array for fields with their respective properties
    $fields = [
        'company_name' => [
            'label' => __('Unternehmensbezeichnung', 'tsc'), // Field label
            'type' => 'text', // Field type
            'description' => __('Geben Sie den Namen Ihres Unternehmens ein.', 'tsc'), // Description
            'placeholder' => __('Firma XY', 'tsc'), // Placeholder text
        ],

        'company_additional_name' => [
            'label' => __('Zusatzbezeichnung', 'tsc'), // Field label
            'type' => 'text', // Field type
            'description' => __('Geben Sie bei Bedarf eine Zusatzbezeichnung zum Unternehmen ein.', 'tsc'), // Description
            'placeholder' => __('', 'tsc'), // Placeholder text
        ],

        'company_full_name' => [
            'label' => __('Vollständiger Firmenwortlaut (Impressum)', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie den vollständigen Namen des Unternehmens ein (Impressum)', 'tsc'),
            'placeholder' => __('Firma XY GmbH', 'tsc'),
        ],
        'company_management' => [
            'label' => __('Geschäftsführung', 'tsc'),
            'type' => 'text',
            'description' => __('Name des Geschäftsführers oder CEOs.', 'tsc'),
            'placeholder' => __('', 'tsc'),
        ],
        'company_street' => [
            'label' => __('Straße', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie die Adresse ein.', 'tsc'),
            'placeholder' => __('Musterstraße 1', 'tsc'),
        ],
        'company_zip_city' => [
            'label' => __('Postleitzahl / Ort', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie die Postleitzahl und den Ort ein.', 'tsc'),
            'placeholder' => __('12345 Musterstadt', 'tsc'),
        ],
        'company_country_state' => [
            'label' => __('Land / Staat', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie das Land oder den Staat ein.', 'tsc'),
            'placeholder' => __('Österreich', 'tsc'),
        ],
        'company_email' => [
            'label' => __('Email', 'tsc'),
            'type' => 'email',
            'description' => __('Geben Sie die E-Mail-Adresse des Unternehmens ein.', 'tsc'),
            'placeholder' => __('info@firma-xy.at', 'tsc'),
        ],


        // numbers
        'company_phone' => [
            'label' => __('Telefonnummer', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie die Telefonnummer des Unternehmens ein.', 'tsc'),
            'placeholder' => __('0043 123 456789', 'tsc'),
        ],

        'company_cellphone' => [
            'label' => __('Mobilnummer', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie die Mobilnummer des Unternehmens ein.', 'tsc'),
            'placeholder' => __('0043 664 456789', 'tsc'),
        ],

        'company_fax' => [
            'label' => __('Faxnummer', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie die Fax des Unternehmens ein.', 'tsc'),
            'placeholder' => __('0043 664 456789', 'tsc'),
        ],




        // legals
        'company_uid' => [
            'label' => __('UID-Nummer', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie die UID-Nummer ein.', 'tsc'),
            'placeholder' => __('ATU12345678', 'tsc'),
        ],
        'company_supervisory_authority' => [
            'label' => __('Aufsichtsbehörde', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie die zuständige Aufsichtsbehörde ein.', 'tsc'),
            'placeholder' => __('Industriekammer', 'tsc'),
        ],
        'company_register' => [
            'label' => __('Firmenbuch', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie das Firmenbuch des Unternehmens ein.', 'tsc'),
            'placeholder' => __('Firmenbuchnummer 123456', 'tsc'),
        ],



        'google_maps_location_link' => [
            'label' => __('Google Maps Location Link', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie den Google Maps Link zur Standortangabe ein.', 'tsc'),
            'placeholder' => __('https://maps.google.com/...', 'tsc'),
        ],
    ];

    // Loop through the array of fields to create a setting and control for each one
    foreach ($fields as $field_key => $field_data) {
        // Set a default sanitization callback, here set to sanitize_text_field
        $sanitize_callback = 'sanitize_text_field';

        // Change the sanitization callback to sanitize_email if the field is an email field
        if ($field_data['type'] == 'email') {
            $sanitize_callback = 'sanitize_email';
        }

        // Add a setting for each field with sanitization and a default empty value
        $wp_customize->add_setting($field_key . '_setting', [
            'default' => '', // Default value is an empty string
            'sanitize_callback' => $sanitize_callback, // Sanitization function based on field type
        ]);

        // Add a control to display the input field in the Customizer
        $wp_customize->add_control($field_key . '_control', [
            'label' => $field_data['label'], // Label from the field array
            'section' => 'company_info_section', // Place this control in the "company_info_section"
            'settings' => $field_key . '_setting', // Associate control with its setting
            'type' => $field_data['type'], // Input type (e.g., text or email)
            'description' => $field_data['description'], // Description from the field array
            'input_attrs' => [
                'placeholder' => $field_data['placeholder'], // Placeholder text from the field array
            ],
        ]);
    }


}

// Register the above function with WordPress so it is called when the Customizer is loaded
add_action('customize_register', 'add_company_info_fields');

function add_google_maps_iframe_field_to_company_section($wp_customize) {
    // Funktion für die Sanitization, die nur das <iframe>-Tag und bestimmte Attribute erlaubt
    function sanitize_iframe_code($input) {
        $allowed_tags = [
            'iframe' => [
                'src'             => [],
                'width'           => [],
                'height'          => [],
                'style'           => [],
                'allowfullscreen' => [],
                'loading'         => [],
                'referrerpolicy'  => []
            ]
        ];

        return wp_kses($input, $allowed_tags);
    }

    // Hinzufügen eines neuen Settings für das iframe-Feld mit unserer benutzerdefinierten Sanitizer-Funktion
    $wp_customize->add_setting('google_maps_iframe_setting', [
        'default' => '',
        'sanitize_callback' => 'sanitize_iframe_code', // Unsere benutzerdefinierte Funktion für iframe-Sanitization
    ]);

    // Hinzufügen der Control für das iframe-Feld zur bestehenden company_info_section
    $wp_customize->add_control('google_maps_iframe_control', [
        'label' => __('Google Maps Iframe Code', 'tsc'),
        'section' => 'company_info_section', // Vorhandene Section verwenden
        'settings' => 'google_maps_iframe_setting',
        'type' => 'textarea', // Textarea für den gesamten iframe-Code
        'description' => __('Fügen Sie den vollständigen Google Maps iframe-Code ein.', 'tsc'),
    ]);
}
// Die Funktion an den Customizer-Registrierungs-Hook anhängen
add_action('customize_register', 'add_google_maps_iframe_field_to_company_section');
