<?php
/* Template Name: Datenschutz */

use TSC\PrivacyPolicy;

?>

<?php get_header(); ?>
    <main id="content" class="container-small" role="main">

        <h1><?php _e('Datenschutz-Erklärung bzw. Informationen gemäß Art 13 und 14 DSGVO', 'tsc') ?></h1>

        <h2><?php _e('Kontaktdaten:') ?></h2>
        <?php echo TSC\CompanyInfos::getCompanyFullInfos(); ?>

        <h2><?php _e('Datenverarbeitungszwecke:') ?></h2>

        <?php
        $privacyTexts = new PrivacyPolicy();
        echo $privacyTexts->generatePolicyHtml();

        echo "<div class='wp-block-group'></div>";
        include(locate_template('template-parts/content.php')); ?>

    </main>

<?php get_footer(); ?>