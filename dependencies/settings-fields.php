<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

// Add a menu item under the "Settings" menu
function irongforce_lite_add_menu() {
    add_menu_page(
        'Iron gForce Lite Settings',
        'Iron gForce Lite',
        'manage_options',
        'iron-gforce-lite',
        'irongforce_lite_render_settings_page',
        'dashicons-irongforce'
    );
}
add_action('admin_menu', 'irongforce_lite_add_menu');

// Register the settings
function irongforce_lite_register_settings() {
    register_setting('irongforce_lite_settings_group', 'gjl_job_board');
}
add_action('admin_init', 'irongforce_lite_register_settings');

// Render the settings page
function irongforce_lite_render_settings_page() {
    ?>
    <div class="wrap irongforce-settings">
        <h1>Iron gForce Lite Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('irongforce_lite_settings_group'); ?>
            <?php do_settings_sections('irongforce_lite_settings_group'); ?>
            
            <!-- Include the image and help text -->
            <div class="irongforce-image-container">
                <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__) . '/../../') . 'admin/images/Iron-gForce-lite-logo.png'); ?>">
            </div>

            <p class="irongforce-description">
                Quickly integrate your Greenhouse ATS platform directly into your WordPress website, 
                effectively streamlining your recruitment process. 
                This user-friendly plugin displays job listings directly from your specific 
                Greenhouse job board. The free version of our plugin seamlessly integrates into your 
                WordPress site via an iFrame, displaying vital job information including the department, 
                job title, and location. See our advanced 
                <a target="_blank" href="https://ironplugins.com/iron-gforce/">Iron gForce Professional</a> 
                for full API-driven Greenhouse integration.
            </p>

            <!-- Display the input field below the image and text -->
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Job Board Token</th>
                    <td>
                        <input type="text" class="regular-text" name="gjl_job_board" value="<?php echo esc_attr(get_option('gjl_job_board')); ?>" />
                        <p class="description">Enter your Greenhouse.io Job Board token. To locate your token, login to your greenhouse.io account and go <a target="_blank" href="https://app7.greenhouse.io/configure/dev_center/config">here.</a></p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button(); ?>
        </form>
    </div>
    <style>
        .irongforce-settings {
            background-color: #FFF;
            padding: 1rem;
        }

        .irongforce-settings h1 {
            border-bottom: 1px solid #DDD;
            padding-bottom: 0.5rem;
        }

        .irongforce-image-container img {
            max-width: 60%;
            margin-top: 2rem;
        }

        .irongforce-description {
            margin-top: 1rem;
            padding-right: 15%;
        }
    </style>
    <?php
}
