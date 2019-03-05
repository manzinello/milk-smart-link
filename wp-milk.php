<?php
/**
 * Milk-smartlink plugin for WordPress
 *
 * @link              https://github.com/manzinello/wp-milk
 * @since             0.1.0
 * @package           milk
 *
 * @wordpress-plugin
 * Plugin Name:       Milk
 * Plugin URI:        https://github.com/manzinello/wp-milk
 * Description:       Milk smart link redirection for WordPress
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

add_action('admin_menu', 'milk_settings');

function milk_settings() {
	add_menu_page('Milk settings', 'Milk settings', 'manage_options', 'wp-milk', 'milk_settings_page');
};

function milk_settings_page() {
	echo '<h1>Milk</h1>';
}

$os = getOS();
