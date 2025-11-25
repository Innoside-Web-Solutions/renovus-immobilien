<?php

add_action('login_enqueue_scripts', function () {
    wp_enqueue_style('custom-login', get_template_directory_uri() . '/assets/css/login.css', false);
});


add_filter('login_message', function ($message) {
    if (empty($message) && function_exists('the_custom_logo')) {
        the_custom_logo();
    } else {
        return $message;
    }
});


add_action('login_header', function () {
    ?>
    <p class="creator">
        <?php locate_template('InnosideSourceSansBrand.svg') ?>
        <a class="creator-logo" href="https://innoside.at/" target="_blank"
           title="Innoside Web Solutions by Mag. Dr. Thomas Schreiber">

        </a>
    </p>
    <?php
});