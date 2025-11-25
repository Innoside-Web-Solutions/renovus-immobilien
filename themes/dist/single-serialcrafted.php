<?php get_header(); ?>

    <div class="container">
        <main id="content">

            <?php
            if (has_post_thumbnail()) {
                echo '<figure class="serial-crafted-thumbnail">';
                the_post_thumbnail('full');
                echo '</figure>';
            }
            ?>

            <div class="serial-crafted-infos">
                <?php the_title('<h1>', '</h1>'); ?>
                <div class="serial-crafted-details">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            the_content();
                        }
                    }
                    ?>
                </div>
            </div>
        </main>

        <?php get_tsc_post_pagination('voriger Objekt', 'nächstes Objekt'); ?>
    </div>
<?php get_footer(); ?>