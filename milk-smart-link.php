<?php
/**
 * Milk smart link for WordPress
 *
 * @link              https://github.com/manzinello/milk-smart-link
 * @since             0.3.0
 * @package           milk-smart-link
 *
 * @wordpress-plugin
 * Plugin Name:       Milk smart link
 * Plugin URI:        https://github.com/manzinello/milk-smart-link
 * Text Domain:       milk-smart-link
 * Description:       Milk smart link for WordPress, a simple redirect system based on operating system
 * Version:           0.3.0
 * Author:            Matteo Manzinello
 * Author URI:        https://matteomanzinello.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

function milk_load_plugin_textdomain()
{
    load_plugin_textdomain('milk-smart-link', FALSE, basename(dirname(__FILE__)) . '/languages/');
}

add_action('plugins_loaded', 'milk_load_plugin_textdomain');

include_once('inc/os.php');
include_once('inc/helper.php');
include_once('inc/admin.php');

add_action('wp', 'milk_init');

function milk_init()
{

    global $UNKNOWN, $IOS, $ANDROID;

    if (get_the_ID() == get_option('milk_id')) {

        $os = milk_getOS();

        switch ($os) {

            case $IOS:
                milk_redirect(get_option('milk_ios'), 301);
                break;
            case $ANDROID:
                milk_redirect(get_option('milk_android'), 301);
                break;
            default:
                break;

        }

    }

}
