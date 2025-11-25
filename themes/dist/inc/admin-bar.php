<?php
function hide_admin_bar_on_mobile() {
if ( wp_is_mobile() ) {
add_filter( 'show_admin_bar', '__return_false' );
}
}
add_action( 'wp', 'hide_admin_bar_on_mobile' );
