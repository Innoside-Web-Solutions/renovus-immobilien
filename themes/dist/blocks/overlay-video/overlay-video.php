<?php


/**
 * Video Header Block template.
 *
 * @param array $block The block settings and attributes.
 */


/**
 * Anker übergeben, der im Gutenberg-Editor eingegeben werden kann
 */
$anchor = '';
if (isset($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}


/**
 * CSS Klassen übergeben, die im Gutenberg Editor eingegeben werden können
 */


$class_name = 'tsc-overlay-video alignfull';

if (isset($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
/**
 * Block Attribute übergeben
 * Overlay Attribute übergeben
 */


?>
<div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>"
    <?php
    /**

>     * hole die Spacing Values aus dem Array Block und setze diese nach Modifikation als Inline Style
    */
/*    if (isset($block['style'])) {
    if ($spacing_values = get_spacing_values($block)) {
    echo "style='{$spacing_values}'";
    }
    }*/
    ?> >
    <?php
    $header_video = get_field('header_video');
    if ($header_video): ?>
        <video autoplay muted loop playsinline>
            <source src="<?php echo esc_url($header_video['url']); ?>"
                    type="<?php echo esc_attr($header_video['mime_type']); ?>">
        </video>


        <?php
        $overlay_img_id = get_field('overlay_img');
        $overlay_img_url = wp_get_attachment_image_url($overlay_img_id, 'full');
        // image size noch ändern
        ?>
        <?php if ($overlay_img_url) : ?>
            <div class="overlay" style="background-image: url('<?php echo $overlay_img_url; ?>')"></div>
        <?php endif; ?>

    <?php endif; ?>

</div>
