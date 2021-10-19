<?php 
// DB Version 
$mycampus_db_version = '1.0';



global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . "mycampus"; 

$sql = "CREATE TABLE $table_name (
  id mediumint(250) NOT NULL AUTO_INCREMENT,
  universityName tinytext NOT NULL,
  unitName text NOT NULL,
  sscGpa FLOAT NOT NULL,
  sscGroup text NOT NULL,
  hscGpa FLOAT NOT NULL,
  hscGroup text NOT NULL,
  totalGpa FLOAT NOT NULL,
  admission_date text NOT NULL,
  post_id INT NOT NULL,
  post_status TEXT NOT NULL,
  PRIMARY KEY  (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

add_option( 'mycampus_db_version', $mycampus_db_version );

?>