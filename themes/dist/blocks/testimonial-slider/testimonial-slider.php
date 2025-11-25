<?php

$slides = get_field('testimonial_slider');

/**
 * Testimonial Slider  Block template.
 *
 * @param array $block The block settings and attributes.
 */
?>

<div <?php echo get_block_wrapper_attributes( [ 'class' => 'tsc-testimonial-slider' ] ); ?>>
    <?php echo get_field( 'opening_hours', 'option' ) ; ?>
    <span class="dashicons dashicons-format-quote testimonial-sign"></span>
    <div class="splide">
        <div class="splide__track">

            <ul class="splide__list image-carousel-list">
                <?php
                foreach ($slides as $slide) {
                    echo '<li class="splide__slide">';
                    echo '<div class="content">';
                    echo $slide['content'];
                    echo '<div>';
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
    <?php wp_reset_postdata(); ?>

</div>
