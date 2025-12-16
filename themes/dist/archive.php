<?php get_header(); ?>
<div class="container">


    <header>
        <?php include(locate_template('template-parts/archive-title.php')); ?>
        <?php if (get_the_archive_description()) : ?>
            <div class="archive-description">
                <?= get_the_archive_description(); ?>
            </div>
        <?php endif; ?>
    </header>
    <div class="has-sidebar">
        <main id="content" class=" post-list" role="main">

            <?php if (have_posts()) {
                include(locate_template('template-parts/posts/list.php'));
                // utils.php
                the_archive_pagination();
            } else {
                include(locate_template('template-parts/posts/noposts.php'));
            } ?>
        </main>

            <?php include(locate_template('template-parts/posts/sidebar-archive.php')); ?>

    </div>
</div>
<?php get_footer(); ?>

