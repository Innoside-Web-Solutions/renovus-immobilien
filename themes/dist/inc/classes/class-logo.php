<?php

namespace TSC;

class Logo
{
    protected $custom_logo = "";
    protected $lighted_logo = "";
    protected $mobile_logo = "";

    public function __construct()
    {
        $this->set_custom_logo();
        $this->set_white_logo();
        $this->set_mobile_logo();
    }

    protected function set_custom_logo()
    {
        if (function_exists('the_custom_logo')) {
            $this->custom_logo = "<div class='brand'>";
            $this->custom_logo .= get_custom_logo();
            $this->custom_logo .= "</div>";
        }
    }

    protected function set_white_logo()
    {
        $lighted_logo_img_url = get_theme_mod('lighed_logo_image', ''); // Bild-URL abrufen
        $lighted_logo_img_id = attachment_url_to_postid($lighted_logo_img_url); // in Bild-ID umwandeln
        $home_url = get_home_url();

        if (!empty($lighted_logo_img_id)) {
            $this->lighted_logo = "<div class='brand-lighted'>";
            $this->lighted_logo .= "<a href='{$home_url}' aria-label='Link to hompage'>";
            $this->lighted_logo .= wp_get_attachment_image($lighted_logo_img_id, 'tsc_logo_size');
            $this->lighted_logo .= "</a>";
            $this->lighted_logo .= "</div>";
        }
    }

    protected function set_mobile_logo()
    {
        $mobile_logo_img_url = get_theme_mod('mobile_logo_image', ''); // Bild-URL abrufen
        $mobile_logo_img_id = attachment_url_to_postid($mobile_logo_img_url); // in Bild-ID umwandeln
        $home_url = get_home_url();

        if (!empty($mobile_logo_img_id)) {
            $this->mobile_logo = "<div class='brand-mobile'>";
            $this->mobile_logo .= "<a href='{$home_url}' aria-label='Link to hompage'>";
            $this->mobile_logo .= wp_get_attachment_image($mobile_logo_img_id, 'tsc_logo_size');
            $this->mobile_logo .= "</a>";
            $this->mobile_logo .= "</div>";
        }
    }

    public function get_custom_logo()
    {
        return $this->custom_logo;
    }

    public function get_white_logo()
    {
        return $this->lighted_logo;
    }
    public function get_mobile_logo()
    {
        return $this->mobile_logo;
    }

}