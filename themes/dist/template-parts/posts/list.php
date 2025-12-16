<?php
if (!isset($t_tag)) $t_tag = 'h2';
if (!isset($img_size)) $img_size = 'post_list';
?>
<div class="post-grid is-style-delayed-fade-in">
    <?php while (have_posts()) : the_post(); ?>
        <article class="post-item">
            <div class="post-meta">
                <time class="date" datetime="<?php the_time('Y-m-d'); ?>">
                    <?php
                    echo '<span class="date-main">' . strtoupper(get_the_date('d')) . '</span>';
                    echo '<span class="date-sub">' . strtoupper(str_replace('.', '', get_the_date('M Y'))) . '</span>';
                    ?>
                </time>
                <?php the_category(''); ?>
            </div>
            <div class="post-content">
                <?php if (has_post_thumbnail()) : ?>
                    <a rel="bookmark" href="<?php the_permalink() ?>">
                        <figure>
                            <?php the_post_thumbnail($img_size); ?>
                        </figure>
                    </a>
                <?php endif; ?>
                <?= '<' . $t_tag . ' class="post-title not-animated">' . get_the_title() . '</' . $t_tag . '>'; ?>

                <a class="btn" href="<?php the_permalink(); ?>"><?php esc_attr_e('Mehr erfahren', 'tsc'); ?></a>

            </div>
        </article>
    <?php endwhile; ?>
</div>