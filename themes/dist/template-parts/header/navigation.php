<div id="navbar">
    <div class="company-infos">
        <!--        <div class="contact-links">
            <?php
        /*            echo \TSC\CompanyInfos::getPhoneLink();
                    echo \TSC\CompanyInfos::getEmailLink();
                    */ ?>
        </div>
        <div class="adress">
            <?php
        /*            echo \TSC\CompanyInfos::getStreet('', '<br>');
                    echo \TSC\CompanyInfos::getZipCity('', '');
                    */ ?>
        </div>-->
        <?php
        if (is_active_sidebar('menu_widget')) : ?>
            <div class="menu-widget">
                <?php dynamic_sidebar('menu_widget'); ?>
            </div>
        <?php endif; ?>

    </div>


    <div class="brand-wrapper">
        <?php // brand
        $tsc_logo = new TSC\Logo();
        echo $tsc_logo->get_mobile_logo();
        echo $tsc_logo->get_custom_logo();
        echo $tsc_logo->get_white_logo();
        ?>
    </div>
    <button id="menu-button"
            type="button"
            aria-expanded="false"
            aria-controls="primary-nav"
            aria-label="Menü öffnen">
        <span class="sign" aria-hidden="true"></span>
        <span class="screen-reader-text">Menü öffnen</span>
    </button>
    <nav id="primary-nav" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">

        <?php wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'nav-menu',
            'menu_id' => 'main-nav',
            'container' => false,
            'depth' => 2,
            'fallback_cb' => false
        ));
        ?>



        <?php if (function_exists('pll_the_languages')) : ?>
            <div class="nav-area">
                <ul class="languages">
                    <?php pll_the_languages(array(
                        'hide_if_empty' => 0
                    )); ?>
                </ul>
            </div>
        <?php endif; ?>


    </nav>
</div>

