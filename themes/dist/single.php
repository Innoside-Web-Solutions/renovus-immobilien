<?php get_header(); ?>

    <header class="container">

        <div class="wp-block-group">
            <?php the_title('<h1 class="is-style-h2 is-style-wave-chars" >', '</h1>'); ?>

            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('post_single');
            }
            ?>


        </div>
    </header>
    <div class="container">
    <div class="has-sidebar">


            <main id="content">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        the_content();
                    }
                }

                ?>


            </main>
            <?php include(locate_template('template-parts/posts/sidebar-posts.php')); ?>

        </div>
    </div>
<?php get_footer(); ?>