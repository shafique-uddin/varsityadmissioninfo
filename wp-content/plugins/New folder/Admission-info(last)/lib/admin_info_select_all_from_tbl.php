<?php 

global $wpdb;
$results = $wpdb->get_results( 
	"SELECT * FROM {$wpdb->prefix}admi_varsity_info" 
);

?>