<?php
if (is_active_sidebar('sidebar_posts')) : ?>
    <aside class="sidebar">
        <?php dynamic_sidebar('sidebar_posts'); ?>
    </aside>
<?php endif; ?>