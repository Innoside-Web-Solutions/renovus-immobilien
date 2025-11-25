<?php

function add_imprint_fields($wp_customize)
{
    // Create a new section in the WordPress Customizer for Company Information
    $wp_customize->add_section('imprint_section', [
        'title' => __('Impressum', 'tsc'), // Title of the section
        'priority' => 200, // Priority to position this section in the customizer
    ]);

    // Define an associative array for the new fields with their respective properties
    $fields = [
        'credits' => [
            'label' => __('Bildnachweise', 'tsc'), // Field label
            'type' => 'textarea', // Field type
            'description' => __('Geben Sie die Bildnachweise ein.', 'tsc'), // Description
            'placeholder' => __('Freepik, Flaticon, eigene Bildquellen', 'tsc'), // Placeholder text
        ],
        'web_designer' => [
            'label' => __('Webdesigner / Webentwickler', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie den Namen des Webdesigners oder Entwicklers ein.', 'tsc'),
            'placeholder' => __('Dr. Thomas Schreiber', 'tsc'),
        ],
        'web_designer_website' => [
            'label' => __('Webdesigner Website', 'tsc'),
            'type' => 'url',
            'description' => __('Geben Sie die Website des Webdesigners oder Entwicklers ein. Bitte eine vollständige Url (https://...) eintragen', 'tsc'),
            'placeholder' => __('https://innoside.at', 'tsc'),
        ],
        'agency' => [
            'label' => __('Agentur', 'tsc'),
            'type' => 'text',
            'description' => __('Geben Sie den Namen der Agentur ein.', 'tsc'),
            'placeholder' => __('innoSIDE Web Solutions', 'tsc'),
        ],
        'agency_website' => [
            'label' => __('Agentur Website', 'tsc'),
            'type' => 'url',
            'description' => __('Geben Sie die Website der Agentur ein. Bitte eine vollständige Url (https://...) eintragen', 'tsc'),
            'placeholder' => __('https://innoside.at', 'tsc'),
        ],
    ];

    // Loop through the array of fields to create a setting and control for each one
    foreach ($fields as $field_key => $field_data) {
        // Set a default sanitization callback, here set to sanitize_text_field
        $sanitize_callback = 'sanitize_text_field';

        // Adjust the sanitization callback based on the field type
        if ($field_data['type'] == 'url') {
            $sanitize_callback = 'esc_url_raw';
        } elseif ($field_data['type'] == 'textarea') {
            $sanitize_callback = 'sanitize_textarea_field';
        }

        // Add a setting for each field with sanitization and a default empty value
        $wp_customize->add_setting($field_key . '_setting', [
            'default' => '', // Default value is an empty string
            'sanitize_callback' => $sanitize_callback, // Sanitization function based on field type
        ]);

        // Add a control to display the input field in the Customizer
        $wp_customize->add_control($field_key . '_control', [
            'label' => $field_data['label'], // Label from the field array
            'section' => 'imprint_section', // Place this control in the "imprint_section"
            'settings' => $field_key . '_setting', // Associate control with its setting
            'type' => $field_data['type'], // Input type (e.g., text, url, or textarea)
            'description' => $field_data['description'], // Description from the field array
            'input_attrs' => [
                'placeholder' => $field_data['placeholder'], // Placeholder text from the field array
            ],
        ]);
    }
}

// Register the above function with WordPress so it is called when the Customizer is loaded
add_action('customize_register', 'add_imprint_fields');
