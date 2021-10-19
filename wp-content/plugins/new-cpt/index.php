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
* Plugin Name:       New CPT
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
 
 

function pluginprefix_setup_post_type() {
    register_post_type('newcptid',
        array(
            'labels'      => array(
                'name'          => __('Another'),
                'singular_name' => __('Anothers'),
            ),
            'public'      => true,
            'has_archive' => true,
        )
    );
    // Save data
}
add_action('init', 'pluginprefix_setup_post_type');


function wporg_add_custom_box() {
    $screens = [ 'newcptid' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'newcptmetaboxid',                 // Unique ID
            'New CPT Meta Box',      // Box title
            'newcptmetabox_html_form',  // Content callback, must be of type callable
            $screen                            // Post type
        );
    }
}
add_action( 'add_meta_boxes', 'wporg_add_custom_box' );





// Saving Data
function update_all_info($post_id){
    if(array_key_exists('userName', $_POST)){
        update_post_meta( $post_id, 'saving_user_name', $_POST['userName'] );
        update_post_meta( $post_id, 'saving_userEmail', $_POST['userEmail'] );
        update_post_meta( $post_id, 'select_user_gender', $_POST['usergender']);
        
    }
    
    
}
add_action('save_post', 'update_all_info', 10, 1);







function newcptmetabox_html_form($post){
    $getUserName = get_post_meta( $post->ID, 'saving_user_name', true );
    $getEmailAddress = get_post_meta( $post->ID, 'saving_userEmail', true );
    $usergender = array();
    $select_gender = get_post_meta($post->ID, 'select_user_gender', false);
    var_dump($select_gender); 
    
    
    ?>
    <form action="" method="post">
    name <input type="text" name="userName" value="<?php echo $getUserName; ?>"> <br>
    email <input type="email" name="userEmail" value="<?php echo $getEmailAddress; ?>"> <br>
    gender - <input type="radio" name="usergender[]" value="male"> male <input type="radio" name="usergender[]" value="female"> female  <br>
    Your Skill - <input type="checkbox" name="userskill"> Java
    <input type="checkbox" name="userskill" id=""> PHP
    <input type="checkbox" name="userskill" id=""> Python <br>
    Language <select name="language" id="">
    <option> Bangla </option>
    <option> English </option>
    <option> Hindi </option>
    </select>
    </form>
    <?php
    // echo $html_form;
  
}



// How Save All Data
// First Form Validation
// Then Save Data to Database
// Finally Print Out These Data




// Display Data








 
/**
* Activate the plugin.
*/
function callback_custom_plugin_own() { 
    
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