<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php

body_class();
?>>
<a class="skip-link screen-reader-text" href="#content"><?php _e('Zum Inhalt springen', 'tsc') ?>></a>

<?php wp_body_open();
include(locate_template('template-parts/header/navigation.php'));
include(locate_template('template-parts/header/scroll-top.php'));
include(locate_template('template-parts/header/sidebar-menu.php'));
