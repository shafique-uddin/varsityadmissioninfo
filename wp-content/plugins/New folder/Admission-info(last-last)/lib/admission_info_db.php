<?php 
// DB Version 
$mycampus_db_version = '1.0';

global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . "admi_varsity_info"; 

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
  post_id INT(250) NOT NULL,
  post_publish TEXT(250) NOT NULL,
  PRIMARY KEY (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

add_option( 'mycampus_db_version', $mycampus_db_version );

?>