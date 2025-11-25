<?php

namespace TSC;

add_action('acf/init', function () {

    if (function_exists('acf_add_options_page')) {
        \TSC\Team::register__AcfOptionPage();
    }



});


add_action('after_setup_theme', function () {
    add_image_size('team_image', '768', '1024', true);
});


class Team
{
    protected $team = array();

    /*** Backend ***/


    static function register__AcfOptionPage()

    {

        acf_add_options_page(array(
            'page_title' => __('Team', 'ize'),
            'menu_title' => __('Team', 'ize'),
            'menu_slug' => 'tsc-team',
            'capability' => 'edit_pages',
            'redirect' => false,
            'position' => 8,
            'update_button' => __('Änderungen speichern', 'ize'),
            'updated_message' => __("Einstellungen wurden gespeichert", 'ize'),
        ));

    }


//  template parts
    protected function get_member_image($image_id)
    {
        if (!empty($member_name)):
            return wp_get_attachment_image($image_id, 'team_image');
        endif;
    }

    protected function get__member_name($member_name)
    {
        if (!empty($member_name)):
            return '<h3 class="member-name">' . __($member_name, 'ize') . '</h3>';
        endif;
    }

    protected function get__member_function($member_function)
    {
        if (!empty($member_function)):
            return '<p>' . __($member_function, 'ize') . '</p>';
        endif;
    }

    protected function get__member_description($member_description)
    {
        if (!empty($member_description)):
            return '<p>' . __($member_description, 'ize') . '</p>';
        endif;
    }

    protected function get_phoneLink($phone)
    {
        if (!empty($phone)):
            $url = 'tel:' . preg_replace(["/[^\+\d]+/", "/^\+430/", "/^00430/"], ["", "+43", "0043"], $phone);
            return '<a class="contact-link" href="' . $url . '">' .  str_replace("0043", "+43", $phone) . '</a>';
        endif;

    }

    protected function get_emailLink($email)

    {
        if (!empty($email)):
            $title = antispambot($email);
            $url = 'mailto:' . $email;
            return '<a class="contact-link" aria-label="' . __('Send Email', 'ize') . '" href="' . $url . '">' . $title . '</a>';
        endif;
    }

    protected function get_phoneIcon($phone)
    {
        if (!empty($phone)):
            $icon = '<i class="tsc-icon flaticon-telephone member-icon" aria-hidden="true"></i>';
            $url = 'tel:' . preg_replace("/[^\+\d]+/", "", $phone);
            return '<a aria-label="' . esc_attr__('Call now', 'ize') . '" href="' . $url . '">' . $icon . '</a>';
        endif;

    }

    protected function get_emailIcon($email)
    {
        if (!empty($email)):
            $icon = '<i class="tsc-icon flaticon-mail member-icon" aria-hidden="true"></i>';
            $url = antispambot('mailto:' . $email);
            return '<a aria-label="' . __('Send Email', 'ize') . '" href="' . $url . '">' . $icon . '</a>';
        endif;
    }

    public function get_linkedinIcon($linkedInUrl)
    {
        if (!empty($linkedInUrl)):
            $icon = '<i class="tsc-icon flaticon-linkedin member-icon" aria-hidden="true"></i>';
            return '<a href="' . $linkedInUrl . '" target="_blank" aria-label="' . esc_attr__('follow us at LinkedIn', 'ize') . '">' . $icon . '</a>';
        endif;
    }


    // template
    public function theTeam()
    {
// get array of all persons and personal data
        $team = $this->team = get_field('team', 'option');

        if ($team): ?>
            <ul class="team colored-bg-item-left">

                <?php foreach ($team as $member) : ?>
                    <li class="team-member">
                        <figure class="team-member-image">
                            <?php
                            echo wp_get_attachment_image($member['image'], 'team_image')
                            ?>
                        </figure>

                        <?php
                        if (!empty($member['email']) || !empty($member['phone']) || !empty($member['linkedin']) ):
                            echo '<div class="contact-icons">';
                                echo $this->get_emailIcon($member['email']);
                                echo $this->get_phoneIcon($member['phone']);
                                echo $this->get_linkedinIcon($member['linkedin']);
                            echo '</div>';
                        endif;
                        ?>

                        <div class="member-description">
                            <?php
                            echo $this->get__member_name($member['name']);
                            echo $this->get__member_function($member['function']);
                            echo $this->get__member_description($member['description']);
                            echo $this->get_phoneLink($member['phone']);
                            echo $this->get_emailLink($member['email']);
                            ?>
                        </div>

                    </li>
                <?php endforeach; ?>

            </ul>
        <?php endif;
    }


}



