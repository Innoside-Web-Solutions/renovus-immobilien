<?php

add_filter('upload_mimes', function ($mimes = array()) {
    $mimes['extension'] = 'mime/type';
    $mimes['svg'] = 'image/svg+xml';
    $mimes['zip'] = 'application/zip';
    return $mimes;
});