<?php
// WP_Query um die letzten 3 Beiträge abzufragen
$recent_posts_query = new WP_Query(array(
    'posts_per_page' => 3, // Anzahl der abzufragenden Beiträge
    'post_status' => 'publish', // Nur veröffentlichte Beiträge
    'orderby' => 'date', // Sortieren nach Veröffentlichungsdatum
    'order' => 'DESC' // In absteigender Reihenfolge
)); ?>

<?php if ($recent_posts_query->have_posts()) : ?>


    <?php

    /**
     * Icon Teaser Block template.
     *
     * @param array $block The block settings and attributes.
     */

    if (!empty(get_field('tsc-teaser-icon'))) {
        $teaser_icon_url = get_field('tsc-teaser-icon');
    }


    /**
     * Anker übergeben, der im Gutenberg-Editor eingegeben werden kann
     */
    $anchor = '';
    if (isset($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }


    /**
     * CSS Klassen übergeben, die im Gutenberg Editor eingegeben werden können
     */
    $class_name = 'current-posts-block';
    if (isset($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    /**
     * Attribute übergeben
     */
    if (isset($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    if (isset($block['backgroundColor'])) {
        $class_name .= ' has-' . $block['backgroundColor'] . '-background-color';
    }
    if (isset($block['textColor'])) {
        $class_name .= ' has-' . $block['textColor'] . '-color';
    }

    ?>


    <div <?php echo esc_attr($anchor); ?>class="<?php echo esc_attr($class_name); ?>"
        <?php
        /**
         * hole die Spacing Values aus dem Array Block und setze diese nach Modifikation als Inline Style
         */
        if (isset($block['style'])) {
            if ($spacing_values = get_spacing_values($block)) {
                echo "style='{$spacing_values}'";
            }
        }
        ?>
    >

        <?php
        if (!isset($t_tag)) $t_tag = 'h3';
        if (!isset($img_size)) $img_size = 'post_list';
        ?>
        <div class="post-grid">
            <?php while ($recent_posts_query->have_posts()) : $recent_posts_query->the_post(); ?>
                <article class="post-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <a rel="bookmark" href="<?php the_permalink() ?>">
                            <figure>
                                <?php the_post_thumbnail($img_size); ?>
                            </figure>
                        </a>
                    <?php endif; ?>
                    <div class="post-content">
                        <div class="post-meta">
                            <time class="date"
                                  datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d.m.Y'); ?></time>
                            <?php # the_category(', '); ?>
                        </div>
                        <?= '<' . $t_tag . ' class="post-title">' . get_the_title() . '</' . $t_tag . '>'; ?>
                        <a class="btn-primary"
                           href="<?php the_permalink(); ?>"><?php esc_attr_e('Mehr erfahren', 'tsc'); ?></a>

                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>

<?php endif; ?>