<?php 
/**
* Plugin Name
*
* @wordpress-plugin
* Plugin Name:       Admission Info
* Plugin URI:        https://example.com/plugin-name
* Version:           7.0.0
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Muhammad Shafique
* Author URI:        https://example.com
* Text Domain:       admission_info
* License:           GPL v2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/

global $dbVersionCreateBysh;
$dbVersionCreateBysh = '1.0';

function rownodfhaoer(){
    // define('__ADMISSION_INF_VERSION','8.1.1');
global $dbVersionCreateBysh;

global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$admission_info_tbl_name = $wpdb->prefix.'json_new_admission_info_customize_tbl';
$sql = "CREATE TABLE $admission_info_tbl_name (
id INT(250) NOT NULL AUTO_INCREMENT,
universityName TEXT(250) NOT NULL,
unitName TEXT(250) NOT NULL,
sscGpa FLOAT(250) NOT NULL,
sscGroup TEXT(250) NOT NULL,
hscGpa FLOAT(250) NOT NULL,
hscGroup TEXT(250) NOT NULL,
totalGpa FLOAT(250) NOT NULL,
admission_date TEXT(250) NOT NULL,
post_publish TEXT(250) NOT NULL,
PRIMARY KEY (id)
)$charset_collate;";

require_once(ABSPATH.'wp-admin/includes/upgrade.php');
dbDelta( $sql );
add_option( 'new_DB_versionP_admission_new_info', $dbVersionCreateBysh);
}
register_activation_hook( __FILE__, 'rownodfhaoer');
?>