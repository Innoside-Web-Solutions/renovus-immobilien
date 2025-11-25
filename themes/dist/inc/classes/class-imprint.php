<?php

namespace TSC;

class Imprint
{
    // Statische Eigenschaften für die neuen Felder
    protected static $imageCredits;
    protected static $developer;
    protected static $developerUrl;
    protected static $agency;
    protected static $agencyUrl;

    public static function init()
    {
        // Setzt die Kontaktinformationen erst, nachdem alle Theme-Einstellungen geladen sind
        add_action('after_setup_theme', [self::class, 'setImprintData']);
    }

    public static function setImprintData()
    {
        // Array mit den Feldnamen und ihren Customizer Settings
        $fields = [
            'credits' => 'credits_setting',
            'web_designer' => 'web_designer_setting',
            'web_designer_website' => 'web_designer_website_setting',
            'agency' => 'agency_setting',
            'agency_website' => 'agency_website_setting',
        ];

        // Werte aus dem Customizer abrufen und den statischen Eigenschaften zuweisen
        self::$imageCredits = esc_html(get_theme_mod($fields['credits'], 'Freepik, Flaticons, eigene Bildquellen'));
        self::$developer = esc_html(get_theme_mod($fields['web_designer'], 'innoSIDE Web Solutions, Dr. Thomas Schreiber'));
        self::$developerUrl = esc_url(get_theme_mod($fields['web_designer_website'], ''));
        self::$agency = esc_html(get_theme_mod($fields['agency'], ''));
        self::$agencyUrl = esc_url(get_theme_mod($fields['agency_website'], ''));
    }

    public static function getImageCredit()
    {
        $html = "";
        if (self::$imageCredits) {
            $html = '<h3>' . __('Bildnachweise', 'tsc') . '</h3>' . '<p>' . self::$imageCredits . '</p>';
        }
        return $html;
    }

    public static function getDeveloper()
    {
        $html = "";
        if (self::$developer) {
            $html = '<h3>' . __('Design, Konzeption und Umsetzung', 'tsc') . '</h3>';

            if (self::$developerUrl) {
                $html .= '<p><a href="' . self::$developerUrl . '">' . self::$developer . '</a></p>';
            } else {
                $html .= '<p>' . self::$developer . '</p>';
            }
        }
        return $html;
    }

    public static function getAgency()
    {
        $html = "";
        if (self::$agency) {
            $html = '<h3>' . __('Dies ist eine Webseite von: ', 'tsc') . '</h3>';;

            if (self::$agencyUrl) {
                $html .= '<p></p><a href="' . self::$agencyUrl . '">' . self::$agency . '</a></p>';
            } else {
                $html .= '<p>' . self::$agency . '</p>';
            }
        }
        return $html;
    }
}

\TSC\Imprint::init();
