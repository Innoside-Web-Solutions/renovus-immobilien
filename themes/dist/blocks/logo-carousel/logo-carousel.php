<?php


/**
 * Carousel Block template.
 *
 * @param array $block The block settings and attributes.
 */
if (!empty(get_field('logos'))) {
    $logos = get_field('logos');
}

?>


<div <?php echo get_block_wrapper_attributes( [ 'class' => 'logo-carousel' ] ); ?>>

    <?php
    /*
     *  content
     * */

    if ($logos): ?>
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($logos as $logo): ?>
                        <li class="splide__slide">
                            <div class="wrapper">
                                <?php if (!empty($logo['img'])) echo wp_get_attachment_image($logo['img'], 'full'); ?>
                            </div>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>


        <?php

        wp_enqueue_style('slider-css');
        wp_enqueue_style('splide-style');
        wp_enqueue_script('splide-script');
        wp_enqueue_script('slider-script');
        ?>

    <?php endif; ?>
</div>

