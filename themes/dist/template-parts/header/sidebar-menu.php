<?php

use TSC\CompanyInfos;
$socialIcons = new TSC\SocialLinks();

if ($socialIcons->show__sidebarIcons()) :


    ?>
    <div id="sidebar-menu">

        <?php
        echo CompanyInfos::getContactIcons('contact-icons');
        echo $socialIcons->get_socialLinks();  ?>

    </div>
<?php endif; ?>