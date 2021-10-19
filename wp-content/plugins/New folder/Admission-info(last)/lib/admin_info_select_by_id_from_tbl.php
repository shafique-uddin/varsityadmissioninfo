<?php 

global $wpdb;
$results = $wpdb->get_results(
	"SELECT * FROM {$wpdb->prefix}admi_varsity_info WHERE post_id = {$post_id_no}", OBJECT 
);



if(!empty($results)){
	foreach ($results as $eachRow) {
		$row_id = $eachRow->id;
		$universityName = $eachRow->universityName;
		$universityUnitName = $eachRow->unitName;
		$minimumSSCgpa = $eachRow->sscGpa;
		$minimumSSCgroup = $eachRow->sscGroup;
		$minimumHSCgpa = $eachRow->hscGpa;
		$minimumHSCgroup = $eachRow->hscGroup;
		$totalGPA = $eachRow->totalGpa;
		$admissionDate = $eachRow->admission_date;
		$universityName = $eachRow->post_publish;
	}
}
if(empty($results)){
	// Wrong URL[Post ID] Passing From Edit Link Or URL ?>
	<div class="notice notice-warning is-dismissible">
        <h3><?php _e( 'Warning: Invalid URL Passing. You May Block If You Try Again!', 'admission_info' ); ?></h3>
    </div> <?php
}

?>