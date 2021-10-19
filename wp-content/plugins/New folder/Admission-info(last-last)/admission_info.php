<?php 
/**
* Plugin Name
*
* @wordpress-plugin
* Plugin Name:       Admission Info
* Plugin URI:        https://example.com/plugin-name
* Description:       Description of the plugin.
* Version:           1.0.0
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Muhammad Shafique
* Author URI:        https://example.com
* Text Domain:       admission_info
* License:           GPL v2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/
 

include_once('lib/admin_notice.php');





// Submenu Handler 
function all_varsity_info_hndlr(){
    include_once('all_data_info.php');
}


// Admin Main Menu Handler
function add_admission_info_frm_hndlr(){
    include_once ('form.php');
}



function admin_menu_hndlr(){
    add_menu_page( 'Admission Information', 'Admission Info', 'manage_options', 'admissioninfo', 'all_varsity_info_hndlr', 'dashicons-database-view' );
    add_submenu_page( 'admissioninfo', 'All Varsity Information', 'All Varsity', 'manage_options', 'admissioninfo');
    add_submenu_page( 'admissioninfo', 'Add Varsity Information', 'Add New', 'manage_options', 'add-varsity-info', 'add_admission_info_frm_hndlr' );
}
add_action( 'admin_menu', 'admin_menu_hndlr' );





// Load CSS File

// CSS AND JAVASCRIPT INCLUDE
function admission_info_css_js_inc_lib($screen){
    // $__screen = get_current_screen();

    // echo "<pre>";
    // var_dump($screen);
    // echo "</pre>";
    // die();
    // if(('post-new.php' == $screen) && ('mycampusid' == $__screen->post_type)){
    // if(('admission-info_page_addvarsityinfo' == $screen) && ('admission-info_page_addvarsityinfo' == $__screen->id )){
    if('admission-info_page_add-varsity-info' == $screen){
        wp_enqueue_style( 'admission-info-main-css-handler', plugin_dir_url( __FILE__ ).'assets/admin/css/main.css', null, time() );
        wp_enqueue_style( 'date-picker-stylesheet', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
        wp_enqueue_style( 'date-picker-demo-stylesheet', '/resources/demos/style.css');
       // wp_enqueue_style( $handle:string, $src:string, $deps:array, $ver:string|boolean|null, $media:string )
       wp_enqueue_script( 'main-jquery', plugin_dir_url( __FILE__ ).'assets/admin/js/main.js', null , null , true );
       wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-1.12.4.js', array('json2'), '1.12.4', true );
       wp_enqueue_script( 'jquery-ui-datepicker', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.11.4', true );
    }

    if('toplevel_page_admissioninfo' == $screen){
        wp_enqueue_style( 'bootstrap-css-handler', '//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');
        wp_enqueue_style( 'date-picker-stylesheet', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
        wp_enqueue_style( 'date-picker-demo-stylesheet', '/resources/demos/style.css');
       // wp_enqueue_style( $handle:string, $src:string, $deps:array, $ver:string|boolean|null, $media:string )
       wp_enqueue_script( 'main-jquery', plugin_dir_url( __FILE__ ).'assets/admin/js/main.js', null , null , true );
       wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-1.12.4.js', array('json2'), '1.12.4', true );
       wp_enqueue_script( 'jquery-ui-datepicker', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.11.4', true );
    }
}
add_action( "admin_enqueue_scripts", "admission_info_css_js_inc_lib", 1 );



// Load Plugin Text Domain
function plugin_textdomain_hndlr() {
    load_plugin_textdomain( 'admission_info', false, plugin_dir_path(__FILE__).'/languages' );
}
add_action('plugin_loaded', 'plugin_textdomain_hndlr');


 

/**
* Activate the plugin.
*/
function admission_info_activator() { 
    // Database Table Creation
    require_once('lib/admission_info_db.php');
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'admission_info_activator');
 
 
 
/**
* Deactivation hook.
*/
function admission_info_deactivator() {
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'admission_info_deactivator' );
















// FORM CHECKIN
if(isset($_POST['admission_info_save'])){

    if(empty(mb_strlen($_POST['unversity_name'])) && empty(mb_strlen($_POST['unit_name'])) && empty(mb_strlen($_POST['ssc_gpa'])) && !isset($_POST['ssc_group']) && empty(mb_strlen($_POST['hsc_gpa'])) && !isset($_POST['hsc_group']) && empty(mb_strlen($_POST['total_gpa'])) && empty(mb_strlen($_POST['admission_date']))){
        apply_filters( 'admin_empty_field_notice', 'admin empty field warning notice.' ); 
    }
    elseif(empty(mb_strlen($_POST['unversity_name'])) || empty(mb_strlen($_POST['unit_name'])) || empty(mb_strlen($_POST['ssc_gpa'])) || !isset($_POST['ssc_group']) || empty(mb_strlen($_POST['hsc_gpa'])) || !isset($_POST['hsc_group']) || empty(mb_strlen($_POST['total_gpa'])) || empty(mb_strlen($_POST['admission_date']))){
        apply_filters( 'admission_info_admin_single_empty_field_notice', 'admin empty single field notice.' );
    }
    else{
        $universityName = sanitize_text_field( $_POST['unversity_name']);
        $unitName = sanitize_text_field( $_POST['unit_name']);
        $SscGpa = sanitize_text_field( $_POST['ssc_gpa']);
        $SscGrp = $_POST['ssc_group'] ? sanitize_text_field( $_POST['ssc_group']):' ';
        $HscGpa = sanitize_text_field( $_POST['hsc_gpa']);
        $HscGrp = $_POST['hsc_group'] ? sanitize_text_field( $_POST['hsc_group']) : ' ';
        $totalGpa = sanitize_text_field( $_POST['total_gpa']);
        $admissionDate = sanitize_text_field( $_POST['admission_date']);
        $post_id_no = sanitize_text_field( $_POST['post_id']);
        include_once('lib/admission_info_db_insert.php');
        apply_filters('admission_info_admin_data_insert_success_notice', 'data insert successful admin notice.');
    } 
}
