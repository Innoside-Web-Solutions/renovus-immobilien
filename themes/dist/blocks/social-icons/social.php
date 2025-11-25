
<?php

$anchor = '';
if (isset($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

/**
 * CSS Klassen übergeben, die im Gutenberg Editor eingegeben werden können
 */
$class_name = "follow";
if (isset($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
/**
 * Attribute übergeben
 */

if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
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
    $social_bar = new TSC\SocialLinks();
    echo $social_bar->get_socialLinks();
    ?>

</div>