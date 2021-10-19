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
* Plugin Name:       My Campus
* Plugin URI:        https://example.com/plugin-name
* Description:       Description of the plugin.
* Version:           1.0.0
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Muhammad Shafique
* Author URI:        https://example.com
* Text Domain:       my-campus
* License:           GPL v2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/
 





// CSS AND JAVASCRIPT INCLUDE
function css_js_inc_lib($screen){
    $__screen = get_current_screen();

    // echo "<pre>";
    // var_dump($screen);
    // echo "</pre>";
    // die();
    // if(('post-new.php' == $screen) && ('mycampusid' == $__screen->post_type)){
    if(('post-new.php' == $screen || 'post.php' == $screen) && ('mycampusid' == $__screen->post_type )){
        wp_enqueue_style( 'main-css-handler', plugin_dir_url( __FILE__ ).'assets/admin/css/main.css', null, time() );
        wp_enqueue_style( 'date-picker-stylesheet', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
        wp_enqueue_style( 'date-picker-demo-stylesheet', '/resources/demos/style.css');
       // wp_enqueue_style( $handle:string, $src:string, $deps:array, $ver:string|boolean|null, $media:string )
       wp_enqueue_script( 'main-jquery', plugin_dir_url( __FILE__ ).'assets/admin/js/main.js', null , null , true );
       wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-1.12.4.js', array('json2'), '1.12.4', true );
       wp_enqueue_script( 'jquery-ui-datepicker', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.11.4', true );
    }
}
add_action( "admin_enqueue_scripts", "css_js_inc_lib", 1 );







// Data Delete

/**
 * If get any trash file then db 'current_trash_action' field will be update by on else
 * it's status will be off.
 *  
 */











// Data Saving [Insert, Update]
function update_frm_info($post_id){
   

    if(isset($_POST['save'])){
        if(isset($_POST['id']) && ($_POST['id'] != null)){
            global $wpdb;
            $table_name = $wpdb->prefix . "mycampus";
            $query = $wpdb->update(
                    "$table_name", 
                    array( 
                        'universityName' => $_POST['unversity_name'],   // string
                        'unitName' => $_POST['unit_name'],   // string
                        'sscGpa' => $_POST['ssc_gpa'],   // string
                        'sscGroup' => $_POST['ssc_group'],   // string
                        'hscGpa' => $_POST['hsc_gpa'],   // string
                        'hscGroup' => $_POST['hsc_group'],   // string
                        'totalGpa' => $_POST['total_gpa'],   // string
                        'admission_date' => $_POST['admission_date'],    // integer (number) 
                        'post_id' => $_POST['id'],    // integer (number) 
                    ), 
                    array( 'post_id' => $_POST['id'] )
                );
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $query );
        }
    }
    
    if(isset($_POST['publish'])){

        global $wpdb;
        $table_name = $wpdb->prefix . "mycampus";

        $query = $wpdb->insert( 
                    "$table_name", 
                    array( 
                        'universityName' => $_POST['unversity_name'],   // string
                        'unitName' => $_POST['unit_name'],   // string
                        'sscGpa' => $_POST['ssc_gpa'],   // string
                        'sscGroup' => $_POST['ssc_group'],   // string
                        'hscGpa' => $_POST['hsc_gpa'],   // string
                        'hscGroup' => $_POST['hsc_group'],   // string
                        'totalGpa' => $_POST['total_gpa'],   // string
                        'admission_date' => $_POST['admission_date'],    // integer (number) 
                        'post_id' => $_POST['id'],    // integer (number) 
                    )
                );
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $query );
    }        
}
add_action( 'save_post', 'update_frm_info', 10, 1 );



// Data Validation (Escaping and sanitization) with NONCE
// Data Query


// METABOX FORM
function mycampus_metabox_form($post) {
    $post_id = ($post->ID);
    global $wpdb;
    $link = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}mycampus WHERE post_id = {$post_id}");
    
    $universityName = (isset($link->universityName)) ? $link->universityName : "";
    $universityUnitName = (isset($link->unitName)) ? $link->unitName : "";
    $minimumSSCgpa = (isset($link->sscGpa)) ? $link->sscGpa : "";
    $minimumSSCgroup = (isset($link->sscGroup)) ? $link->sscGroup : "";
    $minimumHSCgpa = (isset($link->hscGpa)) ? $link->hscGpa : "";
    $minimumHSCgroup = (isset($link->hscGroup)) ? $link->hscGroup : "";
    $totalGPA = (isset($link->totalGpa)) ? $link->totalGpa : "";
    $admissionDate = (isset($link->admission_date)) ? $link->admission_date : "";


    // echo "<pre>";
    // var_dump ($link);
    // echo "</pre>";
    

    // $get_university_name = get_post_meta( $post->ID, 'university_name_hndlr', true );
    // $get_unit_name = get_post_meta( $post->ID, 'unit_name_hndlr', true );
    // $get_ssc_group = get_post_meta( $post->ID, 'ssc_group_hndlr', true );
    // $get_ssc_gpa = get_post_meta( $post->ID, 'ssc_gpa_hndlr', true );
    // $get_hsc_gpa = get_post_meta( $post->ID, 'hsc_gpa_hndlr', true );
    // $get_hsc_group = get_post_meta( $post->ID, 'hsc_group_hndlr', true );
    // $get_total_gpa_requirement = get_post_meta( $post->ID, 'total_gpa_hndlr', true );
    // $get_admission_date = get_post_meta( $post->ID, 'admission_date_hndlr', true );

    
    ?>
        <div class="mycampus-field mycampus-input-label">
            <div class="mycampus-title">
                <label for="university_name">University Name</label>
            </div>
            <div class="mycampus-input-field">
                <input type="text" name="unversity_name" id="university_name" value="<?php echo $universityName; ?>">
            </div>
        </div>
        <div class="mycampus-field mycampus-input-label">
            <div class="mycampus-title">
                <label for="unit_name">Unit Name</label>
            </div>
            <div class="mycampus-input-field">
                <input type="text" name="unit_name" id="unit_name" value="<?php echo $universityUnitName; ?>">
            </div>
        </div>
        <div class="mycampus-field mycampus-input-label">
            <div class="mycampus-title">
                <label for="ssc-gpa">SSC GPA</label>
            </div>
            <div class="mycampus-input-field">
                <input type="text" name="ssc_gpa" id="ssc-gpa" value="<?php echo $minimumSSCgpa; ?>">
            </div>
        </div>
        <div class="mycampus-field">
            <div class="mycampus-title">
                <p>SSC Group</p>
            </div>
            <div class="mycampus-input-field-radio">

            <?php 
                $ssc_group_list = array(
                    'all' => 'All',
                    'scienceBH' => 'Science (Biology + Higher Math)',
                    'scienceM' => 'Science (Higher Math)',
                    'scienceB' => 'Science (Biology)',
                    'arts' => 'Arts',
                    'commerce' => 'Commerce'
                );

                foreach ($ssc_group_list as $ssc_group_list_key => $ssc_group_list_value) {
                    $selected = ("$minimumSSCgroup" == "$ssc_group_list_key") ? "checked" : "" ;
                    ?>
                    <input type="radio" <?php echo $selected; ?> name="ssc_group" value="<?php echo $ssc_group_list_key; ?>" id="sscGroup_<?php echo $ssc_group_list_value; ?>"><label for="sscGroup_<?php echo $ssc_group_list_value; ?>"><?php echo $ssc_group_list_value; ?></label> <br>
            <?php   } ?>
            </div>
       </div>
        <div class="mycampus-field mycampus-input-label">
            <div class="mycampus-title">
                <label for="hsc-gpa">HSC GPA</label>
            </div>
            <div class="mycampus-input-field">
                <input type="text" name="hsc_gpa" id="hsc-gpa" value="<?php echo $minimumHSCgpa; ?>">
            </div>
        </div>
        <div class="mycampus-field">
            <div class="mycampus-title">
                <p>HSC Group</p>
            </div>
            <div class="mycampus-input-field-radio">

            <?php 
            $hsc_group_list = array(

                'all' => 'All',
                'scienceBH' => 'Science (Biology + Higher Math)',
                'scienceM' => 'Science (Higher Math)',
                'scienceB' => 'Science (Biology)',
                'arts' => 'Arts',
                'commerce' => 'Commerce'
            );

            foreach ($hsc_group_list as $hsc_group_list_key => $hsc_group_list_value) { 
                $selected = ("$minimumHSCgroup" == "$hsc_group_list_key") ? "checked" : "" ;
                ?>
                <input type="radio" <?php echo $selected; ?> name="hsc_group" value="<?php echo $hsc_group_list_key; ?>" id="hscGroup_<?php echo $hsc_group_list_value; ?>"><label for="hscGroup_<?php echo $hsc_group_list_value; ?>"><?php echo $hsc_group_list_value; ?></label> <br>
            <?php   } ?>
            </div>
        </div>
        <div class="mycampus-field mycampus-input-label">
            <div class="mycampus-title">
                <label for="total_gpa">Total GPA (Minimum Required GPA)</label>
            </div>
            <div class="mycampus-input-field">
                <input type="text" name="total_gpa" id="total_gpa" value="<?php echo $totalGPA; ?>">
            </div>
        </div>
        <div class="mycampus-field mycampus-input-label">
            <div class="mycampus-title">
                <label for="datepicker">Admission Date</label>
            </div>
            <div class="mycampus-input-field">
                <input type="text" name="admission_date" id="datepicker" value="<?php echo $admissionDate; ?>">
            </div>
            <div class="mycampus-hidden">
                <input type="hidden" name="id" value="<?php echo $post->ID; ?>">
                <input type="hidden" name="sence" value="<?php echo time(); ?>">
            </div>
        </div>
    <?php
}




// CUSTOM METABOX
function wporg_add_custom_box() {
    $screens = ['mycampusId'];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'mycampus_metaboxId',                 // Unique ID
            'University Information',      // Box title
            'mycampus_metabox_form',  // Content callback, must be of type callable
            $screen                            // Post type
        );
    }
}
add_action( 'add_meta_boxes', 'wporg_add_custom_box' );





// CUSTOM POST TYPE
function pluginprefix_setup_post_type() {
    register_post_type('mycampusId',
        array(
            'labels'      => array(
                'name'          => __('Campus'),
                'singular_name' => __('Campuses'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'           => array( 'title'),
        )
    );
}
add_action('init', 'pluginprefix_setup_post_type');





 
/**
* Activate the plugin.
*/
function callback_custom_plugin_own() { 
    // Database Table Creation
    require_once('lib/db.php');
    // Trigger our function that registers the custom post type plugin.
    pluginprefix_setup_post_type();
    
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'callback_custom_plugin_own');
 
 
 
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