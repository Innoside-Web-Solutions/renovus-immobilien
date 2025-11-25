<?php


/**
 * Retrieves the spacing values from the given block's style settings.
 *
 * @param array $block The block from which the spacing values should be retrieved.
 * @return string The spacing values formatted as CSS properties.
 */


function get_spacing_values($block) {
    $spacing_types = array('padding', 'margin');
    $directions = array('top', 'right', 'bottom', 'left');
    $spacing_values = '';

    foreach ($spacing_types as $spacing_type) {
        foreach ($directions as $direction) {
            if (isset($value)){$value = $block['style']['spacing'][$spacing_type][$direction];}


            if (isset($value)) {
                if (strpos($value, 'var:preset|spacing|') === 0) {
                    $value = str_replace('var:preset|spacing|', 'var(--wp--preset--spacing--', $value) . ')';
                }

                $spacing_values .= "{$spacing_type}-{$direction}: {$value}; ";
            }
        }
    }

    return $spacing_values;
}

