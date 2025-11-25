<?php


/**
 * Slider Header Block template.
 *
 * @param array $block The block settings and attributes.
 */

/**  ACF Fields
 */
$lighted_menu = get_field('lighted_menu');
$overlay_color = get_field('overlay_color');
$slides = get_field('header_slides');

if ($slides) {
    $no_of_slides = count($slides);
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


$class_name = 'tsc-slider-header';
if ($lighted_menu == true) {
    $class_name .= " no-body-spacing";
}

if (isset($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

if ($no_of_slides == 1) {
    $class_name .= ' ' . 'image-header';
}

/**
 * Block Attribute übergeben
 * Overlay Attribute übergeben
 */

if (isset($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

if (isset($block['backgroundColor'])) {
    $class_name .= ' has-' . $block['backgroundColor'] . '-background-color';
}
if (isset($block['textColor'])) {
    $class_name .= ' has-' . $block['textColor'] . '-color';
}

/*** Attribute übergeben - ende  ***/

?>
<?php if ($slides): ?>

    <div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>"
        <?php
        /**
         * hole die Spacing Values aus dem Array Block und setze diese nach Modifikation als Inline Style
         */
        if (isset($block['style'])) {
            if ($spacing_values = get_spacing_values($block)) {
                echo "style='{$spacing_values}';";
            }
        }
        ?>>


        <?php /** overlay */
        echo "<span class='overlay' style=' background-color: $overlay_color;'></span>";
        ?>


        <?php /** Block Content Single Image Pageheader **/ ?>

        <?php if ($no_of_slides == 1): ?>
            <div class="single-image-header"
                 style="background-image: url('<?php echo wp_get_attachment_image_url($slides[0]['img'], 'full') ?>');">
            </div>

            <InnerBlocks/>

        <?php else: ?>

            <?php /** Block Content Slider **/ ?>

            <div class="splide image-slider">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach ($slides as $slide): ?>
                            <li class="splide__slide">
                                <div class="image-slide"
                                     style="background-image: url('<?php echo wp_get_attachment_image_url($slide['img'], 'full') ?>');">
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>

            <InnerBlocks/>


            <?php /** Block Content end **/ ?>

        <?php endif; ?>
    </div>

    <?php
    wp_enqueue_style('splide-style');
    wp_enqueue_script('splide-script');
    wp_enqueue_script('slider-script');

    ?>


    <?php if ($lighted_menu == true): ?>
        <script>
            // klasse setzen für lighted main-nav
            document.addEventListener('DOMContentLoaded', function () {
                const nav = document.getElementById('navbar');
                if (nav) {
                    nav.classList.add('full-size-pageheader-menu');
                    nav.classList.add('lighted');
                }
            });
        </script>


    <?php endif; ?>


<?php endif; ?>
