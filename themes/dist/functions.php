<?php

require_once(get_template_directory() . '/inc/classes/class-scriptloader.php');
require_once(get_template_directory() . '/inc/acf.php');
require_once(get_template_directory() . '/inc/admin.php');
require_once(get_template_directory() . '/inc/admin-bar.php');
require_once(get_template_directory() . '/inc/wp-login.php');

/**
 * C U S T O M I Z E R
 * **/
require_once(get_template_directory() . '/inc/customizer/customizer.php');
require_once(get_template_directory() . '/inc/customizer/add-company-info-section.php');
require_once(get_template_directory() . '/inc/customizer/add-imprint-section.php');
require_once(get_template_directory() . '/inc/customizer/add_social_links-section.php');
require_once(get_template_directory() . '/inc/customizer/add_logo_fields.php');


// Contact-form
// require_once(get_template_directory() . '/inc//classes/class-contactform.php');
// require_once(get_template_directory() . '/inc/customizer/add-contact-form-section.php');

/**
 * T H E M E   S E T U P
 * **/
require_once(get_template_directory() . '/inc/theme-setup.php');
require_once(get_template_directory() . '/inc/enqueue.php');
require_once(get_template_directory() . '/inc/head.php');
require_once(get_template_directory() . '/inc/image-sizes.php');
require_once(get_template_directory() . '/inc/media.php');
require_once(get_template_directory() . '/inc/posts.php');
require_once(get_template_directory() . '/inc/util.php');
require_once(get_template_directory() . '/inc/widgets.php');


/**
 * C L A S S E S
 * **/
require_once(get_template_directory() . '/inc/classes/class-privacypolicy.php');
require_once(get_template_directory() . '/inc//classes/class-companyinfos.php');
require_once(get_template_directory() . '/inc//classes/class-imprint.php');
require_once(get_template_directory() . '/inc//classes/class-pageheader.php');
require_once(get_template_directory() . '/inc//classes/class-sociallinks.php');
require_once(get_template_directory() . '/inc//classes/class-logo.php');

/*======= Team ======== */
//require_once(get_template_directory() . '/inc//classes/class-team.php');


/**
 * A C F  B L O C K S
 * **/
require_once(get_template_directory() . '/inc/block-register.php');
require_once(get_template_directory() . '/inc/custom-blocks-settings.php');

/**
 * G U T E N B E R G   B L O C K S
 * **/
require_once(get_template_directory() . '/inc/blocks.php');




/**
 * C U S T O M   P O S T   T Y P E S
 * **/
// require_once(get_template_directory() . '/custom-post-types/serialcrafted.php');

