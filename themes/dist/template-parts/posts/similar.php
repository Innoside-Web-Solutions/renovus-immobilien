<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'rand',
    'post__not_in' => array(get_the_ID())
);
$categories = get_the_category();
if (!empty($categories)) {
    $catIds = array();
    foreach ($categories as $cat) {
        $catIds[] = $cat->term_id;
    }
    $newsArgs['category'] = implode(',', $catIds);
}
query_posts($args);
if (have_posts()): ?>
    <section class="similar-post post-list">
        <div class="container">
            <h3 class="section-title"><?php esc_attr_e('Similar Posts', 'tsc'); ?></h3>
            <?php $t_tag = 'h4';
            include(locate_template('template-parts/posts/list.php')); ?>
        </div>
    </section>
<?php endif;
wp_reset_query(); ?>
