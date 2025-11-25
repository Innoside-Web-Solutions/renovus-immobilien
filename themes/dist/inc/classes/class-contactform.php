<?php

namespace TSC;

class ContactForm
{
    protected static $contactFormShortCode;

    public static function init()
    {
        // Setzt die Kontaktinformationen erst, nachdem alle Theme-Einstellungen geladen sind
        add_action('after_setup_theme', [self::class, 'setContactForm']);
    }

    public static function setContactForm()
    {
        // Array mit den Feldnamen und ihren Customizer Settings

        self::$contactFormShortCode = get_theme_mod('contact_form_shortcode', '');
    }

    public static function theContactForm()
    {
        if (self::$contactFormShortCode):
            echo do_shortcode(self::$contactFormShortCode);
        endif;
    }
}

\TSC\ContactForm::init();


