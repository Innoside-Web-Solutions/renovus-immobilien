<?php


/**
 * Video Header Block template.
 *
 * @param array $block The block settings and attributes.
 */



/**
 * CSS Klassen übergeben, die im Gutenberg Editor eingegeben werden können
 */


$lighed_menu = get_field('lighted_menu');
$class_name = 'tsc-video-header alignfull';
if ($lighed_menu == true) {
    $class_name .= " no-body-spacing";
}

/**
 * Block Attribute übergeben
 * Overlay Attribute übergeben
 */
$overlay_class_name = "video-overlay";

?>

    <div <?php echo get_block_wrapper_attributes( [ 'class' => $class_name ] ); ?>>


        <?php
        $header_video = get_field('header_video');
        if ($header_video): ?>
            <video autoplay muted loop playsinline>
                <source src="<?php echo esc_url($header_video['url']); ?>"
                        type="<?php echo esc_attr($header_video['mime_type']); ?>">
            </video>

            <?php if ($overlay_color = get_field('overlay_color')): ?>
                <span class="<?php echo $overlay_class_name; ?>" style="background-color: <?php echo $overlay_color ?>"></span>
            <?php endif; ?>


            <div class="video-content">
                <InnerBlocks/>
            </div>
        <?php endif; ?>

    </div>

<?php if ($lighed_menu == true): ?>

    <script>
        // klasse setzen für lighted main-nav
        document.addEventListener('DOMContentLoaded', function () {
            const nav = document.getElementById('navbar'); // Dein Menü
            if (nav) {
                nav.classList.add('full-size-pageheader-menu');
                nav.classList.add('lighted');
            }
        });
    </script>

<?php endif; ?>