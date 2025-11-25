<?php get_header(); ?>
    <div id="content" class="container" role="main">
        <h1 class="has-base-color"><?php esc_attr_e('Page not found', 'ize'); ?></h1>
        <a class="btn-primary" href="<?= home_url(); ?>"><?php esc_attr_e('To Homepage', 'ize'); ?></a>
    </div>
<?php get_footer(); ?>