<?php /**
* Plugin Name
*
* @package           PluginPackage
* @author            Your Name
* @copyright         2019 Your Name or Company Name
* @license           GPL-2.0-or-later
*
* @wordpress-plugin
* Plugin Name:       MY DB INFO
* Plugin URI:        https://example.com/plugin-name
* Description:       Description of the plugin.
* Version:           1.0.0
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Your Name
* Author URI:        https://example.com
* Text Domain:       plugin-slug
* License:           GPL v2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/
 
 
 
/**
* Activate the plugin.
*/

define('MYDB_VERSION','7.1.2');


function callback_custom_plugin_own() { 

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix.'my_personal_db';
    $query = "CREATE TABLE $table_name (
        id INT(250) NOT NULL AUTO_INCREMENT,
        username TEXT NOT NULL,
        phone TEXT NOT NULL,
        email TEXT NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta( $query );
   
    add_option( 'MYDB_VERSION', MYDB_VERSION );


    if(get_option( 'MYDB_VERSION') != MYDB_VERSION){
        $query = "CREATE TABLE $table_name (
            id INT(250) NOT NULL AUTO_INCREMENT,
            username TEXT NOT NULL,
            phone TEXT NOT NULL,
            email TEXT NOT NULL,
            pass INT NOT NULL,
            del int not null,
            PRIMARY KEY (id)
        ) $charset_collate;";
        dbDelta( $query );
        update_option( 'MYDB_VERSION', MYDB_VERSION );
    }

}
register_activation_hook( __FILE__, 'callback_custom_plugin_own');


function insert_demo_data(){
    global $wpdb;
    $table_name = $wpdb->prefix. 'my_personal_db';
    $wpdb->insert(
        $table_name,
        array(
            'id' => 1,
            'username' => 'shafique',
            'phone' => 'jjjj',
            'email' => 'eeee',
            'pass' => 'jjjjjj'
        )
    );
}
register_activation_hook( __FILE__, 'insert_demo_data' );

function alway_delete_first_row_sample_data(){
    global $wpdb;
    $table_name = $wpdb->prefix. 'my_personal_db';
    $wpdb->delete(
        $table_name,
        array(
            'id' => 1
        )
    );
}
register_deactivation_hook( __FILE__, 'alway_delete_first_row_sample_data' );
 
 
function delete_row_after_plugins_reload(){
    global $wpdb;
    $table_name = $wpdb->prefix. 'my_personal_db';

    // echo "<pre>";
    // var_dump ('MYDB_VERSION');
    // echo "</pre>";
    // exit;

    if( get_option( 'MYDB_VERSION') != MYDB_VERSION ){
        
        // $wpdb->query(
        //     $wpdb->prepare(
        //         "ALTER $table_name DROP COLUMN del"
        //     )
        // );
        $query = "ALTER TABLE {$table_name} DROP COLUMN del";
        $wpdb->query($query);
    }
    update_option( 'MYDB_VERSION', MYDB_VERSION);
}
 add_action( 'plugins_loaded', 'delete_row_after_plugins_reload' );