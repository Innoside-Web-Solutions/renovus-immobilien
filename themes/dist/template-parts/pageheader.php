<?php
$activate = get_field('pageheader_activate', get_the_ID());
if ($activate === true): ?>

    <?php $pageheader = new TSC\Pageheader(); ?>
    <?php if ($pageheader): ?>

        <?php
        $header_class = "";
        if ($pageheader->no_of_slides === 1) {
            $header_class = "single-image-header";
        }
        ?>

        <header class="slider-header <?= $header_class; ?>">
            <?php
            echo $pageheader->get_pageheader_template();
            ?>

        </header>

    <?php endif; ?>


    <?php

    if ($pageheader->no_of_slides > 1) {
        wp_enqueue_style('splide-style');
        wp_enqueue_script('splide-script');
        wp_enqueue_script('slider-script');
    }
    ?>


<?php endif; ?>
