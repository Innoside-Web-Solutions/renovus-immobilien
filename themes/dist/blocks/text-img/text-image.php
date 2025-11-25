<?php


/**
 * Text Image Overlayed Content Block template.
 *
 * @param array $block The block settings and attributes.
 */

if (!empty(get_field('tsc-txt-img'))) {
    $tsc__img_id = get_field('tsc-txt-img');
}
if (!empty(get_field('align'))) {
    $tsc__align = get_field('align');
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
$class_name = 'tsc-block-txt-img';
if (isset($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (isset($tsc__align)) {
    $class_name .= ' tsc-txt-col-' . $tsc__align;
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
            if (isset($tsc__img_id)) {
                echo '<figure>';
                echo wp_get_attachment_image($tsc__img_id, 'full');
                echo '</figure>';
            } ?>
            <div class="txt-img-content has-background <?php echo $content_class; ?>">

                <InnerBlocks
                        template='[["core/paragraph", {"placeholder": "Deinen Text hier einfügen..."}]]'
                        templateLock="false"
                />

            </div>
    </div>
<?php
