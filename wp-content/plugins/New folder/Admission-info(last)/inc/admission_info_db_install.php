<?php 




// DB Version 
global $admission_varsity_info_db_version_neww;
$admission_varsity_info_db_version_neww = '11.0';

function admission_info_plugin_installing_hndlr_neww(){
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix. "admission_varsity_info"; 

    $sql = "CREATE TABLE $table_name (
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
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'admission_info_tbl_version_neww', $admission_varsity_info_db_version_neww );

    $las_version = get_option( 'admission_info_tbl_version_neww');

    if($las_version != $admission_varsity_info_db_version_neww){
        $sql = "CREATE TABLE $table_name (
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
            PRIMARY KEY  (id)
        ) $charset_collate;";

        dbDelta( $sql );
        update_option( 'admission_info_tbl_version_neww', $admission_varsity_info_db_version_neww);
    }
}
?>