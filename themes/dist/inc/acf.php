<?php

if (function_exists('acf_add_options_page')) {


    /* ACF Feldgruppen und Feldeinstellungen als .json-Dateien im Theme speichern (Verzeichnis "acf-fields") und von dort laden
* ACHTUNG: das Verzeichnis "acf-fields" muss existieren, damit die Dateien dort gespeichert werden können!
* https://www.advancedcustomfields.com/resources/local-json/
*/

    add_filter('acf/settings/save_json', function ($path) {
        $path = get_stylesheet_directory() . '/acf-fields';
        return $path;
    });

    add_filter('acf/settings/load_json', function ($paths) {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/acf-fields';
        return $paths;
    });
}

add_action('init', 'init_acf_scripts');
function init_acf_scripts()
{
    if (function_exists('acf_add_options_page')) {


        add_filter('acf/fields/wysiwyg/toolbars', function ($toolbars) {
            $toolbars['Simple'] = array();
            $toolbars['Simple'][1] = array('bold', 'bullist', 'link', 'removeformat');
            return $toolbars;
        });

        if (function_exists('acf_add_options_page')):
            acf_add_options_page(array(
                'page_title' => __('Datenschutz', 'tsc'),
                'menu_title' => __('Datenschutz', 'tsc'),
                'menu_slug' => 'tsc-privacy',
                'capability' => 'edit_pages',
                'redirect' => false,
                'position' => 100,
                'icon_url' => 'dashicons-shield',
                'update_button' => __('Änderungen speichern', 'tsc'),
                'updated_message' => __("Datenschutz-Einstellungen gespeichert", 'tsc'),
            ));
        endif;


        //add_filter('acf/settings/show_admin', '__return_false');


    } else {
        add_action('admin_notices', function () {
            ?>
            <div class="error notice">
                <p><?php esc_attr_e('ACHTUNG: Das Plugin "ACF Pro" muss installiert werden!', 'tsc'); ?></p>
            </div>
            <?php
        });
    }

    if (!defined('ACF_PRO_LICENSE')) {
        define('ACF_PRO_LICENSE', 'Y2Q2MmIwMmIwODUyNTc1ZThlZjUxNTkzZTI2ZTE0MWMwZDgzNDAzMWQ0ZTczMWQwMjBjZGU3');
    }



    
}
