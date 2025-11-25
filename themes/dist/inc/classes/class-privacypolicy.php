<?php

namespace TSC;

class PrivacyPolicy
{
    public $privacyData = array();

    protected $showContactForm_policy = true;
    protected $contactForm_policy = "";

    protected $showAnalysisPurposes_policy = true;
    protected $analysisPurposes_policy = "";

    protected $showRegistry_policy = true;
    protected $registry_policy = "";

    protected $showItSecurity_policy = true;
    protected $itSecurity_policy = "";

    protected $showCookies_policy = true;
    protected $cookies_policy = "";

    protected $showGoogleanalytics_policy = true;
    protected $googleAnalytics_policy = "";

    protected $showGoogleAds_policy = true;
    protected $googleAds_policy = "";

    protected $showMatomo_policy = true;
    protected $matomo_policy = "";

    protected $showSocialMedia_policy = true;
    protected $socialMedia_policy = "";

    protected $showLegalBasis_policy = true;
    protected $legalBasis_policy = "";

    public function __construct()
    {
        /* get acf group field content */
        $this->privacyData = get_field('privacy', 'option');

        /* *** set attributes *** */
        $this->showContactForm_policy = $this->privacyData['showContactForm_policy'];
        $this->contactForm_policy = $this->privacyData['contactForm_policy'];

        $this->showAnalysisPurposes_policy = $this->privacyData['showAnalysisPurposes_policy'];
        $this->analysisPurposes_policy = $this->privacyData['analysisPurposes_policy'];

        $this->showRegistry_policy = $this->privacyData['showRegistry_policy'];
        $this->registry_policy = $this->privacyData['registry_policy'];

        $this->showItSecurity_policy = $this->privacyData['showItSecurity_policy'];
        $this->itSecurity_policy = $this->privacyData['itSecurity_policy'];

        $this->showCookies_policy = $this->privacyData['showCookies_policy'];
        $this->cookies_policy = $this->privacyData['cookies_policy'];

        $this->showGoogleanalytics_policy = $this->privacyData['showGoogleanalytics_policy'];
        $this->googleAnalytics_policy = $this->privacyData['googleAnalytics_policy'];

        $this->showMatomo_policy = $this->privacyData['showMatomo_policy'];
        $this->matomo_policy = $this->privacyData['matomo_policy'];

        $this->showGoogleAds_policy = $this->privacyData['showGoogleAds_policy'];
        $this->googleAds_policy = $this->privacyData['googleAds_policy'];

        $this->showSocialMedia_policy = $this->privacyData['showSocialMedia_policy'];
        $this->socialMedia_policy = $this->privacyData['socialMedia_policy'];

        $this->showLegalBasis_policy = $this->privacyData['showLegalBasis_policy'];
        $this->legalBasis_policy = $this->privacyData['legalBasis_policys'];
    }

    public function generatePolicyHtml()
    {
        $html = '';

        // Erzeugt HTML für jede Richtlinie, falls diese sichtbar ist
        $policies = [
            'Kontaktformular' => [$this->showContactForm_policy, $this->contactForm_policy],
            'Analysezwecke' => [$this->showAnalysisPurposes_policy, $this->analysisPurposes_policy],
            'Registrierung' => [$this->showRegistry_policy, $this->registry_policy],
            'IT-Sicherheit' => [$this->showItSecurity_policy, $this->itSecurity_policy],
            'Cookies' => [$this->showCookies_policy, $this->cookies_policy],
            'Google Analytics' => [$this->showGoogleanalytics_policy, $this->googleAnalytics_policy],
            'Matomo' => [$this->showMatomo_policy, $this->matomo_policy],
            'Google Ads' => [$this->showGoogleAds_policy, $this->googleAds_policy],
            'Social Media' => [$this->showSocialMedia_policy, $this->socialMedia_policy],
            'Rechtliche Grundlage' => [$this->showLegalBasis_policy, $this->legalBasis_policy]
        ];

        foreach ($policies as $title => [$show, $content]) {
            if ($show) {
                $html .= '<h3>' . __($title . ': ', 'tsc') . '</h3><p>' . $content . '</p>';
            }
        }

        return $html;
    }
}
