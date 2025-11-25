<?php
echo do_blocks('<!-- wp:template-part {"slug":"footer","area":"footer", "anchor":"page-footer", "className":"page-footer"} /-->');
?>

    <div class="site-info legals">
        <span class="copyright">&copy; <?= date('Y ') . get_bloginfo('name'); ?> </span>
        <?php include( locate_template('template-parts/footer/navigation.php') ); ?>

    </div>
<?php wp_footer(); ?>
</body>
</html>
