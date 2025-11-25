<?php if (have_posts()) : ?>
    <?php while (have_posts()) {
        the_post();
        echo apply_filters('the_content', obfuscate_emails(get_the_content()));
    } ?>
<?php endif;