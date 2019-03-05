<?php
/**
 * Milk smart link (redirection) for WordPress
 *
 * @link              https://github.com/manzinello/milk-smartlink
 * @since             0.1.0
 * @package           milk-smartlink
 *
 * @wordpress-plugin
 * Plugin Name:       Milk smart link
 * Plugin URI:        https://github.com/manzinello/milk-smartlink
 * Description:       Milk smart link (redirection) for WordPress
 * Version:           0.1.0
 * Author:            Matteo Manzinello
 * Author URI:        https://matteomanzinello.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

include_once('inc/os.php');
include_once('inc/helper.php');
include_once('inc/admin.php');

add_action('wp', 'milk_redirect');

function milk_redirect()
{

    global $UNKNOWN, $IOS, $ANDROID;

    if (get_the_ID() == get_option('milk_id')) {

        $os = getOS();

        switch ($os) {

            case $IOS:
                redirect(get_option('milk_ios'), 301);
                break;
            case $ANDROID:
                redirect(get_option('milk_android'), 301);
                break;
            default:
                break;

        }


    }
}
