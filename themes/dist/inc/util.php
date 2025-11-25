<?php

function obfuscate_emails($content)
{
    return preg_replace_callback("/(?:[a-zäüö0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zäüö0-9!#$%&'*+\/=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-zäüö0-9](?:[a-zäüö0-9-]*[a-zäüö0-9])?\.)+[a-zäüö0-9](?:[a-zäüö0-9-]*[a-zäüö0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-zäüö0-9-]*[a-zäüö0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/i", function ($matches) {
        return antispambot($matches[0]);
    }, $content);
}

function get__email($mail, $editor = false)

{
    if (!$mail) return false;
    $title = antispambot($mail);
    $url = antispambot('mailto:' . $mail);
    if ($editor) $url = 'mailto:' . $mail;
    return '<a aria-label="' . __('Send Email', 'tsc') . '" href="' . $url . '">' . $title . '</a>';
}

function get__phone($nr)
{
    $url = 'tel:' . preg_replace("/[^\+\d]+/", "", $nr);
    return '<a aria-label="' . esc_attr__('Call now', 'tsc') . '" href="' . $url . '">' . $nr . '</a>';
}

function tsc_social_links($urls)
{
    if (!array_filter($urls)) return false;
    $html = '<div class="follow">';
    $html .= '<span class="links">';
    if ($urls['youtube']) {
        $html .= '<a href="' . $urls['youtube'] . '" target="_blank" aria-label="' . esc_attr__('follow us YouTube', 'tsc') . '">';
        $html .= '<span class="icon-youtube" aria-hidden="true"></span>';
        $html .= '</a>';
    }
    if ($urls['facebook']) {
        $html .= '<a href="' . $urls['facebook'] . '" target="_blank" aria-label="' . esc_attr__('follow us Facebook', 'tsc') . '">';
        $html .= '<span class="icon-facebook" aria-hidden="true"></span>';
        $html .= '</a>';
    }
    if ($urls['instagram']) {
        $html .= '<a href="' . $urls['instagram'] . '" target="_blank" aria-label="' . esc_attr__('follow us Instagram', 'tsc') . '">';
        $html .= '<span class="icon-instagram" aria-hidden="true"></span>';
        $html .= '</a>';
    }
    if ($urls['linkedin']) {
        $html .= '<a href="' . $urls['linkedin'] . '" target="_blank" aria-label="' . esc_attr__('follow us LinkedIn', 'tsc') . '">';
        $html .= '<span class="icon-linkedin" aria-hidden="true"></span>';
        $html .= '</a>';
    }
    $html .= '</span>';
    $html .= '</div>';
    return $html;

}

function tsc_create_html($before, $after, $content)
{
    if (!empty($content)):
        $html = $before;
        $html .= $content;
        $html .= $after;

        return $html;
    endif;

}

function tsc_create_html_by_tagname($tagname, $class, $content)
{
	if (!empty($content)):
		$html = "<$tagname class='$class'>";
		$html .= $content;
		$html .= "</$tagname>";

		return $html;
	endif;

}


/*** post archive functions *** */
function get_tsc_category_list($post_type, $taxonomy)
{

    $post_type_archive_link = get_post_type_archive_link($post_type);
    $terms = get_terms($taxonomy); // gibt alle project. kategorien zurück

    $html = "<nav class='category-nav'>";
    $html .= "<ul>";
    $html .= "<li>";
    $html .= "";
    $html .= "<a href='$post_type_archive_link'>";
    $html .= "Alle";
    $html .= "</a>";
    $html .= "</li>";


    // ausgabe aller projektkategorien
    foreach ($terms as $term) {
        $html .= '<li><a href="' . get_category_link($term->term_id) . '">' . $term->name . '</a>';
    }

    $html .= "</ul>";
    $html .= "</nav>";

    return $html;
}

function get_tsc_post_pagination($text_prev_post, $text_next_post)
{
    echo '<nav class="post-pagination">';
    the_post_navigation(array(
        'prev_text' => __($text_prev_post, 'tsc'),
        'next_text' => __($text_next_post, 'tsc')
    ));
    echo '</nav>';
}

function the_archive_pagination()
{
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    echo '<nav class="pagination">';
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '<span class="icon-arrow-left" aria-label="' . __('Vorherige Seite', 'tsc') . '"></span>',
        'next_text' => '<span class="icon-arrow-right" aria-label="' . __('Nächste Seite', 'tsc') . '"></span>',
    ));
    echo '</nav>';
}

function tsc_the_post_type_archive_button($post_type, $class, $button_text)
{
    $post_type_archive_link = get_post_type_archive_link($post_type);

    $html = "<div class='$class'>";
    $html .= "<a class='btn-primary' href='$post_type_archive_link'>";
    $html .= __($button_text, 'tsc');
    $html .= "</a>";
    $html .= "</div>";


    echo $html;
}

function tsc_formatPhoneNumber($phoneNumber) {
    return str_replace("0043", "+43", $phoneNumber);
}

function estimate_reading_time() {
    $post_id = get_the_ID();
    if (!$post_id) {
        return '';
    }

    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Durchschnittlich 200 Wörter pro Minute

    return $reading_time . ' Min.';
}