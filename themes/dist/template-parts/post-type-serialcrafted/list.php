<div class="post-grid">
    <?php
    while (have_posts()) : the_post();
        get_template_part('template-parts/post-type-serialcrafted/item');
    endwhile;
    ?>
</div>