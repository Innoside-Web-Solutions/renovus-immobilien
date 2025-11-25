<?php

namespace TSC;


class CompanyInfos
{
    protected static $company = "";
    protected static $company_additional_name = "";
    protected static $companyFullName = "";

    protected static $companyManagement = "";

    protected static $street = "";
    protected static $zipCity = "";
    protected static $country = "";

    protected static $email = "";

    protected static $phone = "";
    protected static $cellphone = "";
    protected static $fax = "";

    protected static $companyUid = "";
    protected static $companySupervisoryAuthority = "";
    protected static $company_register = "";

    protected static $googleMapsIframe = "";
    protected static $locationLink = "";

    public static function init()
    {
        // Setzt die Kontaktinformationen erst, nachdem alle Theme-Einstellungen geladen sind
        add_action('after_setup_theme', [self::class, 'setCompanyInfos']);
    }

    public static function setCompanyInfos()
    {
        // Array mit den Feldnamen
        $fields = [
            'company_name' => 'company_name_setting',
            'company_additional_name' => 'company_additional_name_setting',
            'company_full_name' => 'company_full_name_setting',
            'company_management' => 'company_management_setting',
            'company_street' => 'company_street_setting',
            'company_zip_city' => 'company_zip_city_setting',
            'company_country_state' => 'company_country_state_setting',
            'company_email' => 'company_email_setting',

            'company_phone' => 'company_phone_setting',
            'company_cellphone' => 'company_cellphone_setting',
            'company_fax' => 'company_fax_setting',


            'company_uid' => 'company_uid_setting',
            'company_supervisory_authority' => 'company_supervisory_authority_setting',
            'company_register' => 'company_register_setting',
            'google_maps_iframe' => 'google_maps_iframe_setting',
            'google_maps_location_link' => 'google_maps_location_link_setting',
        ];

        // Werte aus dem Customizer abrufen und den statischen Eigenschaften zuweisen
        self::$company = esc_html(get_theme_mod($fields['company_name'], ''));
        self::$company_additional_name = esc_html(get_theme_mod($fields['company_additional_name'], ''));
        self::$companyFullName = esc_html(get_theme_mod($fields['company_full_name'], ''));
        self::$companyManagement = esc_html(get_theme_mod($fields['company_management'], ''));

        self::$street = esc_html(get_theme_mod($fields['company_street'], ''));
        self::$zipCity = esc_html(get_theme_mod($fields['company_zip_city'], ''));
        self::$country = esc_html(get_theme_mod($fields['company_country_state'], ''));

        self::$email = is_email(get_theme_mod($fields['company_email'], '')) ? get_theme_mod($fields['company_email'], '') : '';

        self::$phone = esc_html(get_theme_mod($fields['company_phone'], ''));
        self::$cellphone = esc_html(get_theme_mod($fields['company_cellphone'], ''));
        self::$fax = esc_html(get_theme_mod($fields['company_fax'], ''));

        self::$companyUid = esc_html(get_theme_mod($fields['company_uid'], ''));
        self::$companySupervisoryAuthority = esc_html(get_theme_mod($fields['company_supervisory_authority'], ''));
        self::$company_register = esc_html(get_theme_mod($fields['company_register'], ''));

        self::$googleMapsIframe = esc_html(get_theme_mod($fields['google_maps_iframe'], ''));
        self::$locationLink = esc_url(get_theme_mod($fields['google_maps_location_link'], ''));
    }

    public static function getPhoneNr()
    {
        return self::$phone;
    }

    public static function getCellphoneNr()
    {
        return self::$cellphone;
    }


    public static function getEmail()
    {
        return self::$email;
    }


    public static function getPhoneLink($before = "", $after = "")
    {
        $html = "";
        if (self::$phone) {
            $url = 'tel:' . preg_replace(
                    ["/[^\d]/", "/^430/", "/^00430/"],
                    ["", "0043", "0043"],
                    preg_replace("/^\+/", "00", self::$phone)
                );

            $phone_no = str_replace('0043', "+43", self::$phone);
            $html = $before . '<a href="' . $url . '">' . $phone_no . '</a>' . $after;
        }
        return $html;
    }


    public static function getcellphoneLink($before = "", $after = "")
    {
        $html = "";
        if (self::$cellphone) {
            $url = 'tel:' . preg_replace(
                    ["/[^\d]/", "/^430/", "/^00430/"],
                    ["", "0043", "0043"],
                    preg_replace("/^\+/", "00", self::$phone)
                );

            $phone_no = str_replace('0043', "+43", self::$cellphone);
            $html = $before . '<a href="' . $url . '">' . $phone_no . '</a>' . $after;
        }
        return $html;
    }

    public static function getFaxOutput($before = "", $after = "")
    {
        $html = "";
        if (self::$fax) {
            $fax_no = str_replace('0043', "+43", self::$fax);

            $html = $before . $fax_no . $after;
        }
        return $html;
    }


    public static function getEmailLink($before = '', $after = '', $editor = false)
    {
        $html = "";
        if (self::$email) {
            $title = antispambot(self::$email);
            $url = antispambot('mailto:' . self::$email);
            if ($editor) $url = 'mailto:' . self::$email;
            $html = $before . '<a aria-label="' . __('Send Email', 'tsc') . '" href="' . $url . '">' . $title . '</a>' . $after;
        }
        return $html;
    }

    public static function getPhoneIcon($before, $after)
    {
        $html = "";
        if ( !empty(self::$phone)) {
            $icon = '<i class="tsc-icon flaticon-telephone" aria-hidden="true"></i>';
            $url = 'tel:' . preg_replace(
                    ["/[^\d]/", "/^430/", "/^00430/"],
                    ["", "0043", "0043"],
                    preg_replace("/^\+/", "00", self::$phone)
                );

            $html = $before . '<a aria-label="' . esc_attr__('Call now', 'tsc') . '" href="' . $url . '">' . $icon . '</a>' . $after;
        }
        return $html;
    }


    public static function getEmailIcon($before, $after)
    {
        $html = "";
        if (self::$email) {
            $icon = '<i class="tsc-icon flaticon-mail" aria-hidden="true"></i>';
            $url = antispambot('mailto:' . self::$email);
            $html = $before . '<a aria-label="' . __('Send Email', 'tsc') . '" href="' . $url . '">' . $icon . '</a>' . $after;
        }
        return $html;
    }

    public static function getLocationIcon($before, $after)
    {
        $html = "";
        if (self::$locationLink) {
            $icon = '<i class="tsc-icon flaticon-maps-and-flags" aria-hidden="true"></i>';
            $url = esc_url(self::$locationLink);
            $html = $before . '<a target="_blank" aria-label="' . __('Open Navigation', 'tsc') . '" href="' . $url . '">' . $icon . '</a>' . $after;
        }
        return $html;
    }

    public static function getLocationInfo()
    {
        $html = "";
        $html .= self::getStreet('<span>', '</span>');
        $html .= self::getZipCity('<span>', '</span>');
        return $html;
    }

    public static function getContactIcons($class)
    {
        $emailIcon    = self::getEmailIcon('<li>', '</li>');
        $phoneIcon    = self::getPhoneIcon('<li>', '</li>');
        $locationIcon = self::getLocationIcon('<li>', '</li>');

        if (empty($emailIcon) && empty($phoneIcon) && empty($locationIcon)) {
            return '';
        }

        $view  = "<ul class='tsc-contact-icons {$class}'>";
        $view .= $emailIcon . $phoneIcon . $locationIcon;
        $view .= "</ul>";

        return $view;
    }



    public static function getCompany($before, $after)
    {
        $html = "";
        if (self::$company) {
            $html = $before . self::$company . $after;
        }
        return $html;
    }

    public static function getCompanyAdditonalName($before, $after)
    {
        $html = "";
        if (self::$company_additional_name) {
            $html = $before . self::$company_additional_name . $after;
        }
        return $html;
    }

    public static function getCompanyFullName($before, $after)
    {
        $html = "";
        if (self::$companyFullName) {
            $html = $before . self::$companyFullName . $after;
        }
        return $html;
    }

    public static function getStreet($before, $after)
    {
        $html = "";
        if (self::$street) {
            $html = $before . self::$street . $after;
        }
        return $html;
    }

    public static function getZipCity($before, $after)
    {
        $html = "";
        if (self::$zipCity) {
            $html = $before . self::$zipCity . $after;
        }
        return $html;
    }

    public static function getCountry($before, $after)
    {
        $html = "";
        if (self::$country) {
            $html = $before . self::$country . $after;
        }
        return $html;
    }

    public static function theGoogleMapsIframe()
    {
        echo get_theme_mod('google_maps_iframe_setting');


    }


    public static function getCompanyUid($before = '', $after = '')
    {
        $html = "";
        if (self::$companyUid) {
            $html = $before . self::$companyUid . $after;
        }
        return $html;
    }

    public static function getSupervisoryAuthority($before = '', $after = '')
    {
        $html = "";
        if (self::$companySupervisoryAuthority) {
            $html = $before . self::$companySupervisoryAuthority . $after;
        }
        return $html;
    }

    public static function getCompanyRegister($before = '', $after = '')
    {
        $html = "";
        if (self::$company_register) {
            $html = $before . self::$company_register . $after;
        }
        return $html;
    }

    public static function getCompanyInfos()
    {
        $html = "";
        if (self::$company) {
            $html = '<div class="tsc-contact-infos">';
            $html .= self::getCompany('<span style="display: block"><strong>', '</strong></span>');
            $html .= self::getCompanyAdditonalName('<span style="display: block">', '</span>');
            $html .= self::getStreet('<span style="display: block">', '</span>');
            $html .= self::getZipCity('<span style="display: block">', '</span>');
            $html .= self::getCountry('<span style="display: block">', '</span>');

            $html .= "<div style='display: block'>";
            $html .= self::getEmailIcon('', '');
            $html .= self::getEmailLink('<span ><strong>' . __('E-Mail : ', 'tsc') . '</strong>', '</span>');
            $html .= "</div>";

            $html .= "<div style='display: block'>";
            $html .= self::getPhoneIcon('', '');
            $html .= self::getPhoneLink('<span><strong>' . __('Tel: ', 'tsc') . '</strong>', '</span>');
            $html .= "</div>";

            $html .= self::getcellphoneLink('<span style="display: block"><strong>' . __('Mobil: ', 'tsc') . '</strong>', '</span>');
            $html .= self::getFaxOutput('<span style="display: block"><strong>' . __('Fax: ', 'tsc') . '</strong>', '</span>');


            $html .= "</div>";
        }
        return $html;
    }

    public static function getCompanyFullInfos()
    {
        $html = "";
        if (self::$company) {
            $html = '<div class="tsc-contact-infos">';
            $html .= self::getCompanyFullName('<span style="display: block"><strong>', '</strong></span>');
            $html .= self::getStreet('<span style="display: block">', '</span>');
            $html .= self::getZipCity('<span style="display: block">', '</span>');
            $html .= self::getCountry('<span style="display: block">', '</span>');

            $html .= self::getEmailLink('<span style="display: block"><strong>' . __('E-Mail : ', 'tsc') . '</strong>', '</span>');
            $html .= self::getPhoneLink('<span style="display: block"><strong>' . __('Tel: ', 'tsc') . '</strong>', '</span>');
            $html .= self::getcellphoneLink('<span style="display: block"><strong>' . __('Mobil: ', 'tsc') . '</strong>', '</span>');
            $html .= self::getFaxOutput('<span style="display: block"><strong>' . __('Fax: ', 'tsc') . '</strong>', '</span>');


            $html .= self::getCompanyUid('<p><strong>' . __("UID-Nummer: " . '</strong>', "tsc"), '</p>');
            $html .= self::getCompanyRegister('<p><strong>' . __("Firmenbuch-Nummer: ", "tsc") . '</strong>', '</p>');
            $html .= self::getSupervisoryAuthority('<p><strong>' . __("Aufsichtsbehörde: ", "tsc") . '</strong>', '</p>');


            $html .= "</div>";
        }
        return $html;
    }


}

\TSC\CompanyInfos::init();


