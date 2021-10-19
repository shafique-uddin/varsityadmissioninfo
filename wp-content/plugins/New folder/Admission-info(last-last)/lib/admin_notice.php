<?php 



// Empty Field Notice
function admission_info_empty_field_admin_notice(){
    function admission_info_all_empty_input_admin_notice() {
        ?>
        <div class="notice notice-error is-dismissible">
            <h3><?php _e( 'Please Insert All Input Field.', 'admission_info' ); ?></h3>
        </div>
        <?php
    }
    add_action( 'admin_notices', 'admission_info_all_empty_input_admin_notice' );
}
add_filter( 'admission_info_admin_empty_field_notice', 'admission_info_empty_field_admin_notice');



// Single Empty Field Notice
function admission_info_empty_single_field_admin_notice(){
    function admission_info_single_empty_input_admin_notice() {
        ?>
        <div class="notice notice-warning is-dismissible">
            <h3><?php _e( 'Please Check Some Field Is Empty.', 'admission_info' ); ?></h3>
        </div>
        <?php
    }
    add_action('admin_notices', 'admission_info_single_empty_input_admin_notice'); 
}
add_filter( 'admission_info_admin_single_empty_field_notice', 'admission_info_empty_single_field_admin_notice' );



// Data Insert Success Notice
function admission_info_admin_data_insert_successful_message(){
    function admission_info_successful_data_insert_admin_notice() {
        ?>
        <div class="notice notice-success is-dismissible">
            <h3><?php _e( 'Your Data Successfully Save.', 'admission_info' ); ?></h3>
        </div>
        <?php
    }
    add_action( 'admin_notices', 'admission_info_successful_data_insert_admin_notice' ); 
}
add_filter('admission_info_admin_data_insert_success_notice', 'admission_info_admin_data_insert_successful_message');

?>