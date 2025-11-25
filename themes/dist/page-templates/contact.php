<?php
/* Template Name: Kontaktseite */

use TSC\CompanyInfos;

?>
<?php get_header(); ?>

    <main id="content" class="container" role="main">
        <?php include(locate_template('template-parts/content.php')); ?>

        <div class="is-layout-flex wp-container-3 wp-block-columns is-style-section">
            <div class="is-layout-flow wp-block-column is-style-default">
                <h2><?php _e('Schreiben Sie uns!', 'tsc');?></h2>
                <p><?php _e('Wir freuen uns auf Ihre Nachricht.', 'tsc');?></p>

                <?php echo CompanyInfos::getCompanyInfos();?>


            </div>
            <div class="is-layout-flow wp-block-column is-style-default">
                <?php dynamic_sidebar('contact_widget'); ?>
            </div>
        </div>


        <div class="is-layout-flex wp-container-3 wp-block-columns is-style-section">
            <div class="is-layout-flow wp-block-column is-style-default">
                <?php  TSC\ContactForm::theContactForm(); ?>
            </div>
            <div class="is-layout-flow wp-block-column is-style-default">
                <?php  TSC\CompanyInfos::theGoogleMapsIframe(); ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>