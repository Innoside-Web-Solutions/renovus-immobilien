<div id="navbar">

    <?php


    $tsc_logo = new TSC\Logo();
    echo $tsc_logo->get_mobile_logo();
    echo $tsc_logo->get_custom_logo();
    echo $tsc_logo->get_white_logo();

    ?>

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
        )); ?>

        <?php //social links navbar
        $navIcons = new TSC\SocialLinks;
        if ($navIcons->show__navbarIcons()) {
            echo $navIcons->get_socialLinks();
        }
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


<?php // side nav ?>
<div id="side-navbar">


    <button id="side-menu-button"
            type="button"
            aria-expanded="false"
            aria-controls="side-navigation"
            aria-label="<?php esc_attr_e('Menü öffnen', 'tsc'); ?>">
        <span class="sign" aria-hidden="true"></span>
        <span class="screen-reader-text"><?php esc_html_e('Menü öffnen', 'tsc'); ?></span>
    </button>


    <nav id="side-navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">

        <?php wp_nav_menu(array(
            'theme_location' => 'side_nav',
            'menu_class' => 'nav-side-menu',
            'menu_id' => 'side-nav',
            'container' => false,
            'depth' => 2,
            'fallback_cb' => false
        )); ?>

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