<?php

if (!empty(get_field('tsc-teaser-icon'))) {
    $teaser_icon_url = get_field('tsc-teaser-icon');
}


/**
 * Anker übergeben, der im Gutenberg-Editor eingegeben werden kann
 */
$anchor = '';
if ( isset($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}


/**
 * CSS Klassen übergeben, die im Gutenberg Editor eingegeben werden können
 */
$class_name = 'tsc-block-team ';
if ( isset($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
/**
 * Attribute übergeben
 */


/*if (isset($block['backgroundColor'])) {
    $class_name .= ' has-' . $block['backgroundColor'] . '-background-color';
}
if (isset($block['textColor'])) {
    $class_name .= ' has-' . $block['textColor'] . '-color';
}*/

?>
<div class="<?= esc_attr($class_name); ?>">
    <?php
    $team = new TSC\Team();
    $team->theTeam();
    ?>
</div>
