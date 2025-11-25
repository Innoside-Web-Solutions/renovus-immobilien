<?php


/**
 * Icon Teaser Block template.
 *
 * @param array $block The block settings and attributes.
 */

if (!empty(get_field('image_teaser'))) {
    $image_teasers = get_field('image_teaser');
}
if (!empty(get_field('image-teaser-columns'))) {
    $cols = get_field('image-teaser-columns');
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
$class_name = "image-teaser-block image-teaser-col-$cols" ;
if (isset($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
/**
 * Attribute übergeben
 */


if (isset($block['backgroundColor'])) {
    $class_name .= ' has-' . $block['backgroundColor'] . '-background-color';
}
if (isset($block['textColor'])) {
    $class_name .= ' has-' . $block['textColor'] . '-color';
}

?>



<?php if (!empty($image_teasers)) : # start view ?>
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

        <?php foreach ($image_teasers as $image_teaser): # start items ?>
                <div class="image-teaser-item">
                    <a class="image-teaser-link" href="<?php echo $image_teaser['link']; ?>">
                        <?php
                        if ($image_teaser['img']) echo wp_get_attachment_image($image_teaser['img'], 'image_teaser');
                        if ($image_teaser['title']) echo "<h3 class='image-teaser-title'>" . $image_teaser['title'] . '</h3>';
                        if ($image_teaser['description']) echo '<div class="image-teaser-description">' .$image_teaser['description'] . '</div>';
                        ?>
                    </a>
                </div>
        <?php endforeach; # end items ?>

    </div>
<?php endif; # end view ?>

