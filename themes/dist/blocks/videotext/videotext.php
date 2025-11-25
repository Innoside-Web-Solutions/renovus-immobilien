<?php

// Block-Attribute (Anchor, Klasse etc.)
$anchor = isset($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '"' : '';
$class_name = 'tsc-video-text-banner';
if (isset($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (isset($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// ACF-Felder
$text = get_field('mask_text');
$video = get_field('video_file');
$background_image_id = get_field('bg-image');
$background_image_url = wp_get_attachment_image_url($background_image_id, 'full');

?>

<?php if ($text && $video): ?>

    <div <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?>">


        <video class="bg-video" autoplay muted loop playsinline>
            <source src="<?php echo esc_url($video); ?>" type="video/mp4">
        </video>

        <svg class="video-text" aria-hidden="true">
            <mask id="mask">
                <rect fill="white" width="100%" height="100%"></rect>
                <text id="svg-text" x="50%" y="50%" dominant-baseline="central"
                      text-anchor="middle"><?php echo esc_html($text); ?>
                </text>
            </mask>

            <?php if ($background_image_url): ?>
                <image href="<?php echo esc_url($background_image_url); ?>" width="100%" height="100%"
                       preserveAspectRatio="xMidYMid slice" mask="url(#mask)"></image>
            <?php endif; ?>

            <!--         für weißen Hintergrund       <rect fill="white" width="100%" height="100%" id="mask-bg"></rect>-->


        </svg>
        <span class="screen-reader-text"><?php echo esc_html($text); ?></span>
    </div>
<?php endif; ?>
