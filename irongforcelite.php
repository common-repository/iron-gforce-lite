<?php 

/**
 * Plugin Name: Iron gForce Lite
 * Plugin URI: https://ironplugins.com/iron-gforce/
 * Description: Quickly integrate your Greenhouse ATS platform directly into your WordPress website, effectively streamlining your recruitment process. This user-friendly plugin displays job listings directly from your specific Greenhouse job board. The free version of our plugin seamlessly integrates into your WordPress site via an iFrame, displaying vital job information including the department, job title, and location. See our advanced <a href="https://ironplugins.com/iron-gforce/">Iron gForce Professional</a> for full API-driven Greenhouse integration.
 * Version: 1.4
 * Requires PHP: 4.0+
 * Author: Ironplugins
 * Author URI: https://ironplugins.com/
 * Text Domain: iron-gforce-lite
 * Domain Path: /languages
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

$plugin_path = plugin_dir_path(__FILE__);
$plugin_url = plugin_dir_url(__FILE__);

/**
 * Add Iron gForce Dashboard Icon
 */
add_action('admin_head', 'irongforcelite_admin_dashicon');
function irongforcelite_admin_dashicon() {
  echo '
    <style>
    .dashicons-irongforce {
        background-image: url("'.esc_url(plugin_dir_url(__FILE__)).'admin/images/dashicon.png");
        background-repeat: no-repeat;
        background-position: center; 
    }
    </style>
'; }

/**
 * Include Plugin Dependencies
 */
require_once($plugin_path . 'dependencies/settings-fields.php');

if(file_exists(get_stylesheet_directory().'/irongforce/shortcodes.php')){
    require_once(get_stylesheet_directory().'/irongforce/shortcodes.php'); 
} else {
    require_once($plugin_path . 'dependencies/shortcodes.php'); 
}