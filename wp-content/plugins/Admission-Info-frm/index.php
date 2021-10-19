<?php 
/**
* Plugin Name
*
* @package           PluginPackage
* @author            Your Name
* @copyright         2019 Your Name or Company Name
* @license           GPL-2.0-or-later
*
* @wordpress-plugin
* Plugin Name:       Admission Info Frm
* Plugin URI:        https://example.com/plugin-name
* Description:       Description of the plugin.
* Version:           1.0.0
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Muhammad Shafique
* Author URI:        https://example.com
* Text Domain:       admission-info-frm
* License:           GPL v2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/
 

// All Include File
define('ADMISSION-INFO-FRM-DBvERSION', '1.0.0');
 
 
/**
* Activate the plugin.
*/
function installing_db() { 
    include_once('Inc/db-install.php');
}
register_activation_hook( __FILE__, 'installing_db');
 
 
 
/**
* Deactivation hook.
*/
function callback_custom_plugin_own_deactivate() {
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type( 'detailsOfUniversity' );
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'callback_custom_plugin_own_deactivate' );
?>