<?php

namespace TSC;

class SocialLinks
{
    /**
     * field adding to customizer in  inc/customizer.php
     *
     * */


    protected $instagram_icon = "";
    protected $facebook_icon = "";
    protected $linkedin_icon = "";
    protected $youtube_icon = "";
    protected $whatsapp_icon = "";


    public function __construct()
    {
        $this->set__instragram_icon();
        $this->set__facebook_icon();
        $this->set__linkedin_icon();
        $this->set__youtube_icon();
        $this->set__whatsapp_icon();
    }

    protected function set__instragram_icon()
    {
        $url = esc_url(get_theme_mod('social_instagram', ''));
        if (!empty($url)):
            $icon = '<i class="tsc-icon flaticon-instagram" aria-hidden="true"></i>';
            $this->instagram_icon = '<a href="' . $url . '" target="_blank" aria-label="' . esc_attr__('follow us at Instagram', 'tsc') . '">' . $icon . '</a>';
        endif;
    }

    protected function set__facebook_icon()
    {
        $url = esc_url(get_theme_mod('social_facebook', ''));

        if (!empty($url)):
            $icon = '<i class="tsc-icon flaticon-facebook-app-symbol" aria-hidden="true"></i>';
            $this->facebook_icon = '<a href="' . $url . '" target="_blank" aria-label="' . esc_attr__('follow us on Facebook', 'tsc') . '">' . $icon . '</a>';
        endif;
    }

    protected function set__linkedin_icon()
    {
        $url = esc_url(get_theme_mod('social_linkedin', ''));

        if (!empty($url)):
            $icon = '<i class="tsc-icon flaticon-linkedin" aria-hidden="true"></i>';
            $this->linkedin_icon = '<a href="' . $url . '" target="_blank" aria-label="' . esc_attr__('follow us on LinkedIn', 'tsc') . '">' . $icon . '</a>';
        endif;
    }

    protected function set__youtube_icon()
    {
        $url = esc_url(get_theme_mod('social_youtube', ''));

        if (!empty($url)):
            $icon = '<i class="tsc-icon flaticon-youtube" aria-hidden="true"></i>';
            $this->youtube_icon = '<a href="' . $url . '" target="_blank" aria-label="' . esc_attr__('follow us on LinkedIn', 'tsc') . '">' . $icon . '</a>';
        endif;
    }

    protected function set__whatsapp_icon()
    {
        $url = esc_url(get_theme_mod('social_whatsapp', ''));

        if (!empty($url)):
            $icon = '<i class="tsc-icon flaticon-whatsapp" aria-hidden="true"></i>';
            $this->whatsapp_icon = '<a href="' . $url . '" target="_blank" aria-label="' . esc_attr__('write us on Whatsapp', 'tsc') . '">' . $icon . '</a>';
        endif;
    }


    public function get_instagramIcon($before, $after)
    {
        if ( empty($this->instagram_icon)){
            return;
        }
        return $before . $this->instagram_icon . $after;

    }

    public function get_facebookIcon($before, $after)
    {
        if ( empty($this->facebook_icon)){
            return;
        }

        return $before . $this->facebook_icon . $after;
    }

    public function get_linkedinIcon($before, $after)
    {
        if ( empty($this->linkedin_icon)){
            return;
        }
        return $before . $this->linkedin_icon . $after;
    }

    public function get_youtubeIcon($before, $after)
    {
        if ( empty($this->youtube_icon)){
            return;
        }
        return $before . $this->youtube_icon . $after;
    }

    public function get_whatsappIcon($before, $after)
    {
        if ( empty($this->whatsapp_icon)){
            return;
        }
        return $before . $this->whatsapp_icon . $after;
    }

    /*** show icon-bars  ***/
    public function show__sidebarIcons()
    {
        return get_theme_mod('sidebar_icons_enabled', true);
    }

    public function show__navbarIcons()
    {
        return get_theme_mod('navbar_icons_enabled', false);
    }

    public function get_socialLinks()
    {

        if (!empty($this->instagram_icon) || !empty($this->facebook_icon) || !empty($this->linkedin_icon) || !empty($this->youtube_icon) || !empty($this->whatsapp_icon)) {
            $html = '<ul class="links">';

            $html .=  $this->get_facebookIcon('<li>', '</li>');
            $html .=  $this->get_instagramIcon('<li>', '</li>');
            $html .= $this->get_linkedinIcon('<li>', '</li>');
            $html .=  $this->get_youtubeIcon('<li>', '</li>');
            $html .=  $this->get_whatsappIcon('<li>', '</li>');

            $html .= '</ul>';

            return $html;
        }
    }


}
