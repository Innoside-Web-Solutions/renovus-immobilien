

<div class="footer-row">
    <div class="infodata">
        <h4 class="footer-title not-animated"><?php _e('Kontakt', 'tsc'); ?></h4>
        <?php
        echo TSC\CompanyInfos::getCompanyInfos();
        dynamic_sidebar('footer_widget_3');
        ?>
    </div>

</div>