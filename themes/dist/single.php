<?php get_header(); ?>

    <header class="container">
        <div class="wp-block-columns">
            <div class="wp-block-column">
                <?php the_title('<h1 >', '</h1>'); ?>
            </div>
            <div class="wp-block-column">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('large');
                }
                ?>
            </div>
        </div>
    </header>
    <div class="container">
        <main id="content">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    the_content();
                }
            }

            get_tsc_post_pagination('Voriger Beitrag', 'Nächstger Beitrag');
            ?>



        </main>
        <?php include(locate_template('template-parts/posts/sidebar-posts.php')); ?>

    </div>
<?php get_footer(); ?>