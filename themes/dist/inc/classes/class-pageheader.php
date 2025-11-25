<?php

namespace TSC;
class Pageheader
{
    // die CSS-Klasse für die Navbar ist im template header/navigation.php gesetzt


    protected $pageheader = [];
    /* keys
['title_tag']
['title']

['subtitle']
['subtitle_tag']

['text']

['button']

['image'] = url
 */


    protected $pageheader_content = [];
    protected $section_divider = "";
    protected $overlay = "";
    public $no_of_slides = 0;

    // keyes


    public function __construct()
    {
        $this->pageheader = get_field('pageheader', get_the_ID()) ?? [];
        $this->set_pageheader();
        $this->count_content_slides();
    }

    protected function set_pageheader()
    {
        $this->pageheader_content = $this->pageheader['pageheader_content'] ?? [];
        $this->section_divider = $this->pageheader['section_divider'] ?? "";
        $this->overlay = $this->pageheader['overlay'] ?? "";

    }

    protected function get_pageheader_bg_image_url($image_url)
    {
        if (empty($image_url)) {
            return "";
        }
        return '"' . $image_url . '"';
    }

    public function count_content_slides()
    {
        if ($this->no_of_slides){
            $this->no_of_slides = count($this->pageheader_content);
        }
    }

    public function get_pageheader_template()
    {
        $output = "";

        // activate slider if more than 1 slide
        if ($this->no_of_slides > 1) {
            $output .= "<div id='splide' class='splide'>";
            $output .= "<div class='splide__track'>";
            $output .= "<ul class='splide__list'>";
        }

        for ($i = 0; $i < $this->no_of_slides; $i++) {
            if ($this->no_of_slides > 1) {
                $output .= "<li class='splide__slide'>";
            }

            $slide = $this->pageheader_content[$i];

            $title = $slide['title'] ?? '';
            $title_tag = $slide['title_tag'] ?? 'h1';
            $subtitle = $slide['subtitle'] ?? '';
            $subtitle_tag = $slide['subtitle_tag'] ?? 'h2';
            $text = $slide['text'] ?? '';
            $image = $slide['image'] ?? '';
            $button = $slide['button'] ?? [];

            $output .= "<div class='pageheader-image' style='background-image: url({$image});'>";
            $output .= $this->get_section_divider();

            // Overlay
            $output .= $this->get_overlay();

            // Inhalt

            $output .= "<div class='container'>";
            $output .= "<div class='content'>";
            if (!empty($title)) {
                $output .= "<$title_tag class='title'>$title</$title_tag>";
            }
            if (!empty($subtitle)) {
                $output .= "<$subtitle_tag class='subtitle'>$subtitle</$subtitle_tag>";
            }
            if (!empty($text)) {
                $output .= "<p class='text'>$text</p>";
            }

            // Button
            if (!empty($button) && isset($button['title'], $button['url'])) {
                $target = !empty($button['target']) ? " target='{$button['target']}'" : "";
                $output .= "<a href='{$button['url']}' class='btn-primary'$target>{$button['title']}</a>";
            }

            $output .= "</div>"; // pageheader-content
            $output .= "</div>"; // container
            $output .= "</div>"; // pageheader-slide

            if ($this->no_of_slides > 1) {
                $output .= "</li>";
            }
        }

        if ($this->no_of_slides > 1) {
            $output .= "</ul>";
            $output .= "</div>";
            $output .= "</div>";
        }

        return $output;
    }


    public function get_section_divider()
    {
        if (empty($this->section_divider)) {
            return "";
        }

        $url = '"' . wp_get_attachment_image_url($this->section_divider, 'full') . '"';

        if (!$url) {
            return "";
        }
        return "<div class='section-divider ' style='background-image: url($url)'></div>";

    }

    public
    function get_overlay()
    {
        return empty($this->overlay) ? "" : "<div class='overlay' style='background-color: {$this->overlay};'></div>";

    }


}