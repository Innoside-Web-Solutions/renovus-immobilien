<nav class="post-navigation" role="navigation">
    <h3 class="screen-reader-text"><?php _e('Beitrags-Navigation', 'tsc'); ?></h3>
    <div class="nav-links">
        <div class="nav-previous">
            <?php $prev = get_adjacent_post(true, '', true);
            if (!empty($prev)) echo '<a class="single-prev" href="' . get_permalink($prev->ID) . '" title="' . $prev->post_title . '"><span class="icon-arrow_back" aria-hidden="true"></span> ' . $prev->post_title . '</a>'; ?>
        </div>
        <div class="nav-next">
            <?php $next = get_adjacent_post(true, '', false);
            if (!empty($next)) echo '<a class="single-next" href="' . get_permalink($next->ID) . '" title="' . $next->post_title . '">' . $next->post_title . ' <span class="icon-arrow_forward" aria-hidden="true"></span></a>'; ?>
        </div>
    </div>
</nav>
<?php if (strpos($_SERVER['HTTP_REFERER'], get_home_url()) !== false) : ?>
    <div class="back">
        <a class="btn btn-secondary" href="javascript:history.back()"><?php _e('Back', 'tsc'); ?></a>
    </div>
<?php endif; ?>