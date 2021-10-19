<?php

function admission_info_db_tbl_sample_data_delete(){
    global $wpdb;
    $table_name = $wpdb->prefix . "admi_varsity_info";
    $wpdb->query( 
      $wpdb->prepare("
        DELETE FROM $table_name
        WHERE id = 1
      ")
    );
    $wpdb->flush();
}
admission_info_db_tbl_sample_data_delete();
  ?>