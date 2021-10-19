<?php 

global $wpdb;
$results = $wpdb->get_results(
	"SELECT * FROM {$wpdb->prefix}admi_varsity_info WHERE post_id = {$post_id_no}", OBJECT 
);



if(!empty($results)){
	foreach ($results as $eachRow) {
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


// echo "<pre>";
// var_dump ($minimumHSCgroup);
// echo "</pre>";
// exit;

?>