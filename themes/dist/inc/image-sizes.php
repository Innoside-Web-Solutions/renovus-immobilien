<?php

function add_imagesize(){
    add_image_size('post_list','700','525',true);
    add_image_size('tsc_logo_size','400','100',false);
    add_image_size('carousel_list','525','393',true);
    add_image_size('image_teaser', 525, 525, ['center', 'center']); // Zuschneidung mit Fokus auf die Mitte
}

add_action('after_setup_theme', 'add_imagesize');