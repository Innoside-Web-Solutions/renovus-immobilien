<?php

function archive_pagination()
{
    echo '<nav class="pagination">';
    echo paginate_links(array(
        'prev_text' => '<span class="icon-arrow_back" aria-hidden="true"></span><span class="screen-reader-text">'.esc_attr__('backward','tsc').'</span>',
        'next_text' => '</span><span class="screen-reader-text">'.esc_attr__('forward','tsc').'</span><span class="icon-arrow_forward" aria-hidden="true">',
    ));
    echo '</nav>';
}

add_filter( 'excerpt_length', function ( $length ) {
    return 25;
}, 999 );

add_filter('excerpt_more', function ($more) {
    return '...';
}, 21 );



/**
 * Removes some menus by page.
 */
function wpdocs_remove_menus(){
    remove_menu_page( 'edit.php' ); //Posts
}
// add_action( 'admin_menu', 'wpdocs_remove_menus' );


