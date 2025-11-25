<?php

$images = get_field('carousel_gallery_images');


/**
 * Image Carousel  Block template.
 *
 * @param array $block The block settings and attributes.
 */

/**
 * Anker übergeben, der im Gutenberg-Editor eingegeben werden kann
 */
$anchor = 'id="' . 'image-carousel-' . rand(1000, 5000) . '" ';
if (isset($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}


/**
 * CSS Klassen übergeben, die im Gutenberg Editor eingegeben werden können
 */
$class_name = 'image-carousel';
if (isset($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>


<div <?php echo esc_attr($anchor); ?> class="<?php echo esc_attr($class_name); ?>"
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


    <div class="splide">
        <div class="splide__track">
            <ul class="splide__list image-carousel-list">
                <?php
                foreach ($images as $image_url) {
                    echo '<li class="splide__slide">';
                    echo '<a href="' . wp_get_attachment_image_url($image_url, 'full') . '" data-fslightbox="tsc-image-carousel">';
                    echo wp_get_attachment_image($image_url, 'carousel_list');
                    echo '</a>';
                    echo ' </li >';
                }
                ?>
            </ul>
        </div>
    </div>


    <?php
    wp_enqueue_style('splide-style');
    wp_enqueue_script('splide-script');
    wp_enqueue_script('slider-script');

    ?>


</div>
