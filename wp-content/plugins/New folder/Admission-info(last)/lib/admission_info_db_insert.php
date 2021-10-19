<?php 

$toadaydate = date('d-F-Y');


global $wpdb;
$table_name = $wpdb->prefix . "admi_varsity_info";
$query = $wpdb->insert(
        "$table_name", 
        array( 
            'universityName' => $universityName,   // string
            'unitName' => $unitName,   // string
            'sscGpa' => $SscGpa,   // string
            'sscGroup' => $SscGrp,   // string
            'hscGpa' => $HscGpa,   // string
            'hscGroup' => $HscGrp,   // string
            'totalGpa' => $totalGpa,   // string
            'admission_date' => $admissionDate,    // integer (number) 
            'post_id' => $post_id_no,    // integer (number) 
            'post_publish' => $toadaydate,    // integer (number) 
        )
    );
?>