<?php


/**
 * Text Image Overlayed Content Block template.
 *
 * @param array $block The block settings and attributes.
 */

if (!empty(get_field('txt-img-ol'))) {
    $img_id = get_field('txt-img-ol');
}


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
$class_name = 'tsc-block-txt-img-overlay';
if (isset($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
/**
 * Attribute übergeben
 */

$content_class = "";

if (isset($block['backgroundColor'])) {
   $content_class .= ' has-' . $block['backgroundColor'] . '-background-color';
}
if (isset($block['textColor'])) {
    $content_class .= ' has-' . $block['textColor'] . '-color';
}

?>


    <div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>"
        <?php
        /**
         * hole die Spacing Values aus dem Array Block und setze diese nach Modifikation als Inline Style
         */
        if (isset($block['style'])) {
            if ($spacing_values = get_spacing_values($block)) {
                echo "style='{$spacing_values}'";
            }
        }
        ?>
    >

            <?php
            if (isset($img_id)) {
                echo wp_get_attachment_image($img_id, 'full');
            } ?>
            <div class="txt-img-ol-content has-background <?php echo $content_class; ?>">
                <InnerBlocks/>
            </div>
    </div>
<?php
