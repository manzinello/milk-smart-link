<?php
/**
 * Milk smart link (redirection) for WordPress
 *
 * @link              https://github.com/manzinello/wp-milk
 * @since             0.1.0
 * @package           milk
 *
 * @wordpress-plugin
 * Plugin Name:       Milk smart link
 * Plugin URI:        https://github.com/manzinello/wp-milk
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
include_once('inc/admin.php');

add_action('wp', 'milk_redirect');

function milk_redirect()
{
    if (get_the_ID() == 5) {
        redirect('https://www.google.it', 301);
    }
}
